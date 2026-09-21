<?php
include "connection.php";

// Proses update
if (isset($_POST['update'])) {

    $id_lama = $_POST['id_lama'];
    $id_pengembalian = $_POST['id_pengembalian'];
    $id_peminjaman = $_POST['id_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];

    // Cek apakah ID pengembalian baru sudah digunakan
    $cek_id = $conn->query("
        SELECT id_pengembalian
        FROM pengembalian
        WHERE id_pengembalian = '$id_pengembalian'
        AND id_pengembalian != '$id_lama'
    ");

    if ($cek_id->num_rows > 0) {

        echo "<script>
                alert('ID Pengembalian $id_pengembalian sudah digunakan! Silakan gunakan ID lain.');
                window.history.back();
              </script>";
        exit;
    }

    // Cek ID peminjaman
    $cek_peminjaman = $conn->query("
        SELECT id_peminjaman
        FROM peminjaman
        WHERE id_peminjaman = '$id_peminjaman'
    ");

    if ($cek_peminjaman->num_rows == 0) {

        echo "<script>
                alert('ID Peminjaman $id_peminjaman belum ada di tabel peminjaman!');
                window.history.back();
              </script>";
        exit;
    }

    // Update data
    $query = "UPDATE pengembalian SET
        id_pengembalian='$id_pengembalian',
        id_peminjaman='$id_peminjaman',
        tanggal_pengembalian='$tanggal_pengembalian',
        denda='$denda'
        WHERE id_pengembalian='$id_lama'";

    if ($conn->query($query)) {

        echo "<script>
                alert('Data berhasil diubah!');
                window.location.href='tampil.php';
              </script>";
        exit;

    } else {

        echo "Data gagal diubah: " . $conn->error;
    }
}


// Ambil data berdasarkan ID
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $data = $conn->query("
        SELECT *
        FROM pengembalian
        WHERE id_pengembalian='$id'
    ");

    $row = $data->fetch_assoc();

    if (!$row) {
        die("Data pengembalian tidak ditemukan!");
    }

} else {
    die("ID pengembalian tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Pengembalian</title>
</head>

<body>

<h2>Edit Data Pengembalian</h2>

<form method="POST">

    <!-- ID lama disimpan untuk menentukan data yang diedit -->
    <input type="hidden"
           name="id_lama"
           value="<?= $row['id_pengembalian']; ?>">

    ID Pengembalian:<br>

    <input type="text"
           name="id_pengembalian"
           value="<?= $row['id_pengembalian']; ?>"
           required>

    <br><br>

    ID Peminjaman:<br>

    <input type="text"
           name="id_peminjaman"
           value="<?= $row['id_peminjaman']; ?>"
           required>

    <br><br>

    Tanggal Pengembalian:<br>

    <input type="date"
           name="tanggal_pengembalian"
           value="<?= $row['tanggal_pengembalian']; ?>"
           required>

    <br><br>

    Denda:<br>

    <input type="number"
           name="denda"
           value="<?= $row['denda']; ?>"
           min="0"
           required>

    <br><br>

    <button type="submit" name="update">
        Simpan Perubahan
    </button>

    <button type="button"
            onclick="window.location.href='tampil.php'">
        Kembali
    </button>

    <button type="reset">
        Reset
    </button>

</form>

</body>
</html>
