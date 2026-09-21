<?php
include "connection.php";

if (isset($_POST['simpan'])) {
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO buku 
    (id_buku, judul_buku, penulis, penerbit, tahun_terbit, stok) 
    VALUES 
    ('$id_buku', '$judul_buku', '$penulis', '$penerbit', '$tahun_terbit', '$stok')";

    if ($conn->query($query)) {
        header("Location: tampil.php");
        exit;
    } else {
        echo "Data gagal ditambahkan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Buku</title>
</head>
<body>

<h2>Tambah Data Buku</h2>

<form method="POST">

    ID Buku:<br>
    <input type="text" name="id_buku"><br><br>

    Judul Buku:<br>
    <input type="text" name="judul_buku"><br><br>

    Penulis:<br>
    <input type="text" name="penulis"><br><br>

    Penerbit:<br>
    <input type="text" name="penerbit"><br><br>

    Tahun Terbit:<br>
    <input type="text" name="tahun_terbit"><br><br>

    Stok:<br>
    <input type="number" name="stok"><br><br>

    <button type="submit" name="simpan">Simpan</button>
  <button type="submit" name="simpan">Kembali</button>
  <button type="submit" name="simpan">Reset</button>

</form>


</body>
</html>