<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$kode = $_POST['kode'];
$teks = $_POST['teks'];

$sql = "UPDATE artikel SET kode_artikel='$kode', teks='$teks' where kode_artikel='$kode'";

if (mysqli_query($conn, $sql)) {
  header('Location: '. "viewArtikel.php?kode_artikel=$kode");
} else {
  echo "Error updating record: " . mysqli_error($conn);?>
  <a href="viewArtikel.php">kembali</a>
  <?php
}

mysqli_close($conn);
?>