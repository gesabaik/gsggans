<?php
require 'fungsi.php';

// Ambil id dari URL (mahasiswa.php?id=...)
$id = $_GET["id"];

// Panggil fungsi hapus yang ada di fungsi.php, lalu cek kondisinya
if (hapus($id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'mahasiswa.php';
        </script>
    ";
}
?>