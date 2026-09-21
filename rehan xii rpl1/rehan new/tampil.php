<?php
include "connection.php";

$query = "SELECT * FROM anggota";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <link rel="stylesheet" href="data.css?v=123">
</head>
<body>

<h2>Data Anggota</h2>

<a href="tambah.php" class="btn">TAMBAH DATA</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nama Anggota</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($data as $row) { ?>
    <tr>
        <td><?= $row['id_anggota']; ?></td>
        <td><?= $row['nama_anggota']; ?></td>
        <td><?= $row['kelas']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['no_telp']; ?></td>

        <td>
            <a href="edit.php?id=<?= $row['id_anggota']; ?>">
                Edit
            </a>

            <br>

            <a href="hapus.php?id=<?= $row['id_anggota']; ?>"
               onclick="return confirm('Yakin ingin menghapus data ini?')">
                Hapus
            </a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>