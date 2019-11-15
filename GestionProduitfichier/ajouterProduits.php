<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <style>
    .t tr:nth-child(even) {
      background-color: pink;
    }
  </style>
</head>
<body> <br>
  <form action="" method="POST" class="form-group">

    <label>produits: </label>
    <input name="produits" type="text" placeholder="produits" />
    <label>prix : </label>
    <input name="p" type="number" placeholder="prix" />
    <label>quantité: </label>
    <input name="n" type="number" placeholder="quantite" />
    <button type="submit" name="ok">ajouter</button>
  </form> <br>
  <div class="container-fluid">
    <div class="jumbotron">
      <center>
        <h1> Listes des produits</h1>
      </center>
    </div>
  </div>
  <?php
  $produits = array(
    array("costume", 50000, 20, 50000 * 20),
    array("chemise", 6000, 40, 6000 * 40),
    array("pantalon", 6000, 50, 6000 * 50),
    array("cravate", 2000, 60, 2000 * 60),
    array("robe", 30000, 35, 30000 * 35),
    array("jupe", 15000, 25, 15000 * 25),
    array("chaussure", 10000, 80, 10000 * 80),
    array("sac", 25000, 15, 25000 * 15),
  );

  echo ' <table border=1 width=100% height=100% class="t">';
  echo '<tr style="background-color:#E5E5E5;"> <th> Nom </th>';
  echo '<th> prix </th>';
  echo '<th> Quantité </th>';
  echo '<th> montants </th>';
  echo '</tr>';
  if (isset($_POST['ok'])) {
    $nom = $_POST['produits'];
    $prix = $_POST['p'];
    $quantite = $_POST['n'];
  }
  $mnt = $prix * $quantite;
  if ($prix > 100 &&  $quantite > 10) {
    array_push($produits, array("$nom", "$prix", "$quantite", "$mnt"));
  }
  for ($i = 0; $i < count($produits); $i++) {
    if ($produits[$i][0] != "") {
      echo '<tr style=""> <th>' . $produits[$i][0] . '</th>';
      echo '<th>' . $produits[$i][1] . '  </th>';
      echo '<th> ' . $produits[$i][2] . ' </th>';
      echo '<th>' . $produits[$i][3] . '  </th>';
      echo '</tr>';
    }
  }
  echo " </table>";

  ?>
</body>

</html>