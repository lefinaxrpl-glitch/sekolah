
<?php
require_once "koneksi.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM siswa WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php?pesan=hapus");
    exit;
} else {
    echo "Gagal menghapus data siswa!";
}
?>
