<?php
include "connection.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM buku WHERE id_buku='$id'");

if ($query) {
    header("Location: tampil.php");
    exit;
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>