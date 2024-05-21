<?php
session_start();
include 'inc/database-inc.php';

$sql = "SELECT * FROM kelas";
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
    <h2 id="tajuk">Kelas</h2>
    <form id="borang" action="" method="post">
        <label for="tingkatan">Tingkatan</label>
        <select name="tingkatan" id="tingkatan">
            <option value="" selected></option>
            <option value="1">Satu</option>
            <option value="2">Dua</option>
            <option value="3">Tiga</option>
            <option value="4">Empat</option>
            <option value="5">Lima</option>
        </select>
        <label for="namakelas">Nama Kelas</label>
        <input type="text" name="namakelas" id="namakelas" required>
        <button type="submit" name="cari">Cari</button>
    </form>
    <table id="senarai">
        <tr>
            <th>Bil</th>
            <th>Tingkatan</th>
            <th>Nama Kelas</th>
            <th>Hapus</th>
        </tr>
        <?php
        $bil = 0;
        while($rekod = mysqli_fetch_assoc($hasil)) {
            $bil++;
            $idKelas = $rekod['idKelas'];
            $tingkatan = $rekod['tingkatan'];
            $namaKelas = $rekod['namaKelas'];
            ?>
            <tr>
                <td><?php echo $bil ?></td>
                <td><?php echo $tingkatan ?></td>
                <td><?php echo $namaKelas</td>
                <td><a href="inc/kelas_hapus-inc.php?idKelas=<?php echo $idKelas ?>">Hapus</a></td>
            </tr>
            ?>
        }
    </table>
    <p>Muat naik ahli. Klik <a href="muat_naik.php">di sini</a></p>
    <p>Tambah Kelas <a href="kelas.php">di sini</a></p>
</body>
</html>