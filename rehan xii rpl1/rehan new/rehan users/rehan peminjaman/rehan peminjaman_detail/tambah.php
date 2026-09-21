<?php
include "connection.php";

if (isset($_POST['simpan'])) {

    $id_detail = $_POST['id_detail'];
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_buku = $_POST['id_buku'];
    $jumlah = $_POST['jumlah'];

    $query = "INSERT INTO peminjaman_detail
              (id_detail, id_peminjaman, id_buku, jumlah)
              VALUES
              ('$id_detail',
               '$id_peminjaman',
               '$id_buku',
               '$jumlah')";

    if ($conn->query($query)) {
        header("Location: tampil.php");
        exit;
    }

    echo "Data gagal ditambahkan: " . $conn->error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Peminjaman Detail</title>
</head>

<body>

<h2>Tambah Data Peminjaman Detail</h2>

<form method="POST">

    ID Detail:<br>
    <input type="text" name="id_detail" required>
    <br><br>

    ID Peminjaman:<br>
    <input type="text" name="id_peminjaman" required>
    <br><br>

    ID Buku:<br>
    <input type="text" name="id_buku" required>
    <br><br>

    Jumlah:<br>
    <input type="number" name="jumlah" min="1" required>
    <br><br>

    <button type="submit" name="simpan">
        Simpan
    </button>

    <button type="reset">
        Reset
    </button>

    <button type="button" onclick="window.location.href='tampil.php'">
        Kembali
    </button>

</form>

</body>
</html>
