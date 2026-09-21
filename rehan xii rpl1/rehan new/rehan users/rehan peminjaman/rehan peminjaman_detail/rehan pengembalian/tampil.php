<?php
include "connection.php";

$query = "SELECT * FROM pengembalian";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengembalian</title>
    <link rel="stylesheet" href="data.css?v=123">
</head>
<body>

<h2>Data Pengembalian</h2>

<a href="tambah.php" class="btn">TAMBAH DATA</a>

<table>
    <tr>
        <th>ID Pengembalian</th>
        <th>ID Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Denda</th>
        <th>Aksi</th>
    </tr>

    <?php
    foreach ($data as $row) {
    ?>

    <tr>
        <td><?= $row['id_pengembalian']; ?></td>
        <td><?= $row['id_peminjaman']; ?></td>
        <td><?= $row['tanggal_pengembalian']; ?></td>
        <td><?= $row['denda']; ?></td>

        <td>
            <a href="edit.php?id=<?= $row['id_pengembalian']; ?>">Edit</a><br>

            <a href="hapus.php?id=<?= $row['id_pengembalian']; ?>"
            onclick="return confirm('Yakin ingin menghapus data ini?')">
                Hapus
            </a>
        </td>
    </tr>

    <?php
    }
    ?>

</table>

</body>
</html>
