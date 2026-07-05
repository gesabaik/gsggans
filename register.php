<?php
require 'fungsi.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
                document.location.href = 'login.php'; 
              </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* CSS untuk merapikan tampilan form */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .form-group {
            display: flex;
            /* Menggunakan flexbox untuk mensejajarkan elemen */
            align-items: center;
            margin-bottom: 15px;
        }

        .form-group label {
            width: 160px;
            /* Menentukan lebar label agar semua input sejajar */
            font-weight: bold;
        }

        .form-group span {
            margin-right: 10px;
            /* Memberi jarak antara titik dua (:) dan kotak input */
        }

        .checkbox-group {
            margin-left: 170px;
            /* Menyesuaikan posisi checkbox agar pas di bawah input */
            margin-bottom: 20px;
        }

        button {
            margin-left: 170px;
            /* Menyesuaikan posisi tombol */
            padding: 5px 15px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Register User</h1>
    <hr><br>

    <form action="" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <span>:</span>
            <input type="text" name="username" id="username" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <span>:</span>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="password_konfirmasi">Konfirmasi Password</label>
            <span>:</span>
            <input type="password" name="password_konfirmasi" id="password_konfirmasi" required>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="show_password" onclick="togglePassword()">
            <label for="show_password">Tampilkan Password</label>
        </div>

        <button type="submit" name="register">Register</button>
    </form>

    <script>
        function togglePassword() {
            var pw1 = document.getElementById("password");
            var pw2 = document.getElementById("password_confirm");

            if (pw1.type === "password") {
                pw1.type = "text";
                pw2.type = "text";
            } else {
                pw1.type = "password";
                pw2.type = "password";
            }
        }
    </script>
</body>

</html>