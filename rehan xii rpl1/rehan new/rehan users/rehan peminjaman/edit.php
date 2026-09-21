<?php
include "connection.php";

// Proses update
if (isset($_POST['update'])) {

    $id_lama = $_POST['id_lama'];
    $id_peminjaman = $_POST['id_peminjaman'];
    $id_anggota = $_POST['id_anggota'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];
    $status = $_POST['status'];

    $query = "UPDATE peminjaman SET
        id_peminjaman='$id_peminjaman',
        id_anggota='$id_anggota',
        tanggal_pinjam='$tanggal_pinjam',
        tanggal_kembali='$tanggal_kembali',
        status='$status'
        WHERE id_peminjaman='$id_lama'";

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
        "SELECT * FROM peminjaman WHERE id_peminjaman='$id'"
    );

    $row = $data->fetch_assoc();

} else {
    die("ID peminjaman tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Peminjaman</title>
</head>

<body>

<h2>Edit Data Peminjaman</h2>

<form method="POST">

    <!-- ID LAMA disimpan -->
    <input type="hidden" name="id_lama"
    value="<?= $row['id_peminjaman']; ?>">

    ID Peminjaman:<br>
    <input type="text" name="id_peminjaman"
    value="<?= $row['id_peminjaman']; ?>"><br><br>

    ID Anggota:<br>
    <input type="text" name="id_anggota"
    value="<?= $row['id_anggota']; ?>"><br><br>

    Tanggal Pinjam:<br>
    <input type="text" name="tanggal_pinjam"
    value="<?= $row['tanggal_pinjam']; ?>"><br><br>

    Tanggal Kembali:<br>
    <input type="text" name="tanggal_kembali"
    value="<?= $row['tanggal_kembali']; ?>"><br><br>

    Status:<br>
    <input type="text" name="status"
    value="<?= $row['status']; ?>"><br><br>

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
