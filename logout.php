<?php
session_start();

// Hancurkan semua session agar user benar-benar keluar
$_SESSION = [];
session_unset();
session_destroy();

// Pindahkan user kembali ke halaman login
header("Location: login.php");
exit;
?>