<?php

session_start();

$db = new PDO('mysql:host=localhost; dbname=yapilacaklar; charset=utf8;', "root", "", array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        echo "Please, Fill in all fields!";
    } else {

        $sql = $db->query("SELECT * FROM register WHERE email='$email' && password='$password'", PDO::FETCH_ASSOC);

        if ($sql->rowCount()) {

            $_SESSION["email"]=$email;
            $_SESSION["password"]=$password;

            header("location:home.php");
        } else {
            echo "Email or password is incorrect!";
        }
    }
}

if (isset($_POST["register"])) {
    header("location:register_style.php");
}