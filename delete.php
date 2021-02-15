<?php

$db = new PDO("mysql:host=localhost; dbname=yapilacaklar; charset=utf8;", "root", "");


if ($_GET) {
    $id = $_GET["id"];

    $sql = $db->prepare("DELETE FROM list WHERE id=?")->execute(array($id));

    if ($sql) {

        header("location:home.php");
    }

}