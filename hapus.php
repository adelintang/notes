<?php
// memanggil file function
require 'function.php';

$id_note = $_GET["id_note"];
// cek apakah data terhapus atau tidak
if (hapus($id_note) > 0) {
  echo "
    <script>
      alert('data berhasil dihapus');
      document.location.href='index.php';
    </script>
  ";
} else {
  echo "
  <script>
    alert('data berhasil dihapus');
    document.location.href='index.php';
  </script>
";
}
