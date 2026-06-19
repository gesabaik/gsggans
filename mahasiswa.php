<?php
require 'fungsi.php';

// 1. Definisikan query dan simpan hasil datanya ke variabel $mahasiswa
$mahasiswa = tampildata("SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gesa | Data Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- RESET & BASE STYLES --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
        }

        /* --- HEADER & NAVIGATION --- */
        .site-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 20px;
            margin-bottom: 35px;
        }

        .site-title {
            font-size: 28px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.5px;
        }

        .site-nav a {
            text-decoration: none;
            color: #64748b;
            font-size: 15px;
            font-weight: 500;
            margin-left: 20px;
            padding: 8px 12px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .site-nav a:hover {
            color: #0f172a;
            background-color: #f1f5f9;
        }

        .site-nav a.active {
            color: #0f172a;
            background-color: #e2e8f0;
            font-weight: 600;
        }

        /* --- DATA SECTION HEADER --- */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #1e293b;
        }

        .btn-link {
            text-decoration: none;
        }

        .add-btn {
            background-color: #0f172a;
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .add-btn:hover {
            background-color: #1e293b;
        }

        /* --- STYLED TABLE STRUCT --- */
        .table-container {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            margin-bottom: 40px;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        .styled-table th {
            background-color: #f8fafc;
            color: #475569;
            font-weight: 600;
            padding: 14px 16px;
            border-bottom: 1px solid #e2e8f0;
        }

        .styled-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
            color: #334155;
        }

        .styled-table tr:last-child td {
            border-bottom: none;
        }

        .styled-table tr:hover td {
            background-color: #f8fafc;
        }

        /* --- ACTION BUTTONS --- */
        .btn-edit,
        .btn-delete {
            font-family: 'Inter', sans-serif;
            font-size: 12px;
            font-weight: 500;
            padding: 6px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            background-color: #ffffff;
            cursor: pointer;
            transition: all 0.2s;
            margin-right: 4px;
        }

        .btn-edit {
            color: #0f172a;
        }

        .btn-edit:hover {
            background-color: #f1f5f9;
            border-color: #94a3b8;
        }

        .btn-delete {
            color: #ef4444;
            border-color: #fee2e2;
        }

        .btn-delete:hover {
            background-color: #fef2f2;
            border-color: #fca5a5;
        }

        /* --- DIVIDER --- */
        .divider {
            border: none;
            border-top: 1px dashed #e2e8f0;
            margin: 20px 0 40px 0;
        }

        /* --- LATIHAN TABLE MATRIX --- */
        .latihan-section {
            background-color: #f8fafc;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
        }

        .latihan-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .latihan-table {
            border-collapse: collapse;
            font-weight: 600;
            color: #475569;
            background: #ffffff;
        }

        .latihan-table td {
            border: 2px solid #cbd5e1;
            width: 60px;
            height: 60px;
            text-align: center;
            vertical-align: middle;
            transition: background-color 0.2s;
        }

        .latihan-table tr:hover td {
            background-color: #f1f5f9;
        }

        .latihan-table td.mid-cell {
            background-color: #0f172a;
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .latihan-table tr:hover td.mid-cell {
            background-color: #1e293b;
        }
    </style>
</head>

<body class="mahasiswa-page">

    <div class="container">

        <header class="site-header">
            <h1 class="site-title">gesa</h1>
            <nav class="site-nav">
                <a href="index.php">Home</a>
                <a href="profile.php">Profile</a>
                <a href="contact.php">Contact</a>
                <a href="mahasiswa.php" class="active">Mahasiswa</a>
            </nav>
        </header>

        <main class="content-layout">

            <section class="data-section">
                <div class="section-header">
                    <h2 class="section-title">Data Mahasiswa</h2>
                    <a href="tambahdata.php" class="btn-link">
                        <button class="add-btn">+ Tambah Data</button>
                    </a>
                </div>

                <div class="table-container">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th style="width: 60px; text-align: center;">No</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Jurusan</th>
                                <th>Email</th>
                                <th>No.HP</th>
                                <th style="text-align: center;">Foto</th>
                                <th style="width: 160px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($mahasiswa)): ?>
                                <tr>
                                    <td colspan="8" align="center" style="padding: 30px; color: #94a3b8;">
                                        Belum ada data mahasiswa di dalam database.
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php $i = 1; ?>
                                <?php foreach ($mahasiswa as $mhs): ?>
                                    <tr>
                                        <td align="center" style="font-weight: 500; color: #94a3b8;"><?= $i; ?></td>
                                        <td><strong><?= $mhs["nama"]; ?></strong></td>
                                        <td><code
                                                style="background: #f1f5f9; padding: 2px 6px; border-radius: 4px; font-size: 13px;"><?= $mhs["nim"]; ?></code>
                                        </td>
                                        <td><?= $mhs["jurusan"]; ?></td>
                                        <td><?= $mhs["email"]; ?></td>
                                        <td><?= $mhs["no_hp"]; ?></td>
                                        <td>
                                            <a href="editdata.php?id=<?= $mhs["id"]; ?>"><button
                                                    class="btn-edit">Edit</button></a>
                                            <a href="deletedata.php?id=<?= $mhs["id"]; ?>"
                                                onclick="return confirm('Yakin ingin menghapus data ini?');"><button
                                                    class="btn-delete">Hapus</button></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <hr class="divider" />

            <section class="latihan-section">
                <h2 class="section-title">Latihan Tabel</h2>
                <div class="latihan-container">
                    <table class="latihan-table">
                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td colspan="2" rowspan="2" class="mid-cell">MID</td>
                            <td>5</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>9</td>
                            <td>8</td>
                            <td>7</td>
                        </tr>
                    </table>
                </div>
            </section>

        </main>

    </div>

</body>

</html>