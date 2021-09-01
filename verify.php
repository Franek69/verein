<?php
// prüft ob vorhandene Session läuft
session_start();
// wenn Session["email"] NICHT vorhanden und nicht belegt ist
// dann brich den Seitenaufbau ab (die)

if(!isset($_SESSION["email"])){
  die ("Sie müssen sich erst einloggen! <a href='login.php'>login</a>");
}
?>
s
