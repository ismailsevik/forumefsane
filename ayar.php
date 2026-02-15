<?php
// Hata gizleme (O dönemin güvenlik anlayışı :) )
error_reporting(0);

$host = "127.0.0.1";
$user = "root";
$pass = "root";
$db   = "forum";

$baglanti = mysqli_connect($host, $user, $pass, $db);

if (!$baglanti) {
    die("Veritabanına bağlanılamadı: " . mysqli_connect_error());
}

// Türkçe karakter sorunu çözümü
mysqli_query($baglanti, "SET NAMES 'utf8'");
?>
