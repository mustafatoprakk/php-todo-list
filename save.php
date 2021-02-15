<?php

session_start();
$db = new PDO("mysql:host=localhost; dbname=yapilacaklar; charset=utf8;", "root", "");

if (isset($_POST["save"])) {

    $title = $_POST["title"];
    $content = $_POST["content"];

    if (empty($title) || empty($content)) {
        echo "sad";
    } else {

        $sql = $db->prepare("INSERT INTO list (title, content) VALUES (?,?)")->execute(array($title, $content));

        header("location:home.php");
    }
}

if (isset($_POST["logout"])) {

    session_destroy();
    header("location:index.php");
}