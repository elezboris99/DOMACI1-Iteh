<?php 
require "DBBroker.php";
require "model/user.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];

    $rs = User::logIn($name, $password, $conn);

    if ($rs->num_rows == 1) {
        echo "Uspesno ste se prijavili";
        $_SESSION['loggeduser'] = "prijavljen";
        $_SESSION['idu'] = $rs->fetch_assoc()['idu'];
        header('Location: home.php');
        exit();
    } else {
        echo '<script type="text/javascript">alert("Pogresni podaci za login");</script>';
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div id="header">
        <h1>Lista narudžbi</h1>
       
    </div>
    <div id = "body">
    <div class="login-container">
        <h2>Login/Register</h2>
        <form method="POST" action="#">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</div>
</body>
</html>