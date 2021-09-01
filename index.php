<?php
 print_r($_POST);

include "verify.php";

include "db_connect.php";
# Vereine aus DB holen
$statement = $pdo->prepare("SELECT * FROM verein");
$statement->execute(array());
$vereine = $statement->fetchAll(PDO::FETCH_ASSOC);

# Mitglieder aus DB holen
$statement = $pdo->prepare("SELECT * FROM mitglied");
$statement->execute(array());
$mitglied = $statement->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($mitglieder);
// echo "</pre>";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vereinsverwaltung</title>
    <!-- Bootstrap-CSS einbinden-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- fontawesome-CSS einbinden-->
      <link  rel="stylesheet" href="fontawesome/css/all.css">
    <!-- eigene-CSS einbinden, immer zuletzt-->
      <link  rel="stylesheet" href="css/custom.css">
  </head>
  <body>
    <?php include "menu.php";?>
    <div class="container">
      <!-- neue Zeile vom GRID -->
      <div class="row">
        <!-- 1. Spalte vom GRID -->
        <div class="col-sm-12 col-md-6">
      <!-- Vereinsliste-->
          <ul class="list-group">
          <?php
          for($i=0; $i<count($vereine); $i++){
            echo "<li class=\"list-group-item \">" . $vereine[$i]["name"].
            "<a class=\" float-right\" href=\"verein_entscheidung.php?id=" . $vereine[$i]["verein_id"] . " \">  <i class=\"fas fa-trash-alt abstand_icon\"></i></a>" .
            "<a class=\" float-right\" href=\"form_verein_bearbeiten.php?id=" . $vereine[$i]["verein_id"] . " \">  <i class=\"fas fa-pencil-alt abstand_icon\"></i></a>" .
            "<a class=\" float-right\" href=\"verein_uebersicht.php?id=" . $vereine[$i]["verein_id"] . " \">  <i class=\"fas fa-info-circle\"></i></a>" .
             "</li>";
          }
            ?>
        </ul>
    </div>
      <!-- 2. Spalte vom GRID -->
    <div class="col-sm-12 col-md-6">
      <!-- Mitgliederliste-->
          <ul class="list-group">
            <?php
            for($i=0; $i<count($mitglied); $i++){
              ?>
              <li class="list-group-item ">
              <!-- 2. Spalte vom GRID -->
              <?php echo $mitglied[$i]["vorname"]. " " .$mitglied[$i]["name"]. " " .$mitglied[$i]["plz"]. " " .$mitglied[$i]["ort"]. " " .$mitglied[$i]["strasse"]. " " .$mitglied[$i]["nr"].
               "<a class=\"float-right\" href=\"mitglied_entscheidung.php?id=" . $mitglied[$i]["mitglied_id"] . "\"> <i class=\"fas fa-trash-alt abstand_icon\"></i></a>" .
               "<a class=\"float-right\" href=\"form_mitglied_bearbeiten.php?id=" . $mitglied[$i]["mitglied_id"] . "\"> <i class=\"fas fa-pencil-alt\"></i> </a>" .

               "</li>" ?>
               <?php
             }
           ?>
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
