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
        <h2 id="tajuk">Muat Naik Ahli</h2>
        <input type="file" name="ahli" id="ahli">
        <button type="submit" name="muat_naik">Muat Naik</button>
    </form>
</body>
</html>