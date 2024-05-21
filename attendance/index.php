<?php
session_start();
include 'inc/database-inc.php';

//Initialize arrays to store past and future activities
$pastActivities = [];
$futureActivities = [];

//Query to fetch all activities and categorize them based on the data 
$sql = "SELECT * FROM aktiviti ORDER BY tarikh ASC";
$result = mysqli_query($conn, $sql);
$today = new DateTime(); //Today's date for comparison

while ($row = mysqli_fetch_assoc($result)) {
    $activityDetails = [
        'namaAktiviti' => $row['namaAktiviti'],
        'tarikh' => date('d M Y', strtotime($row['tarikh'])),
        'tempat' => $row['tempat'],
        //'masaMula => date('h:i A', strtotime($row['masaMula'])),
        //'masaAkhir => date('h:i A', strtotime($row['masaAkhir'])),
        'status' => (new DateTime($row['tarikh'])< $today) ? "Aktiviti telah tamat" : "Akan datang"
    ];

    if(new DateTime($row['tarikh']) <$today) {
        $pastActivities[] = $activityDetails;
    } else {
        $futureActivities[] = $activityDetails;
    }
}
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
    <div id="makluman">
        <h2 id="tajuk">Aktiviti Terkini</h2>
        <p><span class = "details">Nama Aktiviti: </span>: Bermain secara berkumpulan</p> <?php echo $namaAktiviti?></p>
        <p><span class="details">Tarikh:</span> 25 Oktober 2023</p> <?php echo $tarikh?></p>
        <p><span class="details">Masa:</span> 7. 30 pg - 9 pg</p> <?php echo $masaMula?> - <?php echo $masaAkhir?></p>
        <p><span class="details">Tempat:</span> Bilik Orchestra</p> <?php echo $tempat?></p>
    </div>
</body>
</html>