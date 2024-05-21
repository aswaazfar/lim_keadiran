<?php
session_start();
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
    <form id="borang" action="" method="post">
        <h2 id="tajuk">Aktiviti</h2>
        <label for="namaAktiviti">Nama Aktiviti:</label>
        <input type="text" name="noKP" id="noKP" required>
        <label for="tarikh">Tarikh</label>
        <input type="date" name="tarikh" id="tarikh" required>
        <label for="masaMula">Masa Mula:</label>
        <input type="time" name="masaMula" id="masaMula">
        <label for="masaAkhir">Masa Akhir:</label>
        <input type="time" name="masaAkhir" id="masaAkhir">
        <label for="tempat">Tempat:</label>
        <input type="text" name="tempat" id="tempat">
        <button type="submit" name="daftar">Daftar</button>
    </form>
</body>
</html>