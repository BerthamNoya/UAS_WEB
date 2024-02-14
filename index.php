<?php
session_start();
require_once 'config/koneksi.php';


if (empty($_SESSION['web2ti3c_user'])) {
    echo "<script>
            alert('login dulu!');
            window.location.href = 'login.php';
    </script>";
} elseif($_SESSION['web2ti3c_level'] == 'Pasif'){
    echo "<script>
    alert('Akun Anda Tidak Aktif :)');
    window.location.href = 'login.php';
</script>";
}
else {

    $user = $_SESSION['web2ti3c_user'];
    $level = $_SESSION['web2ti3c_level'];

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>KRS</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <div class="navbar">
            <?php
            include 'config/menu.php';
            ?>
        </div>
        <div class="main">
            <!-- isi konten -->
            <?php
            $page = @$_GET['hal'];
            if (empty($page)) {
                include 'content/krs.php';
            } else {
                include "content/$page.php";
            }
            ?>
        </div>
    </body>

    </html>
<?php } ?>