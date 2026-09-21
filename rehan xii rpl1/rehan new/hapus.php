<?php
include "connection.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota='$id'");

if ($query) {
    header("Location: tampil.php");
    exit;
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>