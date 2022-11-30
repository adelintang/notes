<?php
require '../function.php';

if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
    echo "
      <script>
        alert('Registrasi Berhasil');
        document.location.href='../page-login/login.php';
      </script>
    ";
  } else {
    echo "
    <script>
      alert('Registrasi Gagal');
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
  <title>Register</title>
  <link rel="stylesheet" href="register-style.css?v=<?= time(); ?>">
</head>

<body>
  <div class="container">
    <form action="" method="post" class="box">
      <h1>Register</h1>
      <div class="item">
        <div class="user-box">
          <input type="text" name="user" id="user" required autocomplete="off"><br>
          <label for="user">Username</label>
        </div>

        <div class="user-box">
          <input type="password" name="pass" id="pass" required autocomplete="off">
          <label for="pass">Password</label>
        </div>

        <div class="user-box">
          <input type="password" name="pass2" id="pass2" required autocomplete="off">
          <label for="pass2">Confim Password</label>
        </div>
      </div>
      <button type="submit" name="register">Register</button>
    </form>
  </div>
</body>

</html>