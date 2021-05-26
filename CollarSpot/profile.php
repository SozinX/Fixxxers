<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>PetCollars</title>
    <link rel="stylesheet" href="./css/styleprofile.css">
</head>

<body class="wrapper">
    <input type="checkbox" name="">
    <form action="script/logout.php" class="logout-form" method="post">
        <button type="submit" name="logout">LOGOUT</button>
    </form>
    <span class="menu-checkbox"></span>
    <div class="navbar">
        <li><a href="#">МОЇ УЛЮБЛЕНЦІ</a></li>
        <li><a href="/info.php">ІНФОРМАЦІЯ</a></li>
        <li><a href="/security.php">БЕЗПЕКА</a></li>
        <li><a class="choosen" href="/index.php">ГОЛОВНА</a></li>
    </div>
    <div class="menu">
        <div class="profile-menu">
            <img src="<?= $_SESSION['user']['avatar'] ?>" alt="">
            <label>FULL NAME</label>
            <input type="text" name="full_name" placeholder="*missing*" value="<?= $_SESSION['user']['full_name'] ?>" readonly>
            <label>NICKNAME</label>
            <input type="text" name="nick_name" placeholder="*missing*" value="<?= $_SESSION['user']['nick_name'] ?>" readonly>
            <label>TELEGRAM</label>
            <input type="text" name="telegram" placeholder="*missing*" value="<?= $_SESSION['user']['telegram'] ?>" readonly>
            <label>INSTAGRAM</label>
            <input type="text" name="instagram" placeholder="*missing*" value="<?= $_SESSION['user']['instagram'] ?>" readonly>
            <label>PHONE NUMBER</label>
            <input type="text" name="phone" placeholder="*missing*" value="<?= $_SESSION['user']['code'] . $_SESSION['user']['phone'] ?>" readonly>
            <label>EMAIL</label>
            <input type="email" name="email" placeholder="*missing*" value="<?= $_SESSION['user']['email'] ?>" readonly>
            <label>DATE OF BIRTH</label>
            <input type="text" name="birthday" placeholder="*missing*" value="<?= $_SESSION['user']['day'] . ' / ' . $_SESSION['user']['month'] . ' / ' . $_SESSION['user']['year'] ?>" readonly>
        </div>

    </div>
    <div class="content">
        <section class="main">
            <h2>Інфа</h2>
        </section>
        <section class="call">
            <h2>Інформація про замовлення</h2>
        </section>
        <section class="work">
            <h2>Екскурс у користуванні</h2>
        </section>
        <section class="contacts">
            <h2>Аналітика</h2>
        </section>
    </div>
</body>

</html>