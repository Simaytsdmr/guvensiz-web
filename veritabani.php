<?php
$host = "localhost";
$port = "5433";
$dbname = "guvenli_yazilim";
$user = "postgres";
$password = "123456";

// Bağlantı dizesi oluştur
$conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Veritabanına bağlan
$conn = pg_connect($conn_string);

if (!$conn) {
    die("Veritabanına bağlanılamadı!");
}
?>
