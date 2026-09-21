<?php
include "connection.php";

$query = "SELECT * FROM peminjaman";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="data.css?v=123">
</head>
<body>

<h2>Data Peminjaman</h2>
  <a href="tambah.php" class="btn">TAMBAH DATA</a>
<table>
    <tr>
        <th>ID Peminjaman</th>
        <th>ID Anggota</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
        <th>aksi</th>
        
  
    </tr>

    <?php
    foreach ($data as $row) {
    ?>
<tr>
    <td><?= $row['id_peminjaman']; ?></td>
    <td><?= $row['id_anggota']; ?></td>
    <td><?= $row['tanggal_pinjam']; ?></td>
    <td><?= $row['tanggal_kembali']; ?></td>
    <td><?= $row['status']; ?></td>
    
    <td>
        <a href="edit.php?id=<?= $row['id_peminjaman']; ?>">Edit</a><br>

        <a href="hapus.php?id=<?= $row['id_peminjaman']; ?>"
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
