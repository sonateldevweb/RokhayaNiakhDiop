<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>modifier Apprenants </title>
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
      <h3>Modifier un Apprenant</h3>
      <form action="" method="post">
        <div class="form-group">
          <label for="">Code</label>
          <input type="number" class="form-control" required name="code" placeholder="Code">
          <label for="">Nom</label>
          <input type="text" class="form-control" required name="nom" placeholder="Nom">
          <label for="">Prénom</label>
          <input type="text" class="form-control" required name="prenom" placeholder="Prénom">
          <label for="">Date</label>
          <input type="date" class="form-control" required name="date" placeholder="Date">
          <label for="">Tel</label>
          <input type="number" class="form-control" required name="tel" placeholder="Tel" />
          <label for="">Email</label>
          <input type="text" class="form-control" required name="email" placeholder="Email" />
          <label for="">Statut</label>
          <input type="text" class="form-control" required name="statut" placeholder="Statut" />
          <label for="">Code promo</label>
          <select name="codep" id="">
            <?php
            $listepromo = fopen('listepromo.txt', 'r');
            while (!feof($listepromo)) {
              $ligne = fgets($listepromo);
              $col = explode(';', $ligne);
              $code = $col[0];
              echo '<option value="' . $code . '">' . $col[1] . '</option>';
            }
            fclose($listepromo);
            ?>
          </select>
          <br>
          <button type="submit" name="modifier" class="btn btn-secondary">Modifier </button>
        </div>
      </form>
    </div>
    <div class="col-lg-4"></div>
  </div>
  <?php
  $listep = fopen('listeapprenant.txt', 'a+');
  echo '<table class="table">
     <tr>
     <th>Code</th>
     <th>Nom</th>
     <th>Prénom</th>
     <th>Date</th>
     <th>Tel</th>
     <th>Email</th>
     <th>Statut</th>
     <th>code promo</th>
    <tr>';
  if (isset($_POST['modifier'])) {
    while (!feof($listep)) {
      $ligne = trim(fgets($listep));
      $col = explode(';', $ligne);
      if ($col[0] == $_POST['code']) {
        $newligne = $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['prenom'] . ';' . $_POST['date'] . ';' . $_POST['tel'] . ';' . $_POST['email'] . ';' . $_POST['statut'] . ';' . $_POST['codep'];
      } else {
        $newligne = $ligne;
      }
      $modif = $modif . $newligne . "\n";
    }
    fclose($listep);
    $listep = fopen('listeapprenant.txt', 'w+');
    fwrite($listep, trim($modif));
    fclose($listep);
  }
  $listep = fopen('listeapprenant.txt', 'a+');
  while (!feof($listep)) {
    $ligne = trim(fgets($listep));
    $col = explode(';', $ligne);
    echo "<tr>";
    for ($i = 0; $i < count($col); $i++) {
      echo "<td>" . $col[$i] . "</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
  fclose($listep);
  ?>
</body>

</html>