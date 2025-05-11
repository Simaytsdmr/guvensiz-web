<?php
session_start();

// Oturum kontrolü
if (!isset($_SESSION['kullanici_adi'])) {
    header("Location: giris.php");
    exit();
}

// Rol kontrolü
$rol = $_SESSION['rol'];
if ($rol != 'admin' && $rol != 'editor') {
    echo "Bu sayfayı görüntülemeye yetkiniz yok.";
    exit();
}
?>

<h2>Hoşgeldin, <?php echo $_SESSION['kullanici_adi']; ?>!</h2>
<p>Rolünüz: <?php echo $_SESSION['rol']; ?></p>
<a href="cikis.php">Çıkış Yap</a>
