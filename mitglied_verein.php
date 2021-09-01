<?php
include "verify.php";

include "db_connect.php";
# Vereine aus DB holen
$statement = $pdo->prepare("SELECT verein_id, name  FROM verein");
$statement->execute(array());
$vereine = $statement->fetchAll(PDO::FETCH_ASSOC);

# Mitglieder aus DB holen
$statement = $pdo->prepare("SELECT mitglied_id, name, vorname FROM mitglied");
$statement->execute(array());
$mitglieder = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($mitglieder);
// echo "</pre>";
// echo "<pre>";
// print_r($vereine);
// echo "</pre>";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vereinsverwaltung</title>
    <!-- Bootstrap-CSS einbinden-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <?php include "menu.php";?>
    <div class="container">
      <!-- neue Zeile vom GRID -->
      <div class="row">
        <!-- 1. Spalte vom GRID -->
        <div class="col-sm-12 col-md-6">
      <!-- Formular-->
          <form class="" action="mv_anlegen.php" method="post">
            Verein auswählen <br>
            <select  name="verein">
              <option value="-1" selected disabled>Verein auswählen</option>
              <?php
              for($i=0; $i<count($vereine); $i++){
                echo "<option value=\"" . $vereine[$i]["verein_id"] . " \">" .
                $vereine[$i]["name"] . "</option>";
              }
              ?>
            </select><br><br>

            Mitglied auswählen <br>
            <select  name="mitglied">
              <option value="-1" selected disabled>Mitglied auswählen</option>
            <?php
            for($i=0; $i<count($mitglieder); $i++){
              echo "<option value=\"" . $mitglieder[$i]["mitglied_id"] . " \">" .
              $mitglieder[$i]["vorname"] . " " . $mitglieder[$i]["name"] .
              "</option>";
            }
            ?>
          </select><br><br>
          Mitglied hat bezahlt <br>
            <input type="radio" name="bezahlt" value="n" checked>
            <label>nein</label><br>
            <input type="radio" name="bezahlt" value="j">
            <label>ja</label><br><br>
            <p><input type="submit" name="" value="eintragen"></p>
          </form>
    </div>
      <!-- 2. Spalte vom GRID -->
    <div class="col-sm-12 col-md-6">
      <!-- Mitgliederliste-->
          <ul class="list-group">
            <?php
            for($i=0; $i<count($mitglieder); $i++){
              ?>
            <li class="list-group-item ">
              <?php echo $mitglieder[$i]["vorname"] . " " . $mitglieder[$i]["name"] ?></li>
          <?php } ?>
        </ul>
    </div>

    </div>
    </div>
    <!-- JS einbinden-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
