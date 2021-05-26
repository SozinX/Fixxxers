<?php
session_start();
require 'script/connect.php';
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}
$owner = $_SESSION['user']['id'];
$check_owner = mysqli_query($connect, "SELECT * FROM `pets` WHERE `owner id` = '$owner'");
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>PetCollars</title>
    <link rel="stylesheet" href="./css/pet.css">
</head>

<body>
    <div class="form">
        <?php
        while ($count = mysqli_fetch_assoc($check_owner)) {
        ?>
            <form class="pet" action="/script/pet.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" placeholder="*missing*" value="<?= $count['id'] ?>">
                <input type="text" name="name" placeholder="*missing*" value="<?= $count['name'] ?>">
                <input type="text" name="age" placeholder="*missing*" value="<?= $count['age'] ?>">
                <input type="text" name="male" placeholder="*missing*" value="<?= $count['male'] ?>">
                <input type="text" name="type" placeholder="*missing*" value="<?= $count['type'] ?>">
                <input type="text" name="breed" placeholder="*missing*" value="<?= $count['breed'] ?>">
                <input type="text" name="desc" placeholder="*missing*" value="<?= $count['description'] ?>">
                <input type="text" name="size" placeholder="*missing*" value="<?= $count['size'] ?>">
                <input type="text" name="color" placeholder="*missing*" value="<?= $count['color'] ?>">
                <button type="submit" name="chgbth">CHANGE</button>
            </form>

        <?php
        }
        ?>
    </div>
</body>

</html>