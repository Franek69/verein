<?php
include "verify.php";

include "db_connect.php";
# Vereine aus DB holen
$id = $_GET["id"];
$statement = $pdo->prepare("SELECT * FROM verein WHERE verein_id = ?");
$statement->execute(array($id));
$vereine = $statement->fetchAll(PDO::FETCH_ASSOC);
print_r($vereine);

 ?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Verein bearbeiten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <?php include "menu.php";?>
    <div class="container">
      <h1>Verein bearbeiten</h1>
      <form class="" action="verein_bearbeiten.php" method="post">

        <p>Vereinsname*<br>
          <input type="text" name="vereinsname" value="<?php echo $vereine[0]["name"] ?>"   required>
        </p>
        <p>Stadt*<br>
          <input type="text" name="stadt" value="<?php echo $vereine[0]["stadt"] ?>"  required>
        </p>
        <p>Vorstandsvorsitzender<br>
          <input type="number" name="vorstand" value="<?php echo $vereine[0]["vorstandsvors"] ?>" >
        </p>
        <p>Gründung*<br>
          <input type="date" name="gruendung" value="<?php echo $vereine[0]["gruendung"] ?>" required>
        </p>
        <!--verstecktes Formularfeld -->
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <p><input type="submit" name="" value="eintragen"></p>
      </form>
</div>
<!-- JS einbinden-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
