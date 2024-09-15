<?php
$host = 'localhost';
$dbname = 'project_vinfast';
$user = 'root';  // XAMPP mặc định sử dụng 'root' làm tài khoản người dùng MySQL
$pass = '';      // XAMPP mặc định không có mật khẩu

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $option = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>