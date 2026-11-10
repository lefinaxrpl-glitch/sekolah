
<?php
require_once "koneksi.php";

$sql = "SELECT * FROM siswa";
$result = mysqli_query($conn, $sql);

echo "<h2>DAFTAR SISWA</h2>";

$no = 1;

while ($row = mysqli_fetch_assoc($result)) {
    echo $no . ". " . $row['nama'] . "<br>";
    $no++;
}
?>
