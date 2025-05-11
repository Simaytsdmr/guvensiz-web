<?php
session_start();

// Oturum kontrolü
if (!isset($_SESSION['kullanici_adi'])) {
    header("Location: giris_zafiyetli.php");
    exit();
}

$rol = $_SESSION['rol'];

echo "Hoşgeldiniz, " . $_SESSION['kullanici_adi'] . "!";
echo "<br>Rolünüz: " . $rol;

if ($rol == 'admin') {
    echo "<p>Admin paneline hoşgeldiniz!</p>";
} elseif ($rol == 'editor') {
    echo "<p>Editor paneline hoşgeldiniz!</p>";
}
?>

<a href="cikis.php">Çıkış Yap</a>
