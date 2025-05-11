<?php
session_start();
include("veritabani.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    // Veritabanı sorgusu, kullanıcı adı ve şifreyi kontrol ediyor
    $sql = "SELECT * FROM kullanicilar WHERE kullanici_adi = $1";
    $result = pg_query_params($conn, $sql, array($kullanici));

    if (pg_num_rows($result) == 1) {
        $row = pg_fetch_assoc($result);
        // Şifre doğrulaması (password_verify ile hashlenmiş şifreyi kontrol etme)
        if (password_verify($sifre, $row['sifre'])) {
            $_SESSION['kullanici_adi'] = $row['kullanici_adi'];
            $_SESSION['rol'] = $row['rol'];
            header("Location: panel.php");
            exit();
        } else {
            echo "Kullanıcı adı veya şifre hatalı.";
        }
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
    <title>Giriş Yap (Güvenli)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Giriş Yap (Güvenli)</h2>
        <form method="POST" action="giris_guvenli.php">
            <label for="kullanici_adi">Kullanıcı Adı:</label>
            <input type="text" name="kullanici_adi" required><br><br>

            <label for="sifre">Şifre:</label>
            <input type="password" name="sifre" required><br><br>

            <input type="submit" value="Giriş Yap">
        </form>
    </div>
</body>
</html>
