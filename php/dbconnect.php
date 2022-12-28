<?php
$servername = "localhost";
$username = "moneymon_audiobook_user";
$password = "V-uWX%rR8Ljg";
$dbname = "moneymon_audiobook_db";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>