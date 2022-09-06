<?php
// memanggil file function
require '../function.php';

// cek apakah tombol sumbit sudah dipencet atau belum
if (isset($_POST["submit"])) {
  // var_dump($_POST);
  if (tambah($_POST) > 0) {
    echo "
        <script>
          alert('note berhasil ditambahkan');
          document.location.href='../index.php';
        </script>
    ";
  } else {
    echo "
      <script>
        alert('note berhasil ditambahkan');
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
  <title>Input Page</title>
  <link rel="stylesheet" href="input-style.css?v=<?= time(); ?>">
</head>

<body>
  <div class="container">
    <h1 class="judul">Notes</h1>

    <!-- section todo -->
    <form action="" method="post" class="todo">
      <h2 class="judul-todo">What your focus today ?</h2>

      <div class="list">
        <label for="topic">Topic</label>
        <input type="text" id="topic" name="topic" placeholder="write your topic..." autocomplete="off">
      </div>
      <div class="list">
        <label for="description">Description</label>
        <input type="text" id="desciption" name="description" placeholder="write your description..." autocomplete="off">
      </div>
      <div class="list">
        <label for="dateTime">Date</label>
        <input type="datetime-local" id="dateTime" name="dateTime" placeholder="write your date...">
      </div>

      <button type="submit" name="submit" class="btn">Save</button>
      <a href="../index.php">Lihat Data</a>
    </form>

  </div>
</body>

</html>