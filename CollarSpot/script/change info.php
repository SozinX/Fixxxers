<?php
session_start();
require 'connect.php';
$id = $_POST['id'];
$confirm = md5($_POST['password_confirm']);
$telegram = $_POST['telegram'];
$instagram = $_POST['instagram'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$full_name = $_POST['full_name'];
$check_password = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id' AND `password` = '$confirm'");
if (mysqli_num_rows($check_password) == 0) {
    $_SESSION['msg'] = 'Пароль до цього облікового запису неправильний';
    header('Location: ../info.php');
} else if (mb_strlen($full_name) < 3 || mb_strlen($full_name) > 355) {
    $_SESSION['msg'] = 'Неприпустима довжина повного імені';
    header('Location: ../info.php');
} else {
    $update = mysqli_query($connect, "UPDATE `users` SET `full_name` ='$full_name' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `day` ='$day' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `month` ='$month' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `year` ='$year' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `telegram` ='$telegram' WHERE `id`='$id'");
    $update = mysqli_query($connect, "UPDATE `users` SET `instagram` ='$instagram' WHERE `id`='$id'");
    $check_id = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '$id'");
    if ($_FILES['avatar']['name'] != '') {
        $path = 'images/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['msg'] = 'Помилка при завантаженні зображення';
            header('Location: ../info.php');
        }
        $update = mysqli_query($connect, "UPDATE `users` SET `avatar` ='$path' WHERE `id`='$id'");
    }
    unset($_SESSION['user']);
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
    header("Location: ../info.php");
    $_SESSION['msgtrue'] = 'Зміни встановлено';
}
