<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: profile.php");
}
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>PetCollars</title>
    <link rel="stylesheet" href="./css/styleshead.css">
</head>

<body class="wrapper">
    <input type="checkbox" name="">
    <span class="menu-checkbox"></span>
    <div class="menu">
        <form class="aut-list" action="script/signin.php" method="post">
            <h1>AUTHORIZATION</h1>
            <input type="text" name="nick_name" placeholder="USERNAME"></input>
            <input type="password" name="password" placeholder="PASSWORD"></input>
            <?php if (isset($_SESSION['warn'])) {
                echo '<p class = "msg">' . $_SESSION['warn'] . '</p>';
            }
            unset($_SESSION['warn']);
            ?>
            <button type="submit" name="autbth">LOGIN</button>
        </form>
        <a class="or">OR</a>
        <form class="reg-list" action="script/check.php" method="post">
            <h1>REGISTRATION</h1>
            <input type="text" name="nick_name" placeholder="USERNAME"></input>
            <input type="email" name="email" placeholder="EMAIL"></input>
            <input type="password" name="password" placeholder="PASSWORD"></input>
            <input type="password" name="password_confirm" placeholder="CONFIRM PASSWORD"></input>
            <?php if (isset($_SESSION['msg'])) {
                echo '<p class = "msgtrue">' . $_SESSION['msg'] . '</p>';
            }
            unset($_SESSION['msg']);
            ?>
            <button type="submit">CREATE</button>
        </form>
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