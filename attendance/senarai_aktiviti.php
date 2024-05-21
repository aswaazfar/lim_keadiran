<?php
session_start();
include 'inc/database-inc.php';

$sql = "SELECT * FROM aktiviti";
$result = mysqli_query($conn, $sql);
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
    <h2 id="tajuk">Senarai Aktiviti</h2>
    <table id="senarai">
        <tr>
            <th>Bil</th>
            <th>Nama Aktiviti</th>
            <th>Tarikh</th>
            <th>Masa</th>
            <th>Tempat</th>
        </tr>
        <?php
        $bil = 0;
        while($row = mysqli_fetch_assoc($result)) {
            $namaAktiviti = $row['namaAktiviti'];
            $tarikh = date('d M Y', strototime(row['tarikh']));
            $masaMula = date('h:i A', strtotime($row['masaMula']));
            $masaAkhir = date('h:i A', strtotime($row['masaAkhir']));
            $tempat = $row['tempat'];
            $bil++;
        ?>
        <tr>
            <tr><?php echo $bil?>.</td>
            <tr><?php echo $namaAktiviti?></td>
            <tr><?php echo $tarikh?></td>
            <tr><?php echo $masaMula?> - <?php echo $masaAkhir?></td>
            <tr><?php echo $tempat?></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>