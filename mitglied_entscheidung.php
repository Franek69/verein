<<?php
$id= $_GET["id"];
echo $id;

 ?>
<!DOCTYPE html>
<html lang=de dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<h1>Wollen Sie wirklich löschen?</h1>
<p><a href="index.php">Nein</a></p>
<p><a href="<?php echo "mitglied_loeschen.php?id=". $id ?>">Ja</a></p>

  </body>
</html>
