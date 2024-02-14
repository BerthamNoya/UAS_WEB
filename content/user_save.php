<?php
require_once 'config/koneksi.php';

$nim = htmlspecialchars($_POST['nim']);
$nama = htmlspecialchars($_POST['nama']);
$password = htmlspecialchars($_POST['password']);
$status = htmlspecialchars($_POST['status']);
$pass_hash = password_hash($password, PASSWORD_DEFAULT);

// empty() -> cek var kosong / tidak
// isset() -> cek var ada / tidak

if (empty($nim) || empty($password)) {
    echo "<script>
                alert('Data tidak boleh kosong!');
                window.location.href = 'index.php?hal=user';
        </script>";
} else {
    //cek username
    $cek = $con->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
    $cek->bindParam(1, $nim);
    $cek->execute();
    $jml = $cek->rowCount();

    if ($jml == 0) {
        //simpan
        //$sql = "INSERT INTO mahasiswa VALUES (?,?,?,?)";
        $sql = "INSERT INTO mahasiswa (nim, nama, password, status) VALUES (:nim, :nama, :password, :status)";

        $save = $con->prepare($sql);
        //bind
        $save->bindParam('nim', $nim);
        $save->bindParam('nama', $nama);
        $save->bindParam('password', $pass_hash);
        $save->bindParam('status', $status);
        //exec
        $save->execute();

        echo "<script>
                    alert('Data Berhasil disimpan');
                    window.location.href = 'index.php?hal=user';
            </script>";
    } else {
        #nim ada
        echo "<script>
                    alert('Username sudah ada!!');
                    window.location.href = 'index.php?hal=user';
            </script>";
    }
}
