<?php
include "connection.php";

if (isset($_POST['simpan'])) {

    $id_pengembalian = $_POST['id_pengembalian'];
    $id_peminjaman = $_POST['id_peminjaman'];
    $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
    $denda = $_POST['denda'];

    $query = "INSERT INTO pengembalian
              (id_pengembalian, id_peminjaman, tanggal_pengembalian, denda)
              VALUES
              ('$id_pengembalian',
               '$id_peminjaman',
               '$tanggal_pengembalian',
               '$denda')";

    if ($conn->query($query)) {

        echo "<script>
                alert('Data berhasil ditambahkan!');
                window.location.href='tampil.php';
              </script>";
        exit;

    } else {

        echo "Data gagal ditambahkan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Pengembalian</title>
</head>

<body>

<h2>Tambah Data Pengembalian</h2>

<form method="POST">

    <label>Id Pengembalian:</label><br>
    <input type="text" name="id_pengembalian" required>
    <br><br>

    <label>Id Peminjaman:</label><br>
    <input type="text" name="id_peminjaman" required>
    <br><br>

    <label>Tanggal Pengembalian:</label><br>
    <input type="date" name="tanggal_pengembalian" required>
    <br><br>

    <label>Denda:</label><br>
    <input type="number" name="denda" min="0" value="0" required>
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
