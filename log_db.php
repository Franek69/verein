<?php

 print_r($_POST);

$email = $_POST["email"];
$pw = $_POST["pw"];

// Verbindung zur Datenbank
include "db_connect.php";

// Prüfung ob email vorhanden ist und holt den entsprechenden Datensatz ab (als Array mit einem Array in der 0-ten Tasche)
// Array ( [email] => frank@web.com [pw] => test ) Array ( [0] => Array ( [email] => frank@web.com [passwort] =>
// $2y$10$KvSjPKBAFAVbLWuS5Hr.9eZCy4NohC4/pVpf35YfVwwp92MqYiPnW ) ) Login ok

  $statement = $pdo->prepare("SELECT *FrOM login WHERE email = ? ");

  $statement->execute(array($email));
  $datensatz = $statement->fetchAll(PDO::FETCH_ASSOC);
  print_r($datensatz);

  if (password_verify ($pw, $datensatz[0]["passwort"])){

  // Start einer Session
  session_start();
  // email (eindeutig weil einmalig) wird im Session_Array gespeichert
  $_SESSION["email"]= $email;
  // Weiterleitung auf index.php
  header("Location: index.php");
  }
  else{
    echo "Falsch";
  }

// Weiterleitung auf index.php
// header('Location: index.php');

 ?>
