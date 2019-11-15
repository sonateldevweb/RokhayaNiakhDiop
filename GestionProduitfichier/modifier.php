<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>modifier</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<form action="" method="post">
Nom produits: <input type="text" name="produits" placecholder="produits" required>
Prix: <input type="number" name="prix"  placecholder="prix">
Quantité: <input type="number" name="qtte"  placecholder="Quantité">
<button name="mod" type="submit"> Modifier</button>
    </form><br> 
    <?php
$fichier=fopen('listeproduits.txt','a+');
echo' <table border=1 width=100% height=100% class="t">
<tr>
<th>Nom</th>
<th>Prix</th>
<th>Quantité</th>
<th>Montant</th>
</tr>';
while(!feof($fichier)){
  $ligne=fgets($fichier);    
  $col=explode(";",$ligne);
 echo"<tr>";
  if($col[2]<10){
     echo "<tr style='background:red'>";
    }
    else{
        echo"<tr>";
        }
        for($i=0;$i<count($col);$i++ ){
            $col[3]=$col[1]*$col[2];
            echo "<td>".$col[$i]."</td>";
        }
     echo"</tr>";
    }
echo "</table>";
fclose($fichier);
    ?>
    <?php
    if(isset($_POST['mod'])) {
    $fichier=fopen('listeproduits.txt','a+');
    $nom=$_POST['produits'];
    $prix=$_POST['prix'];
    $qante=$_POST['qtte'];
    $col[3]=$col[1]*$col[2];
        while(!feof($fichier)){
        $ligne=fgets($fichier);
        $col=explode(";", $ligne);
        if($nom==$col[0]){
            $col[1]=$prix;
            $col[2]=$qante;
            $modifier=$col[0].";". $prix.";".$qante."\n";
        }
        else{
            $modifier=$ligne;
        }
        $recupe.=$modifier;
    }
    fclose($fichier);
    $update=fopen('listeproduits.txt','w+');
    fwrite($update,$recupe);
    fclose($update);
}
    ?>
 
</body>
</html>