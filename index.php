
<?php
require_once "koneksi.php";

$sql = "SELECT * FROM siswa ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$total_siswa = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>

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

        .menu.active,
        .menu:hover {
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

        .stats {
            background: white;
            padding: 22px;
            border-radius: 15px;
            width: 230px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px #00000008;
        }

        .stats p {
            color: #849087;
            margin-bottom: 10px;
        }

        .stats h2 {
            font-size: 30px;
            color: #526e59;
        }

        .content {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 4px 15px #00000008;
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
        }

        .content-header h2 {
            font-size: 20px;
        }

        .btn-tambah {
            background: #718875;
            color: white;
            text-decoration: none;
            padding: 11px 17px;
            border-radius: 9px;
            font-size: 14px;
        }

        .btn-tambah:hover {
            background: #526e59;
        }

        .search {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e1e5df;
            border-radius: 9px;
            margin-bottom: 20px;
            outline: none;
        }

        .search:focus {
            border-color: #718875;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #eef2ec;
            color: #526e59;
            text-align: left;
            padding: 15px;
            font-size: 14px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #edf0eb;
            font-size: 14px;
        }

        tr:hover td {
            background: #fafbf8;
        }

        .badge-kelas {
            background: #fcebdc;
            color: #bd7947;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
        }

        .aksi a {
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-right: 10px;
        }

        .edit {
            color: #62806a;
        }

        .hapus {
            color: #d46d60;
        }

        .kosong {
            text-align: center;
            color: #999;
            padding: 25px;
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
                overflow-x: auto;
            }

            .content {
                min-width: 500px;
            }

            .content-header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <aside class="sidebar">
        <div class="brand">SISWA.</div>

        <a href="index.php" class="menu active">Dashboard</a>
        <a href="index.php" class="menu">Data Siswa</a>
        <a href="tambah.php" class="menu">Tambah Siswa</a>
    </aside>

    <main class="main">

        <div class="header">
            <h1>Dashboard</h1>
            <p>Selamat datang di aplikasi pengelolaan data siswa.</p>
        </div>

        <div class="stats">
            <p>Total Data Siswa</p>
            <h2><?= $total_siswa; ?></h2>
        </div>

        <section class="content">

            <div class="content-header">
                <h2>Daftar Siswa</h2>
                <a href="tambah.php" class="btn-tambah">+ Tambah Siswa</a>
            </div>

            <input
                type="text"
                id="cari"
                class="search"
                placeholder="Cari NIS, nama, atau kelas..."
            >

            <table id="tabelSiswa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $no = 1;

                if ($total_siswa > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nis']); ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td>
                            <span class="badge-kelas">
                                <?= htmlspecialchars($row['kelas']); ?>
                            </span>
                        </td>
                        <td class="aksi">
                            <a class="edit"
                               href="edit.php?id=<?= $row['id']; ?>">
                               Edit
                            </a>

                            <a class="hapus"
                               href="hapus.php?id=<?= $row['id']; ?>"
                               onclick="return confirm('Yakin ingin menghapus data siswa ini?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="5" class="kosong">
                            Belum ada data siswa.
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </section>

    </main>
</div>

<script>
    document.getElementById("cari").addEventListener("keyup", function () {
        let keyword = this.value.toLowerCase();
        let rows = document.querySelectorAll("#tabelSiswa tbody tr");

        rows.forEach(function (row) {
            row.style.display = row.textContent.toLowerCase().includes(keyword)
                ? ""
                : "none";
        });
    });
</script>

</body>
</html>
