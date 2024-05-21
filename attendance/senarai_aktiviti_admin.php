<?php
session_start();
include 'inc/database-inc.php';

$sql = "SELECT * FROM aktiviti";
$hasil = mysqli-query($conn, $sql);
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
        <?php include "inc/menu.php" ?>
    </ul>
    <h2 id="tajuk">Senarai Aktiviti</h2>
    <table id="senarai">
        <tr>
            <th>Bil</th>
            <th>Nama Aktiviti</th>
            <th>Tarikh</th>
            <th>Masa</th>
            <th>Tempat</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        <?php
        $bil = 0;
        while (rekod = mysqli_fetch_assoc($hasil)) {
            $bil++;
            $idAktiviti = $rekod['idAktiviti'];
            $namaAktiviti = $rekod['namaAktiviti'];
            $tarikh = date('d M Y', strtotime($rekod['tarikh']));
            $masaMula = date('h:i A', strtotime($rekod['masaMula']));
            $masaAkhir = date('h:i A', strtotime($rekod['masaAkhir']));
            $tempat = $rekod['tempat'];
            ?>
            <tr>
                <td><?php echo $bil ?>.</td>
                <td><?php echo $namaAktiviti ?></td>
                <td><?php echo $tarikh ?></td>
                <td><?php echo $masaMula ?> - <?php echo $namaAkhir?></td>
                <td><?php echo $tempat ?></td>
                <td><a href="aktiviti_edit.php?idAktiviti=<?php echo $idAktivii ?>">Edit</a></td>
                <td><a href="inc/aktiviti_hapus-inc.php?idAktiviti=<?php echo $idAktivii ?>">Hapus</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <p>Aktiviti baharu? Klik <a href="daftar_aktiviti.html">di sini</a></p>
</body>
</html>