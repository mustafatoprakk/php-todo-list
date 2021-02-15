<?php

$db = new PDO("mysql:host=localhost; dbname=yapilacaklar; charset=utf8;", "root", "");

if ($_GET) {
    $id = $_GET["id"];

    $sql = $db->query("SELECT * FROM list WHERE id='$id'")->fetch(PDO::FETCH_ASSOC);

    if ($sql) {
        $title = $sql["title"];
        $content = $sql["content"];
    }
}

if ($_POST) {
    $new_id = $_POST["id"];
    $new_title = $_POST["title"];
    $new_content = $_POST["content"];

    $update = $db->prepare("UPDATE list SET title=?, content=? WHERE id=?")->execute(array($new_title, $new_content, $new_id));

    header("location:home.php");
}


?>


<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>

<p>UPDATE</p>

<form action="update.php" method="post">
    <input type="hidden" name="id" value=" <?php echo $id; ?> ">
    <input type="text" name="title" value="<?php echo $title; ?>">
    <input type="text" name="content" value="<?php echo $content; ?>">
    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
