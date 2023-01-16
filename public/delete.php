<?php
include_once('connect.php');

// echo var_dump($_POST);
// Kolom data di table

$no = $_POST['no'];

// echo "Selamat $nama , alamat anda $alamat , berjenis kelamin $jk No HP $nohp , dengan email $email <br>";

// echo '<img src="assets/'.$foto.'" class="card-img-top" alt="...">';

$query = "select `foto` from `mitq` where `no` = '$no'  ";
$data_foto = mysqli_query($conn, $query);
$foto = mysqli_fetch_assoc($data_foto);

// Hapus data di acces

unlink("assets/" . $foto['foto']);

// Hapus data;

$hapus_data = mysqli_query($conn, "DELETE from `mitq` 
where `no` = '$no' ");

if ($hapus_data) {
    echo "<p>Data berhasil dihapus</p>";
}else{
    echo "<p>Data gagal dihapus</p>";
}

echo "<br>";

header("Location: home.php");

?>