<?php
include "connection.php";

// Proses update
if (isset($_POST['update'])) {
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    $query = "UPDATE buku SET
        judul_buku='$judul_buku',
        penulis='$penulis',
        penerbit='$penerbit',
        tahun_terbit='$tahun_terbit',
        stok='$stok'
        WHERE id_buku='$id_buku'";

    if ($conn->query($query)) {
        header("Location: tampil.php");
        exit;
    } else {
        echo "Data gagal diubah: " . $conn->error;
    }
}

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $data = $conn->query("SELECT * FROM buku WHERE id_buku='$id'");
    $row = $data->fetch_assoc();
} else {
    die("ID buku tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Buku</title>
</head>
<body>

<h2>Edit Data Buku</h2>

<form method="POST">

    ID Buku:<br>
    <input type="text" name="id_buku"
    value="<?= $row['id_buku']; ?>" readonly><br><br>

    Judul Buku:<br>
    <input type="text" name="judul_buku"
    value="<?= $row['judul_buku']; ?>"><br><br>

    Penulis:<br>
    <input type="text" name="penulis"
    value="<?= $row['penulis']; ?>"><br><br>

    Penerbit:<br>
    <input type="text" name="penerbit"
    value="<?= $row['penerbit']; ?>"><br><br>

    Tahun Terbit:<br>
    <input type="text" name="tahun_terbit"
    value="<?= $row['tahun_terbit']; ?>"><br><br>

    Stok:<br>
    <input type="number" name="stok"
    value="<?= $row['stok']; ?>"><br><br>

 <button type="submit" name="update">
        Simpan Perubahan
    </button>
 <button type="submit" name="update">
        Kembali
    </button>
 <button type="submit" name="update">
        Reset
    </button>

</form>


</body>
</html>