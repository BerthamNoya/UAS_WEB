<?php
require_once 'config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container_login_luar">
        <h3 class="header_login">Login KRS</h3>
        <hr>
        <div class="container_login_dalam">
            <form action="ceklogin.php" method="POST">
                <label for="">Masuk</label><br>
                <input type="text" name="nim" placeholder="Insert NIM" required><br>
                <label for="">Password</label><br>
                <input type="password" name="password" placeholder="Insert Password..." required><br>
                <button type="submit" class="login_button">Login</button>
                <br><br>
            </form>
        </div>    
    </div>
</body>

</html>