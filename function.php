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

// hapus data 
function hapus($id_note)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM dataUser WHERE id_note = '$id_note'");

  return mysqli_affected_rows($conn);
}

// update data
function ubah($data)
{
  global $conn;

  // ambil data dari tiap elemen dalam form 
  $id_note = $data["id_note"];
  $topic = htmlspecialchars($data["topic"]);
  $description = htmlspecialchars($data["description"]);
  $dateTime = htmlspecialchars($data["dateTime"]);

  // query update data
  $query = "UPDATE dataUser SET
        topic = '$topic',
        description = '$description',
        dateTime = '$dateTime'
        WHERE id_note = $id_note";

  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}

// search data
function cari($keyword)
{
  $query = "SELECT * FROM dataUser WHERE
          topic LIKE '%$keyword%' OR
          description LIKE '%$keyword%' OR
          dateTime LIKE '%$keyword%'
 ";

  return query($query);
}
