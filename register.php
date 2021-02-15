<?php

session_start();

$db = new PDO('mysql:host=localhost; dbname=yapilacaklar; charset=utf8;', "root", "", array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "Please, Fill in all fields!";
    } else {
        if ($password != $confirm_password) {
            echo "Password do not match!";
        } else {

            $email_fetch = $db->query("SELECT * FROM register WHERE email='{$email}'", PDO::FETCH_ASSOC);

            if ($email_fetch->rowCount()) {
                echo "You cannot use the email twice!";
            } else {

                $add = $db->prepare("INSERT INTO register SET name=?, email=?, password=?");
                $add_data = $add->execute(array($name, $email, $password));

                if ($add_data) {
                    $_SESSION["name"] = $name;
                    $_SESSION["email"] = $email;
                    $_SESSION["password"] = $password;

                    header("location:home.php");
                } else {
                    echo "Error! try again";
                }
            }
        }
    }
}

if (isset($_POST["login"])) {
    header("location:index.php");
}
