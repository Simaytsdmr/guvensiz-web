<?php
include("veritabani.php");

$kullanici = $_POST['kullanici'] ?? '';
$sifre = $_POST['sifre'] ?? '';

// SQL Injection'a açık sorgu (kötü)
$sql = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$kullanici' AND sifre = '$sifre'";
$result = pg_query($conn, $sql);

if (pg_num_rows($result) > 0) {
    session_start();
    $_SESSION['kullanici'] = $kullanici;
    header("Location: panel.php");
} else {
    echo "Geçersiz kullanıcı adı veya şifre.";
}
?>
