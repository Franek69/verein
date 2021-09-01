<?php

 print_r($_POST);

$email = $_POST["email"];
$pw = $_POST["pw"];
$pw_wh = $_POST["pw_wh"];

if ($pw == $pw_wh){
  include "db_connect.php";
  // hashen
  $pw_hash = password_hash($pw, PASSWORD_DEFAULT);
  // echo "$pw_hash";
  $statement = $pdo->prepare("INSERT INTO login (email, passwort)
  VALUES (?, ?)");
  $statement->execute(array($email, $pw_hash,));

  $wahr = password_verify("test", $pw_hash);


}
else {
  echo "PW sind nicht gleich";
  header ("Location: form_login.php");
}
// Weiterleitung auf index.php
// header('Location: index.php');


 ?>
