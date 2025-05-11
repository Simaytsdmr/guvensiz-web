<?php
session_start();
include("veritabani.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    // Güvenli SQL sorgusu (SQL Injection önlendi)
    $sql = "SELECT * FROM kullanicilar WHERE kullanici_adi=$1";
    $result = pg_query_params($conn, $sql, array($kullanici));

    if (pg_num_rows($result) == 1) {
        $row = pg_fetch_assoc($result);

        // Şifreyi hash ile karşılaştır
        if (password_verify($sifre, $row['sifre'])) {
            $_SESSION['kullanici_adi'] = $row['kullanici_adi'];
            $_SESSION['rol'] = $row['rol']; // Rol bilgisi burada
            header("Location: panel_guvenli.php");
            exit();
        } else {
            echo "Kullanıcı adı veya şifre hatalı.";
        }
    } else {
        echo "Kullanıcı bulunamadı.";
    }
}
?>

<form method="POST" action="giris_guvenli.php">
    <label for="kullanici_adi">Kullanıcı Adı:</label>
    <input type="text" name="kullanici_adi" required><br><br>

    <label for="sifre">Şifre:</label>
    <input type="password" name="sifre" required><br><br>

    <input type="submit" value="Giriş Yap">
</form>
