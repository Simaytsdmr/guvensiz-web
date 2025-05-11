<?php
session_start();
include("veritabani.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    // Düz metin şifre kontrolü (Bu, güvenlik açığına neden olur!)
    $sql = "SELECT * FROM kullanicilar WHERE kullanici_adi='$kullanici' AND sifre='$sifre'";
    $result = pg_query($conn, $sql);

    if (pg_num_rows($result) == 1) {
        $row = pg_fetch_assoc($result);
        $_SESSION['kullanici_adi'] = $row['kullanici_adi'];
        $_SESSION['rol'] = $row['rol'];
        header("Location: panel.php");
        exit();
    } else {
        echo "Kullanıcı adı veya şifre hatalı.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap (Zafiyetli)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Giriş Yap (Zafiyetli)</h2>
        <form method="POST" action="giris_zafiyetli.php">
            <label for="kullanici_adi">Kullanıcı Adı:</label>
            <input type="text" name="kullanici_adi" required><br><br>

            <label for="sifre">Şifre:</label>
            <input type="password" name="sifre" required><br><br>

            <input type="submit" value="Giriş Yap">
        </form>
    </div>
</body>
</html>
