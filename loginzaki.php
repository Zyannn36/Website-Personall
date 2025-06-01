<?php
session_start();
$usersFile = 'users.txt';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $users = file($usersFile, FILE_IGNORE_NEW_LINES);
    $found = false;

    foreach ($users as $user) {
        list($savedUser, $savedHash) = explode(':', $user);
        if ($username === $savedUser && password_verify($password, $savedHash)) {
            $_SESSION['user'] = $username;
            header("Location: index.html");
            exit;
        }
    }

    $error = "Username atau password salah!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Pengguna</title>
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

    .login-box {
      background: linear-gradient(145deg, #0ff0fc, #ff0080);
      padding: 4px;
      border-radius: 15px;
      box-shadow: 0 0 20px #0ff0fc, 0 0 40px #ff0080;
    }

    .login-inner {
      background-color: #121212;
      padding: 40px;
      border-radius: 12px;
      text-align: center;
      box-shadow: inset 0 0 20px rgba(0, 255, 255, 0.1);
    }

    .login-inner h2 {
      margin-bottom: 25px;
      font-size: 32px;
      color: #0ff0fc;
      text-shadow: 0 0 10px #0ff0fc, 0 0 20px #ff0080;
    }

    .login-inner input {
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

    .login-inner input:focus {
      border-color: #ff0080;
      box-shadow: 0 0 10px #ff0080;
    }

    .login-inner button {
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

    .login-inner button:hover {
      transform: scale(1.05);
      box-shadow: 0 0 20px #0ff0fc, 0 0 30px #ff0080;
    }

    .login-inner p {
      margin-top: 15px;
    }

    .login-inner a {
      color: #ff0080;
      text-decoration: none;
      font-weight: bold;
    }

    .login-inner a:hover {
      text-shadow: 0 0 5px #ff0080;
    }

    .error {
      color: #ff4d4d;
      margin-bottom: 10px;
      text-shadow: 0 0 5px red;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <div class="login-inner">
      <h2>Login Pengguna</h2>
      <?php if ($error) echo "<p class='error'>$error</p>"; ?>
      <form method="post">
        <input name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>
      <p>Belum punya akun? <a href="loginzaki2.php">Daftar di sini</a></p>
    </div>
  </div>
</body>
</html>