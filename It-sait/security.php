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
    <link rel="stylesheet" href="./css/securitystyle.css">
</head>

<body class="wrapper">
    <div class="navbar">
        <li><a href="#">МОЇ УЛЮБЛЕНЦІ</a></li>
        <li><a href="/info.php">ІНФОРМАЦІЯ</a></li>
        <li><a class="choosen" href="#">БЕЗПЕКА</a></li>
        <li><a href="/index.php">ГОЛОВНА</a></li>
    </div>
    <div class="menu">
        <div class="profile-menu">
            <form class="confirm" action="script/change.php" method="post">
                <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
                <label>NICKNAME</label>
                <input type="text" name="nick_name" placeholder="*missing*" value="<?= $_SESSION['user']['nick_name'] ?>">
                <label>EMAIL</label>
                <input type="email" name="email" placeholder="*missing*" value="<?= $_SESSION['user']['email'] ?>">
                <label>PASSWORD</label>
                <input type="password" name="password" placeholder="ENTER YOUR NEW PASSWORD">
                <div class="phone-number">
                    <div class="code-area">
                        <label>CODE</label>
                        <select class="code" name="code">
                            <option><?= $_SESSION['user']['code'] ?></option>
                            <option>+38(039)</option>
                            <option>+38(050)</option>
                            <option>+38(063)</option>
                            <option>+38(066)</option>
                            <option>+38(068)</option>
                            <option>+38(073)</option>
                            <option>+38(089)</option>
                            <option>+38(091)</option>
                            <option>+38(092)</option>
                            <option>+38(093)</option>
                            <option>+38(094)</option>
                            <option>+38(095)</option>
                            <option>+38(096)</option>
                            <option>+38(097)</option>
                            <option>+38(098)</option>
                            <option>+38(099)</option>
                        </select>
                    </div>
                    <div class="phone-area">
                        <label>PHONE NUMBER</label>
                        <input type="phone" name="phone" placeholder="*missing*" value="<?= $_SESSION['user']['phone'] ?>" maxlength="7">
                    </div>
                </div>
                <label class="msg-label">CONFIRM CHANGES</label>
                <input type="password" name="password_confirm" placeholder="ENTER YOUR CURRENT PASSWORD">
                <?php if (isset($_SESSION['msgtrue'])) {
                    echo '<p class = "msgtrue">' . $_SESSION['msgtrue'] . '</p>';
                } else if (isset($_SESSION['msg'])) {
                    echo '<p class = "msg">' . $_SESSION['msg'] . '</p>';
                }
                unset($_SESSION['msg']);
                unset($_SESSION['msgtrue']);
                ?>
                <button type="submit" class="confirm-button" name="confirm">CONFIRM</button>
            </form>
        </div>
    </div>
</body>

</html>