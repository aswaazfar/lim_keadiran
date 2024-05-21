<?php
session_start();
include 'inc/database-inc.php';

$hadir = '<i class="hadir fa-solid fa-circle-check"></i>';
$tidakHadir = '<i class="xhadir fa-slid fa-circle-xmark"></i>';

$sql = "SELECT * FROM aktiviti";
$hasil = mysqli-query($conn, $sql);
$bilAktiviti = mysqli_num_rows($hasil);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kehadiran Chinese Orkestra</title>
    <link rel="stylesheet" href ="style.css" />
    <script src="https://kit.fontawesome.com/0611a60885.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 id="header"> Sistem Kehadiran Chinese Orkestra</h1>
    <ul id="menu">
        <?php include 'inc/menu.php' ?>
</ul>
<hw id="tajuk">Rekod Kehadiran</h2>
<h3><?php echo $tingkatan ?></h3>
<form id="borang" acion="" method="get>
    <label for ="tingkatan">Tingkatan</label>
    <select name="tingkatan" id="tingkatan">
        <option value="" selected></option>
        <option value="1">Satu</option>
        <option value="2">Dua</option>
        <option value="3">Tiga</option>
        <option value="4">Empat</option>
        <option value="5">Lima</option>
    </select>
    <button type="submit">Cari</button>
</form>
<table id="senarai">
    <tr>
        <th rowspan="2">Bil</th>
        <th rowspan="2">Nama</th>
        <th rowspan="2">Kelas</th>
        <th colspan="<?php echo $bilAktiviti?>">Kehadiran</th>
    </tr>
    if(!empty($_GET['tingkatan'])) {
        $tingkatan = $_GET['tingkatan'];
        $sql = "SELECT * FROM ahli a
        INNER JOIN kelas k
        ON a.idKelas = k.idKelas
        WHERE tingkatan = '$tingkatan'
        ORDER BY tingkatan ASC, namaKelas ASC, nama ASC";
    }else {
        $sql = "SELECT * FROM ahli a
        INNER JOIN kelas k
        ON a.idKelas = k.idKelas
        ORDER BY tingkatan ASC, namaKelas ASC, nama ASC";
    }

    #hasil =mysqli_query($conn, $sql);
    $bil = 0;
    while($rekod = mysqli_fetch_assoc($hasil)) {
        $bil++;
        $noKP = $rekod['noKP'];
        $nama = $rekod['nama'];
        $kelas = $rekod['tingkatan'], " " . $rekod['namaKelas'];
    ?>
    <tr>
        <td><?php echo $bil ?>.</td>
        <td><?php echo $nama ?></td>
        <td><?php echo $kelas ?></td>
        <?php
        $sql2 = "SELECT * FROM kehadiran
                WHERE noKP ='$noKP'";
        $hasil2 = mysqli-query($conn, $sql2);
        while($rekod2 = mysqli_fetch_assoc($hasil2)){
            $status = $rekod2['status'];
            if($status == "Y") {
                $simbol = $hadir;
            }else {
                $simbol = $tidakHadir;
            }
            echo "<td>$simbol</td>"
        }
        ?>
    </tr>
    <?php
    }    
    ?>
    </table>
    <button id="cetak" onclick="window.print(); return false;">Cetak</button>
</body>
</html>    