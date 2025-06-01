<?php
include 'koneksizaki.php';
$id         = $_GET['id_mahasiswa'];
$mahasiswa  = mysqli_query($koneksi, "SELECT * FROM mahasiswa1 WHERE id_mahasiswa='$id'");
$row        = mysqli_fetch_array($mahasiswa);

$jurusan = array('TEKNIK INFORMATIKA','TEKNIK ELEKTRO','REKAMEDIS','TEKNIK INDUSTRI','TEKNIK MESIN','TEKNIK PERTANIAN');

function active_radio_button($value, $input) {
    return $value == $input ? 'checked' : '';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa - Cyber Theme</title>
    <style>
        body {
            background-color: #0d0d0d;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #00ffff;
            margin: 0;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #00ffff;
            text-shadow: 0 0 10px #00ffff;
            margin-bottom: 30px;
        }

        form {
            max-width: 600px;
            margin: auto;
            background: #1a1a1a;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px #00ffff50;
        }

        table {
            width: 100%;
        }

        td {
            padding: 12px 8px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            background-color: #0d0d0d;
            border: 1px solid #00ffff99;
            border-radius: 6px;
            color: #00ffff;
            font-size: 15px;
            outline: none;
            box-shadow: 0 0 5px #00ffff44;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        label {
            margin-right: 15px;
        }

        button {
            background-color: #00ffff;
            color: #000;
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            background-color: #ff00cc;
            color: #fff;
            box-shadow: 0 0 10px #ff00cc;
        }

        a {
            color: #00ffff;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
            transition: 0.3s;
        }

        a:hover {
            color: #ff00cc;
            text-shadow: 0 0 5px #ff00cc;
        }
    </style>
</head>
<body>

<h2>Form Edit Data Mahasiswa</h2>

<form method="post" action="updatezakii.php">
    <input type="hidden" value="<?php echo $row['id_mahasiswa']; ?>" name="id_mahasiswa">
    <table>
        <tr>
            <td><strong>NIM</strong></td>
            <td><input type="text" value="<?php echo $row['nim']; ?>" name="nim" required></td>
        </tr>
        <tr>
            <td><strong>Nama</strong></td>
            <td><input type="text" value="<?php echo $row['nama']; ?>" name="nama" required></td>
        </tr>
        <tr>
            <td><strong>Jenis Kelamin</strong></td>
            <td>
                <label>
                    <input type="radio" name="jenis_kelamin" value="L" <?php echo active_radio_button("L", $row['jenis_kelamin']); ?>> Laki-Laki
                </label>
                <label>
                    <input type="radio" name="jenis_kelamin" value="P" <?php echo active_radio_button("P", $row['jenis_kelamin']); ?>> Perempuan
                </label>
            </td>
        </tr>
        <tr>
            <td><strong>Jurusan</strong></td>
            <td>
                <select name="jurusan" required>
                    <?php
                    foreach ($jurusan as $j) {
                        $selected = ($row['jurusan'] == $j) ? 'selected' : '';
                        echo "<option value=\"$j\" $selected>$j</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><strong>Alamat</strong></td>
            <td><input type="text" value="<?php echo $row['alamat']; ?>" name="alamat" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <button type="submit">Simpan Perubahan</button>
                <a href="indexzakii.php">Kembali</a>
            </td>
        </tr>
    </table>
</form>

</body>
</html>
