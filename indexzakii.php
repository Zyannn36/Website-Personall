<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>List Mahasiswa - Cyber Theme</title>
    <style>
        body {
            background-color: #0a0a0a;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #00ffe7;
            padding: 50px;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #00ffe7;
            text-shadow: 0 0 12px #00ffe7;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #111;
            box-shadow: 0 0 20px #00ffe740;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #00ffe720;
            text-align: center;
        }

        th {
            background-color: #111;
            color: #00ffe7;
            text-shadow: 0 0 5px #00ffe7;
        }

        tr:hover {
            background-color: #1a1a1a;
        }

        a {
            color: #00ffe7;
            text-decoration: none;
            font-weight: bold;
            margin: 0 5px;
            transition: all 0.3s ease;
        }

        a:hover {
            color: #ff00cc;
            text-shadow: 0 0 5px #ff00cc;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 20px;
            padding: 12px 20px;
            background: linear-gradient(145deg, #00ffe7, #00bfa6);
            color: #000;
            font-weight: bold;
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 0 10px #00ffe740;
            transition: all 0.3s ease;
        }

        .add-btn:hover {
            background: #ff00cc;
            color: #fff;
            box-shadow: 0 0 15px #ff00cc;
        }
    </style>
</head>
<body>

<h2>List Mahasiswa</h2>

<a class="add-btn" href="inputzaki.php">+ Tambah Mahasiswa</a>

<table>
    <tr>
        <th>NO</th>
        <th>ID</th>
        <th>NIM</th>
        <th>NAMA</th>
        <th>GENDER</th>
        <th>JURUSAN</th>
        <th>ALAMAT</th>
        <th>HOBY</th>
    </tr>

    <?php
    include 'koneksizaki.php';
    $mahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa1");
    $no = 1;
    foreach ($mahasiswa as $row) {
        $jenis_kelamin = $row['jenis_kelamin'] == 'P' ? 'Perempuan' : 'Laki-laki';
        echo "<tr>
            <td>$no</td>
            <td>{$row['id_mahasiswa']}</td>
            <td>{$row['nim']}</td>
            <td>{$row['nama']}</td>
            <td>$jenis_kelamin</td>
            <td>{$row['jurusan']}</td>
            <td>{$row['alamat']}</td>
			<td>{$row['hoby']}</td>
            <td>
                <a href='editzaki.php?id_mahasiswa={$row['id_mahasiswa']}'>Edit</a> |
                <a href='deletezaki.php?id_mahasiswa={$row['id_mahasiswa']}' onclick='return confirm(\"Hapus data ini?\")'>Delete</a>
            </td>
        </tr>";
        $no++;
    }
    ?>
</table>

</body>
</html>
