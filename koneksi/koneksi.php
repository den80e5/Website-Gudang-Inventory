<?php 
 
$host = "localhost";
$user = "root";
$password = "";
$database = "project";
 
$koneksi = new mysqli($host,$user,$password,$database);
 
if($koneksi->connect_error){
	die("Koneksi gagal");
}
 
?>