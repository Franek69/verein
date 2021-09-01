<?php
$id= $_GET["id"];
// echo $id;

include "verify.php";

include "db_connect.php";
# Vereine aus DB holen
$statement = $pdo->prepare("
SELECT vereinmitglied.verein_id, vereinmitglied.mitglied_id, vereinmitglied.bezahlt, mitglied.vorname, mitglied.name, verein.name as v_name
FROM vereinmitglied
INNER JOIN mitglied
ON vereinmitglied.mitglied_id = mitglied.mitglied_id
INNER Join verein
ON vereinmitglied.verein_id = verein.verein_id
WHERE vereinmitglied.verein_id = ?
");
$statement->execute(array($id));  # erstelle leeres Array
$verein_mitglieder = $statement->fetchAll(PDO::FETCH_ASSOC);

# für Testzwecke
// echo "<pre>"; # für die Formatierung der Testausgabe
// print_r($verein_mitglieder);
// echo "</pre>";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Mitglieder Übersicht nach Verein</title>
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
            <li class="list-group-item "><?php echo $verein_mitglieder[0]["v_name"]?></li>

        </ul>
    </div>
      <!-- 2. Spalte vom GRID -->
    <div class="col-sm-12 col-md-6">
      <!-- Mitgliederliste des ausgewählten Vereins-->
          <ul class="list-group">
            <!-- Scheife über verein_mitglieder Array -->
            <?php
              for ($i=0; $i <count($verein_mitglieder) ; $i++) {
                if($verein_mitglieder[$i]["bezahlt"] == "n"){
                echo "<li class='list-group-item'>" .
                "<i class=\"fas fa-euro-sign red\"></i>". " ".
                 $verein_mitglieder[$i]["vorname"] .
                " " . $verein_mitglieder[$i]["name"] .
                "<form class='float-right' action='bezahlt.php' method='post'>".
                "<input type='radio' name='bezahlt' value='j'>".
                " bezahlt " .
                "<input type='radio' name='bezahlt' value='n' checked>".
                " nicht bezahlt " .
                "<input type='hidden' name='verein_id' value='$id'>" .
                "<input type='hidden' name='mitglied_id' value='" .
                $verein_mitglieder[$i]['mitglied_id'] . "'>" .
                "<input type='submit' value='ok'>" .
                "</form>" .
                "</li>";
              }
                else{
                   echo "<li class='list-group-item'>" .
                   "<i  class=\"fas fa-euro-sign green\"></i>".
                   " " . $verein_mitglieder[$i]["vorname"] .
                   " " . $verein_mitglieder[$i]["name"] .
                   "<form class='float-right' action='bezahlt.php' method='post'>".
                   "<input type='radio' name='bezahlt' value='j'checked>".
                   " bezahlt " .
                   "<input type='radio' name='bezahlt' value='n' >".
                   " nicht bezahlt " .
                   "<input type='hidden' name='verein_id' value='$id'>" .
                   "<input type='hidden' name='mitglied_id' value='" .
                   $verein_mitglieder[$i]['mitglied_id'] . "'>" .
                   "<input type='submit' value='ok'>" .
                   "</form>" .
                   "</li>";
                 }

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
