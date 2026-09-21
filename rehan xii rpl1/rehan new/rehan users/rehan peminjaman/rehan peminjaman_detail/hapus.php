<?php

include "connection.php";

$id = $_GET['id'] ?? '';

$stmt = mysqli_prepare($conn, "DELETE FROM peminjaman_detail WHERE id_detail = ?");
mysqli_stmt_bind_param($stmt, "s", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: tampil.php");
    exit;
}

echo "Gagal menghapus: " . mysqli_error($conn);
?>