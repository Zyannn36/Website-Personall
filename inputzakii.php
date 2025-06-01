<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Mahasiswa - Cyber Theme</title>
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
            margin-bottom: 30px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px #00ffcc;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            background-color: #121212;
            border: 1px solid #00ffcc;
            color: #00ffcc;
            border-radius: 6px;
        }

        input[type="radio"] {
            margin-right: 6px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #00f0ff;
            color: #0f0f0f;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            box-shadow: 0 0 15px #00f0ff;
            transition: 0.3s;
        }

        button:hover {
            background-color: #ff00cc;
            box-shadow: 0 0 20px #ff00cc;
            color: #000;
        }
    </style>
</head>
<body>

<h2>Form Input Mahasiswa</h2>

<div class="form-container">
    <form method="post" action="simpanzaki.php">
        <table>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nim" onkeyup="isi_otomatis()"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>
                    <label><input type="radio" name="jenis_kelamin" value="L"> Laki-Laki</label>
                    <label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
                </td>
            </tr>
            <tr>
                <td>JURUSAN</td>
                <td>
                    <select name="jurusan">
                        <option value="TEKNIK INFORMATIKA">TEKNIK INFORMATIKA</option>
                        <option value="TEKNIK MESIN">TEKNIK MESIN</option>
                        <option value="TEKNIK KIMIA">TEKNIK KIMIA</option>
                        <option value="TEKNIK PERTANIAN">TEKNIK PERTANIAN</option>
                        <option value="TEKNIK INDUSTRI">TEKNIK INDUSTRI</option>
                        <option value="TEKNIK ELEKTRO">TEKNIK ELEKTRO</option>
                        <option value="TEKNIK REKAMEDIS">TEKNIK REKAMEDIS</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" value="simpan">SIMPAN</button></td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
