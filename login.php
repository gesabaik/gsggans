<?php
// 1. WAJIB jalankan session_start() di baris paling pertama sebelum kode apa pun
session_start();

require 'fungsi.php';

// Cek apakah user sudah login sebelumnya. Kalau sudah, langsung lempar ke index.php
if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // Cek apakah username ditemukan
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Cek apakah password yang diketik cocok dengan hash di database
        if (password_verify($password, $row["password"])) {

            // 2. Buat SESSION login di sini jika password benar
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"]; // Opsional: buat nampilin nama user di index nanti

            // Alihkan ke halaman utama
            header("Location: index.php");
            exit;
        }
    }
    // Jika salah, set variabel error untuk memunculkan pesan peringatan di HTML
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Halaman Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0069d9;
        }

        .error-msg {
            color: red;
            font-style: italic;
            margin-bottom: 10px;
            text-align: center;
        }

        p {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        a {
            color: #28a745;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>

        <?php if (isset($error)): ?>
            <p class="error-msg">Username / Password salah!</p>
        <?php endif; ?>

        <form action="" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required autocomplete="off">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit" name="login">Masuk</button>
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
    </div>
</body>

</html>