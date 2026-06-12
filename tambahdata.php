<?php

require "fungsi.php";

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $jurusan = $_POST["jurusan"];
    $email = $_POST["email"];
    $nohp = $_POST["nohp"];
    $foto = $_POST["foto"];

    // FIX: Mengubah $koneksi menjadi $conn sesuai dengan yang ada di fungsi.php
    $query = "INSERT INTO mahasiswa 
                (nama, nim, jurusan, email, no_hp, foto) VALUES
                ('$nama', '$nim', '$jurusan', '$email', '$nohp', '$foto')";

    mysqli_query($conn, $query);

    // Alert notifikasi dan otomatis redirect kembali ke halaman utama jika sukses
    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'mahasiswa.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
              </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        h2 {
            font-weight: 600;
            font-size: 24px;
            color: #1a1a1a;
            margin-bottom: 8px;
            text-align: center;
        }

        .subtitle {
            font-size: 14px;
            color: #666;
            text-align: center;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px 0;
            vertical-align: middle;
        }

        .col-label {
            width: 100px;
            font-size: 14px;
            font-weight: 500;
            color: #4a4a4a;
        }

        .col-titikdua {
            width: 20px;
            text-align: center;
            color: #999;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px 12px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            border: 1px solid #dcdcdc;
            border-radius: 6px;
            outline: none;
            transition: all 0.2s ease;
        }

        input[type="text"]:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.15);
        }

        .button-group {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button {
            flex: 1;
            padding: 12px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button[type="submit"] {
            background-color: #1a1a1a;
            color: #ffffff;
        }

        button[type="submit"]:hover {
            background-color: #333333;
        }

        .btn-kembali {
            background-color: #f0f0f0;
            color: #555;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
            padding: 12px;
            font-size: 14px;
            font-weight: 600;
            flex: 1;
            display: inline-block;
        }

        .btn-kembali:hover {
            background-color: #e5e5e5;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Tambah Data</h2>
        <p class="subtitle">Silakan isi formulir di bawah ini dengan lengkap</p>

        <form action="" method="post">
            <table>
                <tr>
                    <td class="col-label"><label for="nama">Nama</label></td>
                    <td class="col-titikdua">:</td>
                    <td><input type="text" id="nama" name="nama" required autocomplete="off" placeholder="Nama Lengkap">
                    </td>
                </tr>
                <tr>
                    <td class="col-label"><label for="nim">NIM</label></td>
                    <td class="col-titikdua">:</td>
                    <td><input type="text" id="nim" name="nim" required autocomplete="off"
                            placeholder="Nomor Induk Mahasiswa"></td>
                </tr>
                <tr>
                    <td class="col-label"><label for="jurusan">Jurusan</label></td>
                    <td class="col-titikdua">:</td>
                    <td><input type="text" id="jurusan" name="jurusan" required autocomplete="off"
                            placeholder="Program Studi"></td>
                </tr>
                <tr>
                    <td class="col-label"><label for="email">Email</label></td>
                    <td class="col-titikdua">:</td>
                    <td><input type="text" id="email" name="email" required autocomplete="off"
                            placeholder="alamat@email.com"></td>
                </tr>
                <tr>
                    <td class="col-label"><label for="nohp">No.Hp</label></td>
                    <td class="col-titikdua">:</td>
                    <td><input type="text" id="nohp" name="nohp" required autocomplete="off"
                            placeholder="Contoh: 08123xxx"></td>
                </tr>
                <tr>
                    <td class="col-label"><label for="foto">Foto</label></td>
                    <td class="col-titikdua">:</td>
                    <td><input type="text" id="foto" name="foto" required autocomplete="off"
                            placeholder="Contoh: gambar.jpg"></td>
                </tr>
            </table>

            <div class="button-group">
                <a href="mahasiswa.php" class="btn-kembali">Kembali</a>
                <button type="submit" name="submit">Simpan Data</button>
            </div>
        </form>
    </div>

</body>

</html>