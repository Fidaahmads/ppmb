<?php
require_once "connect.php";
$firstname = mysqli_real_escape_string($conn, $_POST['namapertama']);
$lastname = mysqli_real_escape_string($conn, $_POST['namaterakhir']);
$birth = mysqli_real_escape_string($conn, $_POST['tanggallahir']);
$nohp = mysqli_real_escape_string($conn, $_POST['nomorhp']);
$email = mysqli_real_escape_string($conn, $_POST['alamatemail']);
$lulusan = mysqli_real_escape_string($conn, $_POST['lulusan']);
$motivasi = mysqli_real_escape_string($conn, $_POST['motivasi']);

if(mysqli_query($conn, "INSERT INTO mitq(namapertama, namaterakhir, tanggallahir, nomorhp, alamatemail, lulusan, motivasi) 
VALUES('" . $firstname . "', '" . $lastname . "', '" . $birth . "', '" . $nohp . "', '" . $email . "', '" . $lulusan . "', '" . $motivasi . "')")) {
echo '1';
} else {
echo "Error" . mysqli_error($conn);
}
mysqli_close($conn);
?>