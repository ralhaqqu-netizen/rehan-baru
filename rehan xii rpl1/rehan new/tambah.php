<?php
include "connection.php";

if (isset($_POST['simpan'])) {
    $nama_anggota = $_POST['nama_anggota'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    
    $query = "INSERT INTO anggota 
    (nama_anggota, kelas, alamat, no_telp) 
    VALUES 
    ('$nama_anggota', '$kelas', '$alamat', '$no_telp')";

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
    <title>Tambah Data Anggota</title>
</head>
<body>

<h2>Tambah Data Anggota</h2>

<form method="POST">

    Id Anggota:<br>
    <input type="text" name="id_anggota"><br><br>

    Nama Angota:<br>
    <input type="text" name="nama_anggota"><br><br>

    Kelas:<br>
    <input type="text" name="kelas"><br><br>

    Alamat:<br>
    <input type="text" name="alamat"><br><br>

    No_Telp:<br>
    <input type="text" name="no_telp"><br><br>

    <button type="submit" name="simpan">Simpan</button>
  <button type="submit" name="simpan">Kembali</button>
  <button type="submit" name="simpan">Reset</button>

</form>


</body>
</html>