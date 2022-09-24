<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: ../page-login/login.php");
  exit;
}

// memanggil file function
require '../function.php';

// ambil data dari url dengan method get
$id_note = $_GET["id_note"];

// lakukan query untuk mengambil data di tabel
$data = query("SELECT * FROM dataUser WHERE id_note = '$id_note'")[0];

// cek apakah tombol sumbit sudah dipencet atau belum
if (isset($_POST["submit"])) {
  if (ubah($_POST) > 0) {
    echo "
        <script>
          alert('note berhasil di update');
          document.location.href='../index.php';
        </script>
    ";
  } else {
    echo "
      <script>
        alert('note gagal di update');
        document.location.href='../index.php';
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
  <title>Update Page</title>
  <link rel="stylesheet" href="update-style.css?v=<?= time(); ?>">
</head>

<body>
  <div class="container">
    <h1 class="judul">Notes</h1>

    <!-- section todo -->
    <form action="" method="post" class="todo">
      <h2 class="judul-todo">What your focus today ?</h2>

      <input type="hidden" name="id_note" value="<?= $data["id_note"]; ?>">
      <div class="list">
        <label for="topic">Topic</label>
        <input type="text" id="topic" name="topic" placeholder="write your topic..." autocomplete="off" required value="<?= $data["topic"]; ?>">
      </div>
      <div class="list">
        <label for="description">Description</label>
        <input type="text" id="desciption" name="description" placeholder="write your description..." autocomplete="off" required value="<?= $data["description"]; ?>">
      </div>
      <div class="list">
        <label for="dateTime">Date</label>
        <input type="datetime-local" id="dateTime" name="dateTime" placeholder="write your date..." required value="<?= $data["dateTime"]; ?>">
      </div>

      <button type="submit" name="submit" class="btn">Update</button>
      <a href="../index.php">Lihat Data</a>
    </form>

  </div>
</body>

</html>