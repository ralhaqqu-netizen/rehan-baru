<?php

include "connection.php";

$id = $_GET['id'] ?? '';

$stmt = mysqli_prepare($conn, "DELETE FROM pengembalian WHERE id_pengembalian = ?");
mysqli_stmt_bind_param($stmt, "s", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: tampil.php");
    exit;
}

echo "Gagal menghapus: " . mysqli_error($conn);
?>