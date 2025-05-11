<?php
session_start();
include("veritabani.php");

// Oturum kontrolü
if (!isset($_SESSION['kullanici_adi']) || $_SESSION['rol'] == 'admin') {
    header("Location: giris.php");
    exit();
}

echo "Hoşgeldiniz, " . $_SESSION['kullanici_adi'] . "! (Kullanıcı Paneli)";
?>

<!-- Kullanıcı paneli içeriği -->
<p>Kullanıcı işlemleri burada olacak.</p>
<a href="cikis.php">Çıkış Yap</a>
