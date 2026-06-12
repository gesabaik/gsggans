<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "gsggans");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk mengambil data (yang dipakai di mahasiswa.php)
function tampildata($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Tambahkan fungsi baru ini untuk menangani tambah data
function tambahdata($data)
{
    global $conn;

    // Ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $foto = htmlspecialchars($data["foto"]);

    // Query insert data
    $query = "INSERT INTO mahasiswa 
                (nama, nim, jurusan, email, no_Hp, foto) VALUES
                ('$nama', '$nim', '$jurusan', '$email', '$nohp', '$foto')";

    mysqli_query($conn, $query);

    // Mengembalikan angka 1 jika berhasil, atau -1 jika gagal
    return mysqli_affected_rows($conn);
}

// Fungsi untuk menghapus data mahasiswa
function hapus($id)
{
    global $conn;

    // Perintah SQL untuk menghapus data berdasarkan ID
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($conn, $query);

    // Mengembalikan nilai 1 jika sukses, atau -1 jika gagal
    return mysqli_affected_rows($conn);
}
?>