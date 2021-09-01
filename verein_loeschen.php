<?php
include "verify.php";
include "db_connect.php";
# print_r($_POST);
$id= $_GET["id"];

$vereinsname = $_POST["vereinsname"];
$stadt = $_POST["stadt"];
$vorstand = $_POST["vorstand"];
$gruendung = $_POST["gruendung"];


// Insert Into mit Prepared Statements
$statement = $pdo->prepare("DELETE FROM verein WHERE verein_id=?");
$statement->execute(array($id));


// Insert Into mit Prepared Statements
$statement = $pdo->prepare("DELETE FROM vereinmitglied WHERE verein_id=?");
$statement->execute(array($id));


// Weiterleitung auf index.php
header('Location: index.php');
?>
