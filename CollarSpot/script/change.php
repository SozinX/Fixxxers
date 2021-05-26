<?php
session_start();
require 'connect.php';
$id = $_POST['id'];
$nick_name = $_POST['nick_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = md5($_POST['password_confirm']);
$phone =  $_POST['phone'];
$code = $_POST['code'];
$check_password = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id' AND `password` = '$confirm'");
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `nick_name` = '$nick_name' AND `id` != '$id'");
$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `id` != '$id'");
if (mysqli_num_rows($check_password) == 0) {
    $_SESSION['msg'] = 'Пароль до цього облікового запису неправильний';
    header('Location: ../security.php');
} else if ((mb_strlen($password) < 8 && mb_strlen($password) != 0) || mb_strlen($password) > 355) {
    $_SESSION['msg'] = 'Неприпустима довжина паролю';
    header('Location: ../security.php');
} else if (mb_strlen($nick_name) < 3 || mb_strlen($nick_name) > 355) {
    $_SESSION['msg'] = 'Неприпустима довжина назви облікового запису';
    header('Location: ../security.php');
} else if (mb_strlen($email) < 4 || mb_strlen($email) > 255) {
    $_SESSION['msg'] = 'Неприпустима довжина адреси електронної скриньки';
    header('Location: ../security.php');
} else if ((mb_strlen($phone) < 7 && mb_strlen($phone) != 0) || (mb_strlen($code) != 8 && mb_strlen($code) != 0) || (mb_strlen($code) == 0 && mb_strlen($phone) != 0) || (mb_strlen($code) != 0 && mb_strlen($phone) == 0)) {
    $_SESSION['msg'] = 'Ви ввели некоректний номер телефону';
    header('Location: ../security.php');
} else if (mysqli_num_rows($check_user) > 0) {
    $_SESSION['msg'] = 'Користувач з такою назвою облікового запису уже існує';
    header('Location: ../security.php');
} else if (mysqli_num_rows($check_email) > 0) {
    $_SESSION['msg'] = 'Адрес електронної пошти вже використовувався';
    header('Location: ../security.php');
} else if (mb_strlen($password) == 0) {
    $update = mysqli_query($connect, "UPDATE `users` SET `nick_name` ='$nick_name' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `phone` ='$phone' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `code` ='$code' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `email` ='$email' WHERE `id`='$id'");
    $check_id = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
    $userok = mysqli_fetch_assoc($check_id);
    $_SESSION['user'] = [
        "id" => $userok['id'],
        "full_name" => $userok['full_name'],
        "nick_name" => $userok['nick_name'],
        "email" => $userok['email'],
        "avatar" => $userok['avatar'],
        "code" => $userok['code'],
        "phone" => $userok['phone'],
        "telegram" => $userok['telegram'],
        "instagram" => $userok['instagram'],
        "day" => $userok['day'],
        "month" => $userok['month'],
        "year" => $userok['year'],
    ];
    header("Location: ../security.php");
    $_SESSION['msgtrue'] = 'Зміни встановлено';
} else {
    $update = mysqli_query($connect, "UPDATE `users` SET `nick_name` ='$nick_name' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `phone` ='$phone' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `code` ='$code' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `email` ='$email' WHERE `id`='$id'");
    $password = md5($password);
    $update = mysqli_query($connect, "UPDATE `users` SET `password` ='$password' WHERE `id`='$id'");
    $check_id = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
    $userok = mysqli_fetch_assoc($check_id);
    $_SESSION['user'] = [
        "id" => $userok['id'],
        "full_name" => $userok['full_name'],
        "nick_name" => $userok['nick_name'],
        "email" => $userok['email'],
        "avatar" => $userok['avatar'],
        "code" => $userok['code'],
        "phone" => $userok['phone'],
        "telegram" => $userok['telegram'],
        "instagram" => $userok['instagram'],
        "day" => $userok['day'],
        "month" => $userok['month'],
        "year" => $userok['year'],
    ];
    header("Location: ../security.php");
    $_SESSION['msgtrue'] = 'Зміни встановлено';
}
