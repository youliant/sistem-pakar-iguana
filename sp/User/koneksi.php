

<?php
$host="localhost";
$user="root";
$password="";
$db="iguana_fcdb";

$koneksi = mysqli_connect($host,$user,$password,$db);
if (!$koneksi){
	  die("Koneksi gagal:".mysqli_connect_error());
}


?>

