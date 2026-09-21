<?php
include "connection.php";

$query = "SELECT * FROM users";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
    <link rel="stylesheet" href="data.css?v=123">
</head>
<body>

<h2>Data User</h2>
  <a href="tambah.php" class="btn">TAMBAH DATA</a>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
        <th>aksi</th>
        
  
    </tr>

    <?php
    foreach ($data as $row) {
    ?>
<tr>
    <td><?= $row['id_user']; ?></td>
    <td><?= $row['username']; ?></td>
    <td><?= $row['password']; ?></td>
    <td><?= $row['role']; ?></td>
    
    <td>
        <a href="edit.php?id=<?= $row['id_user']; ?>">Edit</a><br>

        <a href="hapus.php?id=<?= $row['id_user']; ?>"
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
