<?php
if(isset($_POST['edit'])) {
    include 'database-inc.php';

    $idAktiviti = $_POST['idAktiviti'];
    $namaAktiviti = $_POST['namaAktiviti'];
    $tarikhh = $_POST['tarikh'];
    $masaMula = $_POST['masaMula'];
    $masaAkhir = $_POST['masaAkhir'];
    $tempat = $_POST['tempat'];

    $sql = "UPDATE aktiviti
            SET
                namaAktiviti = '$namaAktiviti',
                tempat = '$tempat',
                tarikh = '$tarikh',
                masaMula = $masaMula',
                masaAkhir = '$masaAkhir
            WHERE
                idAktivii = '$idAktiviti'";
    $hasil = mysqli_query($conn, $sql);
    if ($hasil) {
        echo "
        <script>
            alert('Kemaskini aktivii berjaya.');
            window.location.href = '../senarai_aktiviti_admin.php';
            </script>
            ";
    }
}else{
    header("Location: ../senarai_aktiviti_admin.php?ralat=aksestidakdibenarkan");
}
?>