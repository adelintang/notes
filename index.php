<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "data_notes");

// ambil data dari table / query table
$datas = query("SELECT * FROM datauser");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Page</title>
</head>

<body>
  <div class="container">
    <h1>Data Notes</h1>

    <table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <th>No.</th>
          <th>No.id</th>
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
            <td><?= $data["id_note"]; ?></td>
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