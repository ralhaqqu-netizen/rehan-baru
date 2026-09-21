<?php
include "connection.php";

$query = "SELECT * FROM buku";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Perpus</title>
    <link rel="stylesheet" href="data.css?v=123">
</head>
<body>

<h2>Data Perpus</h2>
  <a href="tambah.php" class="btn">TAMBAH DATA</a>
<table>
    <tr>
        <th>id_buku</th>
        <th>judul_buku</th>
        <th>penulis</th>
        <th>penerbit</th>
        <th>tahun_terbit</th>
        <th>stok</th>
        <th>aksi</th>
        
  
    </tr>

    <?php
    foreach ($data as $row) {
    ?>
<tr>
    <td><?= $row['id_buku']; ?></td>
    <td><?= $row['judul_buku']; ?></td>
    <td><?= $row['penulis']; ?></td>
    <td><?= $row['penerbit']; ?></td>
    <td><?= $row['tahun_terbit']; ?></td>
    <td><?= $row['stok']; ?></td>

    <td>
        <a href="edit.php?id=<?= $row['id_buku']; ?>">Edit</a><br>

        <a href="hapus.php?id=<?= $row['id_buku']; ?>"
        onclick="return confirm('Yakin ingin menghapus data ini?')">
        Hapus
        </a>
    </td>
</tr>

<?php
}
?>

</table>

</div>

</body>
</html>