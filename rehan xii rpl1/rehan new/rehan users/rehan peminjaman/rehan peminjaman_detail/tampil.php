<?php
include "connection.php";

$query = "SELECT * FROM peminjaman_detail";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman Detail</title>
    <link rel="stylesheet" href="data.css?v=123">
</head>
<body>

<h2>Data Peminjaman Detail</h2>

<a href="tambah.php" class="btn">TAMBAH DATA</a>

<table>
    <tr>
        <th>ID Detail</th>
        <th>ID Peminjaman</th>
        <th>ID Buku</th>
        <th>Jumlah</th>
        <th>Aksi</th>
    </tr>

    <?php
    foreach ($data as $row) {
    ?>

    <tr>
        <td><?= $row['id_detail']; ?></td>
        <td><?= $row['id_peminjaman']; ?></td>
        <td><?= $row['id_buku']; ?></td>
        <td><?= $row['jumlah']; ?></td>

        <td>
            <a href="edit.php?id=<?= $row['id_detail']; ?>">Edit</a><br>

            <a href="hapus.php?id=<?= $row['id_detail']; ?>"
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
