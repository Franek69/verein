<?php
$pdo = new PDO('mysql:host=localhost;dbname=verein', 'root', '',array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  )
  );
?>
