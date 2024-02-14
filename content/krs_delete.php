<?
$kode_mk = $_GET['kode_mk'];

//delete
$delete = $con->prepare("DELETE FROM krs WHERE nim = $user AND kode_mk = ?");
$delete->bindParam(1, $kode_mk);
$delete->execute();

echo "<script>
        alert('Penghapusan KRS Berhasil!');
        window.location.href = 'index.php';
</script>";
