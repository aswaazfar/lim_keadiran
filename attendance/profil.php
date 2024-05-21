<?php
session_start();
include 'inc/database-inc.php';

$noKP = $_SESSION['noKP'];

$sql = "SELECT * FROM ahli WHERE noKP = '$noKP'";
$hasil = mysqli_query($conn, $sql);
while ($rekod = mysqli_fetch_assoc($hasil)) {
    $nama = $rekod['nama'];
    $kataLaluan = $rekod ['kataLaluan'];
    $email = $rekod['noTel'];
    $idKelasAsal = $rekod['idKelas'];
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
    <form id="borang" action="" method="post">
        <h2 id="tajuk">Profil Pelajar</h2>
        <label for="noKP">No Kad Pengenalan:</label>
        <input 
        type="text" 
        name="noKP" 
        id="noKP" 
        required pattern="[0-9]{8,12}" 
        oninvalid="this.setCustomValidity('Sila guna nombor sahaja.')" 
        oninput="this.setCustomValidity('Sila guna nombor sahaja')" 
        value="<?php echo $noKP ?>" 
        readonly
        />
        <label for="kataLaluan">Kata Laluan</label>
        <input 
        type="password" 
        name="kataLaluan" 
        id="kataLaluan" 
        required pattern="[a-zA-Z0-9]{8,12}" 
        oninvalid="this.setCustomValidity('Sila guna huruf dan nombor sahaja. 8-12 aksara')" 
        oninput="this.setCustomValidity('Sila guna huruf dan nombor sahaja. 8-12 aksara')" 
        value="<?php echo $kataLaluan ?>"
        />
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="Zenying">
        <label for="noTel">No Telefon</label>
        <input type="text" name="noTel" id="noTel" value="1203849493">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="zzen@gmail.com">
        <label for="kelas">Kelas:</label>
        <select name="kelas" id="kelas">
            <?php
            $sql = "SELECT * FROM kelas";
            $hasil = mysqli_query($conn, $sql);
            while($rekod = mysqli_fetch_assoc($hasil)) {
                $idKelas = $rekod['idKelas'];
                $tingkatan = $rekod['tingkatan'];
                $namaKelas = $rekod['namaKelas'];

                if(#idKelas == $idKelasAsal){
                    echo "<option value ='$idKelas' selected > $tingkatan $namaKelas</option>";
                }else{
                    echo "<option value ='$idKelas'> $tingkatan $namaKelas</option>";
                }
            }
        </select>
        <button type="submit" name="kemaskini">Kemaskini</button>
    </form>
</body>
</html>