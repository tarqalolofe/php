<?php
$host = 'localhost';       
$dbName = 'reg_log';       
$dbType = 'mysql';       
$userName = 'root';        
$password = '';            


$dsn = "$dbType:host=$host;dbname=$dbName;charset=utf8mb4";

try {
  
    $pdo = new PDO($dsn, $userName, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//   $sql ="CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     phone VARCHAR(15) NOT NULL,
//     gender ENUM('male', 'female') NOT NULL,
//     email VARCHAR(255) NOT NULL UNIQUE,
//     password VARCHAR(255) NOT NULL
// );";
//   $pdo->exec($sql);

 //   echo "Connected to the database successfully!";
} catch (PDOException $e) {
    
    echo "Database connection failed: " . $e->getMessage();
}
?>
