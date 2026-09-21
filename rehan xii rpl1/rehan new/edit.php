<?php
include "connection.php";

// Proses update
if (isset($_POST['update'])) {

    $id_lama = $_POST['id_lama'];
    $id_anggota = $_POST['id_anggota'];
    $nama_anggota = $_POST['nama_anggota'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    $query = "UPDATE anggota SET
        id_anggota='$id_anggota',
        nama_anggota='$nama_anggota',
        kelas='$kelas',
        alamat='$alamat',
        no_telp='$no_telp'
        WHERE id_anggota='$id_lama'";

    if (mysqli_query($conn, $query)) {
        header("Location: tampil.php");
        exit;
    } else {
        echo "Data gagal diubah: " . mysqli_error($conn);
    }
}


// Ambil data berdasarkan ID
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "SELECT * FROM anggota WHERE id_anggota='$id'";
    $data = mysqli_query($conn, $query);

    if (mysqli_num_rows($data) > 0) {
        $row = mysqli_fetch_assoc($data);
    } else {
        die("Data anggota tidak ditemukan!");
    }

} else {
    die("ID anggota tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Anggota</title>
</head>

<body>

<h2>Edit Data Anggota</h2>

<form method="POST">

    <!-- ID lama disimpan untuk mencari data -->
    <input type="hidden"
           name="id_lama"
           value="<?= $row['id_anggota']; ?>">

    ID Anggota:<br>
    <input type="text"
           name="id_anggota"
           value="<?= $row['id_anggota']; ?>">
    <br><br>

    Nama Anggota:<br>
    <input type="text"
           name="nama_anggota"
           value="<?= $row['nama_anggota']; ?>">
    <br><br>

    Kelas:<br>
    <input type="text"
           name="kelas"
           value="<?= $row['kelas']; ?>">
    <br><br>

    Alamat:<br>
    <input type="text"
           name="alamat"
           value="<?= $row['alamat']; ?>">
    <br><br>

    No Telp:<br>
    <input type="text"
           name="no_telp"
           value="<?= $row['no_telp']; ?>">
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
 