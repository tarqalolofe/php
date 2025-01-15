<?php
require_once "con_db.php"; 

$name = $phone = $gender = $email = $password = '';
$name_error = $phone_error = $gender_error = $email_error = $password_error = $confirm_password_error = '';
$error = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));


    if (empty($name)) {
        $name_error = "The Name is required";
        $error = true;
    }

    if (!preg_match('/^[0-9]{1,9}$/', $phone)) {
        $phone_error = "Phone must be exactly 9 digits";
        $error = true;
    }

    if (empty($gender)) {
        $gender_error = "The gender is required";
        $error = true;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Email format is not valid";
        $error = true;
    }

    if (strlen($password) < 8) {  
        $password_error = "Password must be at least 8 characters long";
        $error = true;
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $password_error = "Password must contain at least one uppercase letter";
        $error = true;
    } elseif (!preg_match('/[a-z]/', $password)) {
        $password_error = "Password must contain at least one lowercase letter";
        $error = true;
    } elseif (!preg_match('/[0-9]/', $password)) {
        $password_error = "Password must contain at least one number";
        $error = true;
    } elseif (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
        $password_error = "Password must contain at least one special character (!@#$%^&*(),.?\":{}|<>)";
        $error = true;
    }
    

    if ($confirm_password != $password) {
        $confirm_password_error = "Password and confirm password do not match";
        $error = true;
    }
    try {
        
        $query = "SELECT * FROM users WHERE email = :email" ;
      /*  or name = :name; */
        $statment = $pdo->prepare($query);
        $statment->execute([
            'email' => $email
            
        ]);/*   'name' => $name */
        $user = $statment->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
          
            $email_error = "User with this email and name already exists.";
            $error = true;
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-success text-center'>Database error:</div>";
    //    /* echo "<script>alert('Database error: " . $e->getMessage() . "');</script>";*/
    }
    
    

if (!$error) {
 
    if (isset($name, $phone, $gender, $email, $password)) {
        try {
           
            $query = "INSERT INTO users (name, phone, gender, email,password) 
                      VALUES (:name, :phone, :gender, :email, :password)";
            
           
            $statment = $pdo->prepare($query);
            
          
            $statment->execute([
                'name' => $name,
                'phone' => $phone,
                'gender' => $gender,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT) 
            ]);
            
            
            echo "<div class='alert alert-success text-center'>Register successful😍!</div>";
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            echo "<div class ='alert alert-success text-center'>Error: Unable to register.</div>";
        }
    } else {
        echo "<div class ='alert alert-success text-center'>Please fill in all the required fields</div>";
    
    }}}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
<div class="container py-5">
    <div class="col-lg-5 mx-auto border shadow p-4">  
        <h2 class="text-center mb-4">Singup</h2>


        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10 " >
                    <input class="form-control" name="name" value="<?= isset($name) ? htmlspecialchars($name) : '' ?>" placeholder="Enter your name" required>
                    <span class="text-danger"><?= $name_error ?></span>
                </div>
            </div>
            <div class="row mb-3  justify-content-center">
                <div class="col-sm-10">
                <input class="form-control" type="text" name="phone" value="<?= htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') ?>" placeholder="Enter your phone number">
                    <span class="text-danger"><?= $phone_error ?></span>
                </div>
            </div>
            <div class="row mb-3  justify-content-center">
                <div class="col-sm-10">
                    <select class="form-control" name="gender">
                        <option value="" selected>Choose...</option>
                        <option value="male" <?= $gender === 'male' ? 'selected' : '' ?>>Male</option>
                        <option value="female" <?= $gender === 'female' ? 'selected' : '' ?>>Female</option>
                    </select>
                    <span class="text-danger"><?= $gender_error ?></span>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="email" value="<?= $email ?>" placeholder="Enter your email">
                    <span class="text-danger"><?= $email_error ?></span>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="password" value="" placeholder="Enter your password">
                    <span class="text-danger"><?= $password_error ?></span>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="confirm_password" placeholder="Confirm your password">
                    <span class="text-danger"><?= $confirm_password_error ?></span>
                </div>
            </div>
            <div class="row mb-3justify-content-center">
                <div class="offset-sm-4 col-sm-4 d-grid">
                    <button type="submit" class="btn btn-outline-primary">Singup</button>
                </div>
                     <div class="d-flex align-items-center justify-content-center mt-3">
                     <p class="mb-0 me-2">Already have an account?</p>
                     <a href="login.php">Login</a>
            ``      </div>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>