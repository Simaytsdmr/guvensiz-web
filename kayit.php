<?php
include("veritabani.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST['kullanici_adi'];
    $sifre = $_POST['sifre'];
    $rol = $_POST['rol'];

    // Şifreyi hash'lemek
    $sifre_hash = password_hash($sifre, PASSWORD_DEFAULT);

    // Kullanıcıyı veritabanına eklemek için güvenli sorgu
    $sql = "INSERT INTO kullanicilar (kullanici_adi, sifre, rol) VALUES ($1, $2, $3)";
    $result = pg_query_params($conn, $sql, array($kullanici_adi, $sifre_hash, $rol));

    if ($result) {
        echo "Kullanıcı başarıyla kaydedildi!";
    } else {
        echo "Bir hata oluştu.";
    }
}
?>

<form method="POST" action="kayit.php">
    <label for="kullanici_adi">Kullanıcı Adı:</label>
    <input type="text" name="kullanici_adi" required><br><br>

    <label for="sifre">Şifre:</label>
    <input type="password" name="sifre" required><br><br>

    <label for="rol">Rol:</label>
    <select name="rol">
        <option value="admin">Admin</option>
        <option value="editor">Editor</option>
    </select><br><br>

    <input type="submit" value="Kayıt Ol">
</form>
