<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Exclure apprenant</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <style>
    body {
      background: lightcoral;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a class="navbar-brand" href="accueil.html">SONATEL ACADEMY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="ajouapprenant.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="exclure.php">Exclure</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="modifierappr.php">Modifier un apprenant</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aff.php">Lister une promo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ajoutpromo.php">Ajouter une promo </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="modpromo.php">Modifier une promo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listepromo.php">Afficher les promos</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="jumbotron">
    <center>
      <h1>Gestion des Apprenants</h1>
    </center>
  </div>
  <?php
  $listeapprenant = fopen('listeapprenant.txt', 'r');
  echo '<table class="table">
  <tr>
  <th>Code</th>
  <th>Nom</th>
  <th>Prénom</th>
  <th>Date</th>
  <th>Tel</th>
  <th>Email</th>
  <th>Statut</th>
  <th> code promo</th>
 <tr>';
  while (!feof($listeapprenant)) {
    $ligne = fgets($listeapprenant);
    $col = explode(";", $ligne);
    echo "<tr>";
    echo "<td>" . $col[0] . "</td>";
    echo "<td>" . $col[1] . "</td>";
    echo "<td>" . $col[2] . "</td>";
    echo "<td>" . $col[3] . "</td>";
    echo "<td>" . $col[4] . "</td>";
    echo "<td>" . $col[5] . "</td>";
    echo "<td> <a href='traitstatut.php?code=$col[0]'>$col[6]</a></td>";
    echo "<td>" . $col[7] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  fclose($listeapprenant);
  ?>
</body>
</html>