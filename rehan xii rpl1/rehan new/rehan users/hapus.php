<?php
include "connection.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM users WHERE id_user='$id'");


if ($query) {
    header("Location: tampil.php");
    exit;
} else {
    echo "Gagal menghapus: " . mysqli_error($conn);
}
?>