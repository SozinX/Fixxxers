<?php
session_start();
require 'connect.php';
$nick_name = $_POST['nick_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['password_confirm'];
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `nick_name` = '$nick_name'");
$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");
if (mb_strlen($nick_name) < 3 || mb_strlen($nick_name) > 100) {
    $_SESSION['msg'] = 'Неприпустима довжина назви облікового запису';
    header('Location: ../index.php');
} else if (mb_strlen($email) < 4 || mb_strlen($email) > 255) {
    $_SESSION['msg'] = 'Неприпустима довжина адреси електронної скриньки';
    header('Location: ../index.php');
} else if (mb_strlen($password) < 8 || mb_strlen($password) > 255) {
    $_SESSION['msg'] = 'Неприпустима довжина паролю';
    header('Location: ../index.php');
} else if ($password != $confirm) {
    $_SESSION['msg'] = 'Паролі не співпадають';
    header('Location: ../index.php');
} else if (mysqli_num_rows($check_user) > 0) {
    $_SESSION['msg'] = 'Користувач з такою назвою облікового запису уже існує';
    header('Location: ../index.php');
} else if (mysqli_num_rows($check_email) > 0) {
    $_SESSION['msg'] = 'Адрес електронної пошти вже використовувався';
    header('Location: ../index.php');
} else {
    $password = md5($password);
    $path = 'images/a.jpg';
    $date = date("Y-m-d H:i:s");
    mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `nick_name`, `email`, `password`, `avatar`,`code`, `phone`, `telegram`, `instagram`, `day`, `month`, `year`,`registration date`) VALUES (NULL,NULL, '$nick_name', '$email', '$password', '$path', NULL, NULL, NULL, NULL, '--', '----', '----', '$date')");
    header('Location: ../index.php');
    $_SESSION['msg'] = 'Ви успішно зареєструвалися. Пройдіть, будь ласка, авторизацію';
    header('Location: ../index.php');
}
