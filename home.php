<?php

session_start();
$db = new PDO("mysql:host=localhost; dbname=yapilacaklar; charset=utf8;", "root", "");

$task = $db->query("SELECT * FROM list");

if ($_SESSION) {
    $email = $_SESSION["email"];
}

?>


<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="style_page.css" rel="stylesheet" type="text/css">
</head>
<body>

<nav>
    <label class="logo">DesignX</label>
    <ul>
        <li><a href="home.php">HOME</a></li>
        <li>SETTING</li>
        <li>ABOUT</li>
        <li><?php echo $email; ?></li>
    </ul>
</nav>

<div class="govde">
    <table class="table">
        <tr>
            <td class="id">ID</td>
            <td>TITLE</td>
            <td>CONTENT</td>
            <td class="td">DELETE</td>
            <td class="td">UPDATE</td>
        </tr>
        <?php
        foreach ($task as $list) {
            echo "
        <tr>
            <td>" . $list["id"] . "</td>
            <td class='text_task'>" . $list["title"] . "</td>
            <td class='text_task2'>" . $list["content"] . "</td>
            <td><a href='delete.php?id=" . $list["id"] . "'>Delete</a></td>
            <td><a href='update.php?id=" . $list["id"] . "'>Update</a></td>
        </tr>";
        }
        ?>
    </table>

    <form method="post" action="save.php">
        <input type="text" name="title" class="text_input" autocomplete="off"><br><br>
        <input type="text" name="content" class="text_input" autocomplete="off"><br><br>
        <button type="submit" name="save" class="save">Save</button>
        <button type="submit" name="logout" class="logout_btn">Log out</button>
    </form>
</div>

</body>
</html>
