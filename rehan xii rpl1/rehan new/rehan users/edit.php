<?php
include "connection.php";

// Proses update
if (isset($_POST['update'])) {

    $id_lama = $_POST['id_lama'];
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "UPDATE users SET
        id_user='$id_user',
        username='$username',
        password='$password',
        role='$role'
        WHERE id_user='$id_lama'";

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
        "SELECT * FROM users WHERE id_user='$id'"
    );

    $row = $data->fetch_assoc();

} else {
    die("ID user tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data User</title>
</head>

<body>

<h2>Edit Data User</h2>

<form method="POST">

    <!-- ID LAMA disimpan -->
    <input type="hidden" name="id_lama"
    value="<?= $row['id_user']; ?>">

    ID User:<br>
    <input type="text" name="id_user"
    value="<?= $row['id_user']; ?>"><br><br>

    Username:<br>
    <input type="text" name="username"
    value="<?= $row['username']; ?>"><br><br>

    Password:<br>
    <input type="text" name="password"
    value="<?= $row['password']; ?>"><br><br>

    Role:<br>
    <input type="text" name="role"
    value="<?= $row['role']; ?>"><br><br>

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
