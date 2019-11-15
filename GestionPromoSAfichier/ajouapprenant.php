<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>inscription</title>
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
      <h4>Inscription</h4>
      <form action="" method="post">
        <div class="form-group">
          <label for="">Code</label>
          <input type="text" class="form-control" required name="code" placeholder="Code apprenant">
          <label for="">Nom</label>
          <input type="text" class="form-control" required name="nom" placeholder="Nom">
          <label for="">Prénom</label>
          <input type="text" class="form-control" required name="prenom" placeholder="Prénom">
          <label for="">Date de naissance</label>
          <input type="date" class="form-control" required name="date" placeholder="Date de naissance">
          <label for="">Téléphone</label>
          <input type="number" class="form-control" required name="tel" placeholder="Téléphone" />
          <label for="">Email</label>
          <input type="text" class="form-control" required name="mail" placeholder="nom@gmail.com" />
          <label for="">statut</label>
          <input type="text" class="form-control" required name="statut" placeholder="Statut" />
          <label for="">Promo</label>
          <select name="promo" id="">
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
          <button type="submit" name="ok" class="btn btn-secondary">inscrire </button>
        </div>
      </form>
    </div>
</body>
<?php
if (isset($_POST['ok'])) {
  $code = $_POST['code'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $date = $_POST['date'];
  $tel = $_POST['tel'];
  $mail = $_POST['mail'];
  $statut = $_POST['statut'];
  $promo = $_POST['promo'];
  $verif = false;
  $monfichier = fopen('listeapprenant.txt', 'a+');
  while ($ligne = trim(fgets($monfichier))) {
    $col = explode(";", $ligne);
    if ($code == $col[0] || $tel == $col[4] || $mail == $col[5]) {
      $verif = true;
      echo "existe déja";
    }
  }
  if ($verif == false) {
    fwrite($monfichier, "\n" . $code . ";" . $nom . ";" . $prenom . ";" . $date . ";" . $tel . ";" . $mail . ";" . $statut . ";" . $promo . ";");
  }
  fclose($monfichier);
}
?>
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
  <th> promo</th>
 <tr>';
while (!feof($listeapprenant)) {
  $ligne = fgets($listeapprenant);
  $col = explode(";", $ligne);
  if ($col[6] == "exclure") {
    echo "";
  } else {
    echo "<tr>";
    for ($i = 0; $i < count($col); $i++) {
      echo "<td>" . $col[$i] . "</td>";
    }
    echo "</tr>";
  }
}
echo "</table>";
fclose($listeapprenant);
?>

</html>