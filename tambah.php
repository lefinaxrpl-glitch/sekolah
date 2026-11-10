
<?php
require_once "koneksi.php";

$pesan = "";

if (isset($_POST['simpan'])) {
    $nis = trim($_POST['nis']);
    $nama = trim($_POST['nama']);
    $kelas = trim($_POST['kelas']);

    $sql = "INSERT INTO siswa (nis, nama, kelas) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sss", $nis, $nama, $kelas);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    } else {
        $pesan = "Gagal menambahkan data siswa!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f6f5ef;
            color: #34483b;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 230px;
            background: #34483b;
            color: white;
            padding: 30px 20px;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 45px;
        }

        .menu {
            display: block;
            color: #dce6dc;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .menu:hover,
        .menu.active {
            background: #718875;
            color: white;
        }

        .main {
            flex: 1;
            padding: 40px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #849087;
        }

        .form-card {
            background: white;
            max-width: 650px;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 15px #00000008;
        }

        .form-card h2 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .deskripsi {
            color: #849087;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #e1e5df;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
            background: #fdfdfb;
        }

        input:focus {
            border-color: #718875;
            box-shadow: 0 0 0 3px #71887520;
        }

        .tombol {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        button {
            border: none;
            background: #718875;
            color: white;
            padding: 12px 22px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background: #526e59;
        }

        .kembali {
            text-decoration: none;
            background: #f0f1ec;
            color: #526e59;
            padding: 12px 22px;
            border-radius: 9px;
            font-size: 14px;
        }

        .kembali:hover {
            background: #e4e9e1;
        }

        .pesan {
            background: #fce8e6;
            color: #b84e43;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        @media (max-width: 700px) {
            .sidebar {
                width: 75px;
                padding: 20px 10px;
            }

            .brand {
                font-size: 12px;
                text-align: center;
            }

            .menu {
                font-size: 11px;
                text-align: center;
                padding: 12px 5px;
            }

            .main {
                padding: 20px 12px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <aside class="sidebar">
        <div class="brand">SISWA.</div>

        <a href="index.php" class="menu">Dashboard</a>
        <a href="index.php" class="menu">Data Siswa</a>
        <a href="tambah.php" class="menu active">Tambah Siswa</a>
    </aside>

    <main class="main">

        <div class="header">
            <h1>Tambah Siswa</h1>
            <p>Tambahkan data siswa baru ke dalam sistem.</p>
        </div>

        <div class="form-card">

            <h2>Formulir Data Siswa</h2>
            <p class="deskripsi">Silakan isi informasi siswa dengan benar.</p>

            <?php if ($pesan != "") { ?>
                <div class="pesan">
                    <?= htmlspecialchars($pesan); ?>
                </div>
            <?php } ?>

            <form method="POST">

                <div class="form-group">
                    <label>NIS</label>
                    <input
                        type="text"
                        name="nis"
                        placeholder="Masukkan NIS siswa"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input
                        type="text"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Kelas</label>
                    <input
                        type="text"
                        name="kelas"
                        placeholder="Contoh: XII RPL 2"
                        required
                    >
                </div>

                <div class="tombol">
                    <button type="submit" name="simpan">
                        Simpan Data
                    </button>

                    <a href="index.php" class="kembali">
                        Kembali
                    </a>
                </div>

            </form>

        </div>

    </main>

</div>

</body>
</html>
