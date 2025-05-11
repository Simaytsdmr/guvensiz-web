<?php
session_start();
include("veritabani.php");

if (isset($_POST['kullanici_adi']) && isset($_POST['sifre'])) {
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];

    // Kullanıcıyı veritabanında ara
    $query = "SELECT * FROM kullanicilar WHERE kullanici_adi = '$kullanici_adi' AND sifre = '$sifre'";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) > 0) {
        // Kullanıcı bulundu, oturum başlat
        $_SESSION['kullanici_adi'] = $kullanici_adi;
        $user = pg_fetch_assoc($result);
        $_SESSION['rol'] = $user['rol'];
        
        // Kullanıcının rolüne göre yönlendirme
        if ($_SESSION['rol'] == 'admin') {
            header("Location: panel.php");
        } else {
            header("Location: kullanici_panel.php");
        }
    } else {
        echo "Geçersiz kullanıcı adı veya şifre!";
    }
}
?>

<form method="POST" action="giris.php">
    <label for="kullanici_adi">Kullanıcı Adı:</label>
    <input type="text" name="kullanici_adi" required><br><br>

    <label for="sifre">Şifre:</label>
    <input type="password" name="sifre" required><br><br>

    <input type="submit" value="Giriş Yap">
</form>
