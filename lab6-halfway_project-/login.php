<?php
require_once "con_db.php"; 

$email = $password = '';
$email_error = $password_error = '';
$error = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (strlen($password) < 8) {
        $password_error = "Password must have at least 8 characters";
        $error = true;
    }

    if (!$error) {
        try {
            if (strpos($email, '@') !== false) {
                $query = "SELECT * FROM users WHERE email = :email";
                $statment = $pdo->prepare($query);
                $statment->execute(['email' => $email]);
            } else {
                $query = "SELECT * FROM users WHERE name = :name";
                $statment = $pdo->prepare($query);
                $statment->execute(['name' => $email]);
            }

            $users = $statment->fetchAll(PDO::FETCH_ASSOC);

            if ($users) {
                $login_successful = false;
                foreach ($users as $user) {
                    if (password_verify($password, $user['password'])) {
                        $login_successful = true;
                        break;
                    }
                }
                if ($login_successful) {
                    echo "<div class='alert alert-success text-center'>Login successful😍!</div>";
                } else {
                    $password_error = "Incorrect password!";
                }
            } else {
                $email_error = "User not found!";
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger text-center'>Error: Unable to process the request. " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container py-5">
    <div class="col-lg-6 mx-auto border shadow p-4">
        <h2 class="text-center mb-4">Login</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-8">
                    <input class="form-control" type="text" name="email" value="<?= htmlspecialchars($email) ?>" placeholder="Enter your email or username">
                    <span class="text-danger"><?= $email_error ?></span>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-8">
                    <input class="form-control" type="password"  name="password" placeholder="Enter your password">
                    <span class="text-danger"><?= $password_error ?></span>
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-4 col-sm-4 d-grid">
                    <button type="submit" class="btn btn-outline-primary">Login</button>
                </div>
                <div class="d-flex align-items-center justify-content-center mt-3">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <a href="register.php">Register</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
