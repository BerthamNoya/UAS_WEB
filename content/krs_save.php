<?php
// $nim = $user
// $semester = $semester
// $tahun = $tahun
// no.3===================

$nim = $user;
$semester = "Genap";
$tahun = "2018/2019";
$nama_mk = htmlspecialchars($_POST['nama_mk']);
$kelas = htmlspecialchars($_POST['kelas']);




if ($nama_mk == "-pilih matakuliah-"){
    echo "<script>
    alert('Anda $nim belum pilih matakuliah');
    window.location.href = 'index.php?hal=krs';
    </script>";
}
else{
    if (empty($nim) || empty($semester) || empty($tahun) || empty($nama_mk) || empty($kelas)) {
        echo "<script>
        alert('Data tidak boleh kosong!');
        window.location.href = 'index.php?hal=krs';
        </script>";
    }else {

        // $nmk = $con->query("SELECT kode_mk FROM mk WHERE nama_mk = $nama_mk");
        // while($kode_mk = $nmk->fetch()){
        //     $kode_mk = htmlspecialchars($_GET['kode_mk']);
        // }
        // echo "$kode_mk ada";
    
    
    
        //cek kode
        $cek = $con->prepare("SELECT * FROM krs WHERE kode_mk= ?");
        $cek->bindParam(1, $kode_mk);
        $cek->execute();
        $jml = $cek->rowCount();
        
        if ($jml == 0) {
            //simpan
            //$sql = "INSERT INTO buku VALUES (?,?,?,?)";
            $sql = "INSERT INTO krs VALUES (:nim, :kode_mk, :tahun, :semester, :kelas)";
            
            // $save = $con->prepare($sql);
            //     //bind
            //     $save->bindParam('nim', $id_buku);
            //     $save->bindParam('kode_mk', $kode_mk);
            //     $save->bindParam('tahun', $tahun);
            //     $save->bindParam('semester', $semester);
            //     $save->bindParam('kelas', $kelas);
            //     //exec
            //     $save->execute();
                
                echo "<script>
                alert('KRS disimpan');
                window.location.href = 'index.php?hal=krs';
                </script>";
            }else {
                #kode sudah ada
                echo "<script>
                alert('KRS sudah ada!!');
                window.location.href = 'index.php?hal=krs';
                </script>";
            }
        }
}
