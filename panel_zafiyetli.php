<?php
session_start();
if (!isset($_SESSION['kullanici_adi'])) {
    header("Location: giris_zafiyetli.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Paneli (Zafiyetli)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Hoşgeldiniz, <?php echo $_SESSION['kullanici_adi']; ?>!</h2>
        <p>Rolünüz: <?php echo $_SESSION['rol']; ?></p>

        <a href="cikis.php">Çıkış Yap</a>
    </div>
</body>
</html>
