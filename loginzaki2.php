<?php
$usersFile = 'users.txt';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $confirm = trim($_POST['confirm'] ?? '');

    if ($username === '' || $password === '' || $confirm === '') {
        $error = "Semua field harus diisi!";
    } elseif ($password !== $confirm) {
        $error = "Password dan konfirmasi tidak cocok!";
    } else {
        if (!file_exists($usersFile)) {
            file_put_contents($usersFile, '');
        }
        $users = file($usersFile, FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            list($savedUser) = explode(":", $user);
            if ($savedUser === $username) {
                $error = "Username sudah digunakan!";
                break;
            }
        }
        if ($error === '') {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            file_put_contents($usersFile, "$username:$hash\n", FILE_APPEND);
            $success = "Pendaftaran berhasil! <a href='loginzaki.php'>Login di sini</a>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Pengguna</title>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Orbitron', sans-serif;
      background-color: #121212;
      color: #fff;
      margin: 0;
      padding: 0;
      display: flex;
      height: 100vh;
      align-items: center;
      justify-content: center;
      background-image: linear-gradient(135deg, #050505, #0f0f0f, #1a1a1a);
    }

    .register-box {
      background: linear-gradient(145deg, #0ff0fc, #ff0080);
      padding: 4px;
      border-radius: 15px;
      box-shadow: 0 0 20px #0ff0fc, 0 0 40px #ff0080;
    }

    .register-inner {
      background-color: #121212;
      padding: 40px;
      border-radius: 12px;
      text-align: center;
      box-shadow: inset 0 0 20px rgba(0, 255, 255, 0.1);
    }

    .register-inner h2 {
      margin-bottom: 25px;
      font-size: 32px;
      color: #0ff0fc;
      text-shadow: 0 0 10px #0ff0fc, 0 0 20px #ff0080;
    }

    .register-inner input {
      width: 100%;
      padding: 14px;
      margin: 12px 0;
      background-color: #111;
      border: 1px solid #0ff0fc;
      border-radius: 5px;
      color: #fff;
      font-size: 16px;
      outline: none;
      box-shadow: 0 0 5px #0ff0fc;
      transition: 0.3s;
    }

    .register-inner input:focus {
      border-color: #ff0080;
      box-shadow: 0 0 10px #ff0080;
    }

    .register-inner button {
      width: 100%;
      padding: 14px;
      margin-top: 10px;
      background: linear-gradient(135deg, #0ff0fc, #ff0080);
      border: none;
      color: #111;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      text-transform: uppercase;
      box-shadow: 0 0 15px rgba(0, 255, 255, 0.4);
      transition: 0.3s ease;
    }

    .register-inner button:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px #0ff0fc, 0 0 30px #ff0080;
    }

    .register-inner p {
      margin-top: 15px;
    }

    .register-inner a {
      color: #ff0080;
      text-decoration: none;
      font-weight: bold;
    }

    .register-inner a:hover {
      text-shadow: 0 0 5px #ff0080;
    }

    .error {
      color: #ff4d4d;
      margin-bottom: 10px;
      text-shadow: 0 0 5px red;
    }

    .success {
      color: #00ff99;
      margin-bottom: 10px;
      text-shadow: 0 0 5px #00ff99;
    }
  </style>
</head>
<body>
  <div class="register-box">
    <div class="register-inner">
      <h2>Daftar Akun</h2>
      <?php if ($error) echo "<p class='error'>$error</p>"; ?>
      <?php if ($success) echo "<p class='success'>$success</p>"; ?>
      <form method="post">
        <input name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm" placeholder="Konfirmasi Password" required>
        <button type="submit">Daftar</button>
      </form>
    </div>
  </div>
</body>
</html>