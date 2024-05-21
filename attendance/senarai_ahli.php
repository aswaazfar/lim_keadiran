<?php
session_start();
include 'inc/database-inc.php';

$nama = "";
$tingkatan = "";
if (!empty($_GET['nama']) and !empty($_GET['tingkatan'])) {
    $nama = $_GET['nama'];
    $tingkatan = $_GET['tingkatan'];
    $sql = "SELECT * FROM ahli a
            INNER JOIN kelas k
            ON a.idKelas = k.idKelas
            WHERE tingkatan = '$tingkatan'
            AND nama LIKE '%$nama%'
            ORDER BY tingkatan ASC, namaKelas ASC, nama ASC";
}elseif (!empty($_GET['nama'])) {
    $nama = $_GET['nama'];
    $xql = "SELECT * FROM ahli a
            INNER JOIN kelas k
            ON a.idKelas = k.idKelas
            WHERE nama LIKE '%$nama%'
            ORDER BY tingkatan ASC, namaKelas ASC, nama ASC";
}elseif(!empty($_GET['tingkatan'])) {
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

$hasil = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kehadiran CO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 id="header">Sistem Kehadiran Chinese Orchestra</h1>
    <ul id="menu">
        <?php include 'inc/menu.php' ?>
    </ul>
    <h2 id="tajuk">Senarai Ahli</h2>
    <form id="borang" action="" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required>
        <label for="tingkatan">Tingkatan</label>
        <select name="tingkatan" id="tingkatan">
            <option value="" selected></option>
            <option value="1">Satu</option>
            <option value="2">Dua</option>
            <option value="3">Tiga</option>
            <option value="4">Empat</option>
            <option value="5">Lima</option>
        </select>
        <button type="submit" name="cari">Cari</button>
    </form>
    <table id="senarai">
        <tr>
            <th>Bil</th>
            <th>Nama</th>
            <th>No Kad Pengenalan</th>
            <th>No Telefon</th>
            <th>Email</th>
            <th>Kelas</th>
        </tr>
        <?php
        while ($rekod = mysqli_fetch_assoc($hasil)) {
            $bil++;
            $nama = $rekod['nama'];
            $noKP = $rekod['noKP'];
            $noTel = $rekod['noTel'];
            $email = $rekod['email'];
            $kelas = $rekod['tingkatan'] . " " . $rekod['namaKelas'];
        ?>
        <tr>
            <td><?php echo $bil ?>.</td>
            <td><?php echo $nama ?></td>
            <td><?php echo $noKP ?></td>
            <td><?php echo $noTel ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $kelas ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
    <p>Muat naik ahli. Klik <a href="muat_naik.html">di sini</a></p>
    <p>Tambah Kelas <a href="kelas.html">di sini</a></p>
</body>
</html>