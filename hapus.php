<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: page-login/login.php");
  exit;
}

// memanggil file function
require 'function.php';

$id_note = $_GET["id_note"];
// cek apakah data terhapus atau tidak
if (hapus($id_note) > 0) {
  echo "
    <script>
      alert('note berhasil dihapus');
      document.location.href='index.php';
    </script>
  ";
} else {
  echo "
      <script>
        alert('note gagal dihapus');
        document.location.href='index.php';
      </script>
  ";
}
