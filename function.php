<?php
// koneksi database
$conn = mysqli_connect("localhost", "root", "", "data_notes");

// ambil data dari table / query table
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

// penambahan data
function tambah($data)
{
  global $conn;

  // ambil data dari tiap elemen dalam form 
  $topic = htmlspecialchars($data["topic"]);
  $description = htmlspecialchars($data["description"]);
  $dateTime = htmlspecialchars($data["dateTime"]);

  // query insert data
  $query = "INSERT INTO dataUser VALUES (
        '', '$topic', '$description', '$dateTime'
  )";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
