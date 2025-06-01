<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List Mahasiswa - Cyber Theme</title>
    <style>
        body {
            background-color: #0e0e0e;
            color: #00ffcc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #00ffff;
            text-shadow: 0 0 10px #00ffff;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #1a1a1a;
            box-shadow: 0 0 15px #00ffcc;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 16px;
            text-align: center;
            border-bottom: 1px solid #00ffcc33;
        }

        th {
            background-color: #111;
            color: #00ffff;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:hover {
            background-color: #00ffcc22;
        }

        a {
            color: #00ffff;
            text-decoration: none;
            font-weight: bold;
            transition: 0.2s;
        }

        a:hover {
            color: #ff00cc;
            text-shadow: 0 0 8px #ff00cc;
        }

        .btn-action {
            display: inline-block;
            margin: 0 5px;
        }

        .button-row {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .input-btn,
        .back-btn {
            text-decoration: none;
            font-weight: bold;
            padding: 12px 24px;
            border-radius: 8px;
            background-color: #00f0ff;
            color: #0f0f0f;
            box-shadow: 0 0 15px #00f0ff;
            transition: 0.3s;
        }

        .input-btn:hover,
        .back-btn:hover {
            background-color: #ff00cc;
            color: #000;
            box-shadow: 0 0 20px #ff00cc;
        }
    </style>
</head>
<body>

<h2>List Mahasiswa</h2>

<table>
    <tr>
        <th>NO</th>
        <th>NIM</th>
        <th>ID_MAHASISWA</th>
        <th>NAMA</th>
        <th>GENDER</th>
        <th>JURUSAN</th>
        <th>ALAMAT</th>
        <th>AKSI</th>
    </tr>
    <?php
    include 'koneksizaki.php';
    $mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa1");
    $no = 1;
    while ($row = mysqli_fetch_assoc($mahasiswa)) {
        $jenis_kelamin = ($row['jenis_kelamin'] == 'P') ? 'Perempuan' : 'Laki-laki';
        echo "<tr>
                <td>{$no}</td>
                <td>{$row['nim']}</td>
                <td>{$row['id_mahasiswa']}</td>
                <td>{$row['nama']}</td>
                <td>{$jenis_kelamin}</td>
                <td>{$row['jurusan']}</td>
                <td>{$row['alamat']}</td>
                <td>
                    <a class='btn-action' href='editzaki.php?id_mahasiswa={$row['id_mahasiswa']}'>Edit</a>
                    <a class='btn-action' href='deletezaki.php?id_mahasiswa={$row['id_mahasiswa']}' onclick=\"return confirm('Yakin ingin menghapus data ini?')\">Delete</a>
                </td>
              </tr>";
        $no++;
    }
    ?>
</table>

<div class="button-row">
    <a href="inputzakii.php" class="input-btn">Input Mahasiswa</a>
    <a href="index.html" class="back-btn">Kembali</a>
</div>

</body>
</html>
