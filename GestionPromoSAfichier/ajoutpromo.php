<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ajouterpromo</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <style>
    body {
      background: lightcoral;
      color: white;
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
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <h4>Ajouter une promo</h4>
      <form action="" method="post">
        <div class="form-group">
          <label for="">Code</label>
          <input type="text" class="form-control" required name="code" placeholder="Code">
          <label for="">Nom</label>
          <input type="text" class="form-control" required name="nom" placeholder="Nom">
          <label for="">Mois</label>
          <input type="month" class="form-control" required name="mois" placeholder="Mois">
          <label for="">Année</label>
          <input type="number" class="form-control" required name="annee" placeholder="Année" min="2010">
          <br>
          <button type="submit" name="ok" class="btn btn-secondary">Ajouter </button>
        </div>
      </form>
    </div>
    <?php
    if (isset($_POST['ok'])) {
      $code = $_POST['code'];
      $nom = $_POST['nom'];
      $mois = $_POST['mois'];
      $annee = $_POST['annee'];
      $verf = false;
      $monfichier = fopen('listepromo.txt', 'a+');
      while ($ligne = fgets($monfichier)) {
        $col = explode(";", $ligne);
        if ($code == $col[0] || $nom == $col[1]) {
          $verf = true;
          echo "cette promo existe déja!!!";
        }
      }
      if ($verf == false) {
        fwrite($monfichier, "\n" . $code . ";" . $nom . ";" . $mois . ";" . $annee . ";");
      }
      fclose($monfichier);
    }
    echo '<table class="table">
    <tr>
    <th>Code</th>
    <th>Nom</th>
    <th>Mois</th>
    <th>Année</th>
    <th>Nombre apprenants</th>
   <tr>';
  $monfichier = fopen('listepromo.txt', 'r');
  while (!feof($monfichier)) {
    $ligne = fgets($monfichier);
    $col = explode(";", $ligne);
    $fichier = fopen('listeapprenant.txt', 'r');
    $effectif = 0;
    while (!feof($fichier)) {
      $ligne = fgets($fichier);
      $tab = explode(";", $ligne);
      if ($col[0] == $tab[7]) {
        $effectif++;
      }
    }
    fclose($fichier);
    echo "<tr>";
    echo "<td>" . $col[0] . "</td>";
    echo "<td>" . $col[1] . "</td>";
    echo "<td>" . $col[2] . "</td>";
    echo "<td>" . $col[3] . "</td>";
    echo "<td>" . $effectif . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  fclose($monfichier);
    ?>
</body>

</html>