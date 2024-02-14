<?php
// menetapkan nilai nim, tahun, nama, semester.. menggunakan??
// nim = $user

// TAHUN

// NAMA

// SEMESTER

?>
<body>
    <div class="krs_all">
        <center>
        <div class="krs_head">
            <h1 class="krs_heading"> Halaman Utama KRS</h1>
                <table class=krs_profil>
                    <tr>
                        <td><b>NIM: </b> <?=$user?></td>
                        <td><b>TAHUN: <?//$tahun?>
                        </td>
                    </tr>
                    <tr>
                        <td><b>NAMA: </b><?//$nama?></td>
                        <td><b>SEMESTER: </b><?//$semester?> </td>
                    </tr>
                </table>
            </div>
        </center>
        <div class="krs_body">
            <!-- if ($semester = "genap"){ -->
                <form action="index.php?hal=krs_save" method="POST">
                    <label for="">Daftar Matakuliah:</label><br>
                    <select name="nama_mk" class="select_nama_mk"id="">
                    <option>-pilih matakuliah-</option>
                            <?php   
                                $x = $con->query("SELECT * FROM mk WHERE semester % 2 = 0");
                                while($j = $x->fetch()){
                                    echo "<option>$j[nama_mk]</option>";
                                }
                            ?>
                    </select>
                    <select name="kelas" class="select_kelas">
                        <option value="A">Kelas A</option>
                        <option value="B">Kelas B</option>
                    </select>
                    <button type="submit" class="button_save">Submit</button>
                </form><br>
            <!-- if tutup } -->
            <!-- else{ -->
            <!-- <form action="krs_save.php" method="POST">
                <label for="">Daftar Matakuliah</label>
                <select name="nama_mk" id="">
                <option>-</option>
                        <?php   
                            // $x = $con->query("SELECT * FROM mk WHERE semester % 2 != 0");
                            // while($j = $x->fetch()){
                            //     echo "<option>$j[nama_mk]</option>";
                            // }
                        ?>
                </select>
                <label class="krs_kelas" for="">Kelas</label>
                <select name="kelas">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
                <button type="submit" class="button_save">Save</button>
            </form> -->
            <!-- else tutup } -->
        </div>
    </div>
    <center>
        <div class="tablenya">
                <br><hr>
                <table class="krs_table">
                        <tr>
                            <th>No</th>
                            <th>Kode MK</th>
                            <th>Nama MK</th>
                            <th>SKS</th>
                            <th>Kelas</th>
                            <th>AKSI</th>
                        </tr>
    
                        <?php
                        $nom = 1;
                        $sql = $con->query("SELECT krs.kode_mk, mk.nama_mk, mk.sks, krs.kelas
                        FROM mahasiswa mhs INNER JOIN krs
                        ON mhs.nim = krs.nim
                        INNER JOIN mk
                        ON mk.kode_mk = krs.kode_mk
                        WHERE krs.nim = $user");
                        
                        while($row = $sql->fetch()){
                            echo "<tr>
                                    <td>$nom</td>
                                    <td>$row[0]</td>
                                    <td>$row[1]</td>
                                    <td>$row[2]</td>
                                    <td>$row[3]</td>
                                    <td>
                                        <a class='dellete' href='index.php?hal=krs_delete&nim=$user&kode_mk=$row[kode_mk]' onclick=\"return confirm('Hapus KRS?')\">Hapus</a>
                                    </td>
                                </tr>";
                                $nom++;
                        }
                        ?> 
                    </table>
                    <br>
            </div>
        </center>
    
</body>
