<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>searchproduits</title>
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

    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <h3 style="color:white">Rechercher une promo</h3>
            <form action="" method="post" style="color:white">
                <div class="form-group">
                    <label for="">Code Promo</label>
                    <input type="number" class="form-control" name="code" placeholder="par code promo">
                    <br>
                    <button type="submit" name="ok" class="btn btn-secondary">Rechercher </button>
                </div>
            </form>
        </div>
        <div class="col-lg-4"></div>
    </div>
    <?php
    if (isset($_POST['ok'])) {
        $r = $_POST['code'];
        if (empty($_POST['code'])) {
            header('location:aff.php');
        } else {
            echo ' <table border=1 class="table">
    <tr>
    <th>Code</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date</th>
    <th>Tel</th>
    <th>Email</th>
    <th>Statut</th>
    <th> promo</th>
</tr>';
            $monfichier = fopen('listeapprenant.txt', 'r+');
            while (!feof($monfichier)) {
                $ligne = fgets($monfichier);
                $col = explode(";", $ligne);
                if ($r == "000018" && $col[7] == "000018" && $r != "") {
                    if ($col[6] == "exclure") {
                        echo "";
                    } else {
                        echo "<h1 style='color:white'><center> Promotion Alioune Ndiaye</center></h1>";
                        echo "<tr>";
                        for ($i = 0; $i < count($col); $i++) {
                            echo  " <td>" . $col[$i] . "</td>";
                        }
                        echo "</tr>";
                    }
                } elseif ($r == "000019" && $col[7] == "000019" && $r != "") {
                    if ($col[6] == "exclure") {
                        echo "";
                    } else {
                        echo "<h1 style='color:white'><center> Promo2</center></h1>";
                        echo "<tr>";

                        for ($i = 0; $i < count($col); $i++) {
                            echo "<td>" . $col[$i] . "</td>";
                        }
                        echo "</tr>";
                    }
                } elseif ($r == "000020" && $col[7] == "000020" && $r != "") {
                    if ($col[6] == "exclure") {
                        echo "";
                    } else {
                        echo "<h1 style='color:white'><center> Promo3</center></h1>";
                        echo "<tr>";
                        for ($i = 0; $i < count($col); $i++) {
                            echo "<td>" . $col[$i] . "</td>";
                        }
                        echo "</tr>";
                    }
                } elseif ($r == "000021" && $col[7] == "000021" && $r != "") {
                    if ($col[6] == "exclure") {
                        echo "";
                    } else {
                        echo "<h1 style='color:white'><center> Promo4</center></h1>";
                        echo "<tr>";

                        for ($i = 0; $i < count($col); $i++) {
                            echo "<td>" . $col[$i] . "</td>";
                        }
                        echo "</tr>";
                    }
                } elseif ($r == "000022" && $col[7] == "000022" && $r != "") {
                    if ($col[6] == "exclure") {
                        echo "";
                    } else {
                        echo "<h1 style='color:white'><center> Promo5</center></h1>";
                        echo "<tr>";
                        for ($i = 0; $i < count($col); $i++) {
                            echo "<td>" . $col[$i] . "</td>";
                        }
                        echo "</tr>";
                    }
                }
            }
            echo "</table>";
            fclose($monfichier);
        }
    }
    ?>
</body>

</html>