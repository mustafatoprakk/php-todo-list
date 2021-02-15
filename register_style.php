<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<form method="post" action="register.php">
    <h2>REGISTER</h2>
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password" maxlength="18" minlength="6">
    <input type="password" name="confirm_password" placeholder="Confirm Password">
    <button type="submit" name="register" >Register</button>
    <button type="submit" name="login">Login</button>
</form>

</body>
</html>