<?php

$connect = mysqli_connect('localhost', 'root', 'root', 'petcollars');
if (!$connect) {
    die('Something went wrong...');
}
