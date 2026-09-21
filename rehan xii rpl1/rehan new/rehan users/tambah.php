<?php
include "connection.php";

if (isset($_POST['simpan'])) {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    $query = "INSERT INTO users 
    (id_user, username, password, role) 
    VALUES 
    ('$id_user', '$username', '$password', '$role')";

    if ($conn->query($query)) {
        header("Location: tampil.php");
        exit;
    } else {
        echo "Data gagal ditambahkan: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data User</title>
</head>
<body>

<h2>Tambah Data User</h2>

<form method="POST">

    Id User:<br>
    <input type="text" name="id_user"><br><br>

    Username:<br>
    <input type="text" name="username"><br><br>

    Password:<br>
    <input type="text" name="password"><br><br>

    Role:<br>
    <input type="text" name="role"><br><br>

    <button type="submit" name="simpan">Simpan</button>
    <button type="submit" name="simpan">Kembali</button>
    <button type="submit" name="simpan">Reset</button>

</form>

</body>
</html>
