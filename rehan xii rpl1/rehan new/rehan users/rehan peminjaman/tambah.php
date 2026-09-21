<?php
include "connection.php";

if (isset($_POST['simpan'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_anggota = $_POST['id_anggota'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];
    
    $query = "INSERT INTO peminjaman 
    (id_peminjaman, id_anggota, tanggal_pinjam, tanggal_kembali, status) 
    VALUES 
    ('$id_peminjaman', '$id_anggota', '$tanggal_pinjam', '$tanggal_kembali', '$status')";

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
    <title>Tambah Data Peminjaman</title>
</head>
<body>

<h2>Tambah Data Peminjaman</h2>

<form method="POST">

    Id Peminjaman:<br>
    <input type="text" name="id_peminjaman"><br><br>

    Id Anggota:<br>
    <input type="text" name="id_anggota"><br><br>

    Tanggal Pinjam:<br>
    <input type="date" name="tanggal_pinjam"><br><br>

    Tanggal Kembali:<br>
    <input type="date" name="tanggal_kembali"><br><br>

    Status:<br>
    <input type="text" name="status"><br><br>

    <button type="submit" name="simpan">Simpan</button>

    <button type="button" onclick="window.location.href='tampil.php'">
        Kembali
    </button>

    <button type="reset">
        Reset
    </button>

</form>

</body>
</html>
