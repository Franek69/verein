<?php

include "verify.php";

include "db_connect.php";
# print_r($_POST);
$vereinsid = $_POST["verein"];
$mitgliedid = $_POST["mitglied"];
$bezahlt = $_POST["bezahlt"];
// Insert Into mit Prepared Statements
$statement = $pdo->prepare("INSERT INTO vereinmitglied (verein_id,
  mitglied_id, bezahlt)
VALUES (?, ?, ?)");
$statement->execute(array($vereinsid, $mitgliedid, $bezahlt));

// Weiterleitung auf index.php
header('Location: index.php');
