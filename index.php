<?php
// memanggil file function
require 'function.php';

$datas = query("SELECT * FROM datauser");

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

    <a href="page-input/input.php" class="tombol-tambah">Tambah +</a>
    <table cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <th>No.</th>
          <!-- <th>No.id</th> -->
          <th>Topic</th>
          <th>Description</th>
          <th>Date & Time</th>
        </tr>
      </thead>
      <?php $i = 1; ?>
      <?php foreach ($datas as $data) : ?>
        <tbody>
          <tr>
            <td><?= $i; ?></td>
            <!-- <td><?= $data["id_note"]; ?></td> -->
            <td><?= $data["topic"]; ?></td>
            <td><?= $data["description"]; ?></td>
            <td><?= $data["dateTime"]; ?></td>
          </tr>
        </tbody>
        <?php $i++; ?>
      <?php endforeach; ?>
    </table>
  </div>
</body>

</html>