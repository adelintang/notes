<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: page-login/login.php");
  exit;
}

// memanggil file function
require 'function.php';

$datas = query("SELECT * FROM datauser ORDER BY dateTime DESC");

// ketika tombol search di tekan
if (isset($_POST["keyword"])) {
  $datas = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Page</title>
  <link rel="stylesheet" href="main-style.css?v=<?= time(); ?>">
</head>

<body>
  <div class="container">
    <h1>Data Notes</h1>

    <div class="tombol">
      <a href="page-input/input.php" class="tombol-tambah">Tambah +</a>
      <a href="logout.php" class="logout">Logout</a>
    </div>

    <form action="" method="post" class="search">
      <input type="text" name="keyword" placeholder="Masukkan Keyword..." autofocus autocomplete="off">
      <button type="submit" name="cari">Cari</button>
    </form>

    <table cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <th>No.</th>
          <th>Topic</th>
          <th>Description</th>
          <th>Date & Time</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      <?php foreach ($datas as $data) : ?>
        <tbody>
          <tr>
            <td><?= $i; ?></td>
            <td><?= $data["topic"]; ?></td>
            <td><?= $data["description"]; ?></td>
            <td><?= $data["dateTime"]; ?></td>
            <td>
              <a class="tombol-update" href="page-update/update.php?id_note=<?= $data["id_note"]; ?>">Update</a> |
              <a class="tombol-delete" href="hapus.php?id_note=<?= $data["id_note"]; ?>" onclick="return confirm('apakah yakin')" ;>Delete</a>
            </td>
          </tr>
        </tbody>
        <?php $i++; ?>
      <?php endforeach; ?>
    </table>
  </div>
</body>

</html>