<?php
session_start();
session_destroy();  // Oturumu sonlandır

header("Location: giris.php");  // Giriş sayfasına yönlendir
exit();
