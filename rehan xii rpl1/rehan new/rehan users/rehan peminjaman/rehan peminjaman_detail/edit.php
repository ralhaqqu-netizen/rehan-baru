<?php
include "connection.php";

// Proses update
if (isset($_POST['update'])) {

    $id_lama = $_POST['id_lama'];
    $id_detail = $_POST['id_detail'];
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_buku = $_POST['id_buku'];
    $jumlah = $_POST['jumlah'];

    $query = "UPDATE peminjaman_detail SET
        id_detail='$id_detail',
        id_peminjaman='$id_peminjaman',
        id_buku='$id_buku',
        jumlah='$jumlah'
        WHERE id_detail='$id_lama'";

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

    $data = $conn->query(
        "SELECT * FROM peminjaman_detail WHERE id_detail='$id'"
    );

    $row = $data->fetch_assoc();

} else {
    die("ID detail peminjaman tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Peminjaman Detail</title>
</head>

<body>

<h2>Edit Data Peminjaman Detail</h2>

<form method="POST">

    <!-- ID LAMA disimpan -->
    <input type="hidden" name="id_lama"
    value="<?= $row['id_detail']; ?>">

    ID Detail:<br>
    <input type="text" name="id_detail"
    value="<?= $row['id_detail']; ?>"><br><br>

    ID Peminjaman:<br>
    <input type="text" name="id_peminjaman"
    value="<?= $row['id_peminjaman']; ?>"><br><br>

    ID Buku:<br>
    <input type="text" name="id_buku"
    value="<?= $row['id_buku']; ?>"><br><br>

    Jumlah:<br>
    <input type="text" name="jumlah"
    value="<?= $row['jumlah']; ?>"><br><br>

    <button type="submit" name="update">
        Simpan Perubahan
    </button>

    <button type="button" onclick="window.location.href='tampil.php'">
        Kembali
    </button>

    <button type="reset">
        Reset
    </button>

</form>

</body>
</html>
