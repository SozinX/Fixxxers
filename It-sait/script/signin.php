<?php
session_start();
require_once 'connect.php';
$nick_name = $_POST['nick_name'];
$password = md5($_POST['password']);
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `nick_name` = '$nick_name'");
$check_password = mysqli_query($connect, "SELECT * FROM `users` WHERE `nick_name` = '$nick_name' AND `password` = '$password'");
if (mysqli_num_rows($check_user) == 0) {
    $_SESSION['warn'] = 'Користувача з такою назвою облікового запису не існує';
    header('Location: ../index.php');
} else if (mysqli_num_rows($check_password) == 0) {
    $_SESSION['warn'] = 'Пароль до цього облікового запису неправильний';
    header('Location: ../index.php');
} else {
    $user = mysqli_fetch_assoc($check_user);
    $_SESSION['user'] = [
        "id" => $user['id'],
        "full_name" => $user['full_name'],
        "nick_name" => $user['nick_name'],
        "email" => $user['email'],
        "avatar" => $user['avatar'],
        "code" => $user['code'],
        "phone" => $user['phone'],
        "telegram" => $user['telegram'],
        "instagram" => $user['instagram'],
        "day" => $user['day'],
        "month" => $user['month'],
        "year" => $user['year'],
    ];
    header("Location: ../profile.php");
}
