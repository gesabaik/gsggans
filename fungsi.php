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


    $foto = upload();
    if (!$foto) {
        return false;
    }
    // Query insert data
    $query = "INSERT INTO mahasiswa 
                (nama, nim, jurusan, email, no_Hp, foto) VALUES
                ('$nama', '$nim', '$jurusan', '$email', '$nohp', '$foto')";

    mysqli_query($conn, $query);

    // Mengembalikan angka 1 jika berhasil, atau -1 jika gagal
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>alert('Pilih gambar terlebih dahulu!');</script>";
        return false;
    }

    // Cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('Yang kamu upload bukan gambar! (Wajib JPG/JPEG/PNG)');</script>";
        return false;
    }

    // Cek jika ukurannya terlalu besar (maksimal sekitar 2MB)
    if ($ukuranFile > 2000000) {
        echo "<script>alert('Ukuran gambar terlalu besar! Maksimal 2MB');</script>";
        return false;
    }

    // Lolos pengecekan, buat nama baru yang unik agar file tidak saling menimpa
    $namaFileBaru = uniqid() . '.' . $ekstensiGambar;

    // Pindahkan file dari folder sementara PHP ke folder tujuan di project-mu
    // Pastikan folder 'img' sudah kamu buat di: C:\laragon\www\gsggans\img\
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
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

// Fungsi untuk mengubah data mahasiswa
function ubah($data)
{
    global $conn;

    // Ambil data dari form termasuk ID-nya
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $nohp = htmlspecialchars($data["nohp"]);


    // Query update data berdasarkan ID
    $query = "UPDATE mahasiswa SET
                nama = '$nama',
                nim = '$nim',
                jurusan = '$jurusan',
                email = '$email',
                no_hp = '$nohp',
              WHERE id = $id";

    mysqli_query($conn, $query);

    // Mengembalikan angka status perubahan (1 jika ada perubahan, 0 jika tidak ada, -1 jika error)
    return mysqli_affected_rows($conn);
}
?>