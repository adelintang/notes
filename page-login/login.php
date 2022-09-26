<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location: ../index.php");
  exit;
}

if (isset($_POST["login"])) {
  $user = $_POST["user"];
  $pass = $_POST["pass"];

  if ($user == 'admin' && $pass == 'admin123') {
    // set session
    $_SESSION["login"] = true;

    echo "
      <script>
        alert('Login Berhasil');
        document.location.href='../index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Username / Password salah!');
     </script>
    ";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login-style.css?v=<?= time(); ?>">
</head>

<body>
  <div class="container">
    <form action="" method="post" class="box">
      <h1>Login</h1>
      <div class="item">
        <div class="user-box">
          <input type="text" name="user" id="user" required autocomplete="off"><br>
          <label for="user">Username</label>
        </div>

        <div class="user-box">
          <input type="password" name="pass" id="pass" required autocomplete="off">
          <label for="pass">Password</label>
        </div>
      </div>
      <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>

</html>