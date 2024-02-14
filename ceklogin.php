<?php
session_start();
require_once 'config/koneksi.php';

$username = htmlspecialchars($_POST['nim']);
$password = htmlspecialchars($_POST['password']);


if (empty($username) || empty($password)) {
    echo "<script>
                alert('Data tidak boleh kosong!');
                window.location.href = 'login.php';
        </script>";
} else {
    # cek username
    $sql = $con->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    $sql->bindParam(1, $username);
    $sql->execute();

    $jml = $sql->rowCount();

    if ($jml > 0) {
        # user ada
        $data = $sql->fetch();
        # cek password
        if (password_verify($password, $data['password'])) {
            # password benar, buat session
            $_SESSION['web2ti3c_user'] = $data['nim'];
            $_SESSION['web2ti3c_level'] = $data['status'];
            $tahun = $con->prepare("SELECT tahun FROM KRS WHERE nim = $username");
            echo "<script>
                    alert('login berhasil!');
                    window.location.href = 'index.php';
            </script>";
        } else {
            # password salah
            echo "<script>
                    alert('user/password salah!');
                    window.location.href = 'login.php';
            </script>";
        }
    } else {
        # user tidak ada
        echo "<script>
                alert('user tidak ada!');
                window.location.href = 'login.php';
        </script>";
    }
}
