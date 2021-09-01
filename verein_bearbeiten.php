<?php
 
include "verify.php";

include "db_connect.php";
print_r($_POST);
$vereinsname = $_POST["vereinsname"];
$stadt = $_POST["stadt"];
$vorstand = $_POST["vorstand"];
$gruendung = $_POST["gruendung"];
$id = $_POST["id"];


// Update mit Prepared Statements
$statement = $pdo->prepare("UPDATE verein SET name = ?, stadt = ?, vorstandsvors = ?, gruendung = ?  WHERE verein_id = ? ");
$statement->execute(array($vereinsname, $stadt, $vorstand, $gruendung, $id));

// Weiterleitung auf index.php
header('Location: index.php');
?>
