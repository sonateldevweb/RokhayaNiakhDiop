<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> supprimer produits</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<form action="" method="post">
     <label>produits</label>
            <input name="produits" type="text" placeholder="produits" />
    <button name="supp" type="submit"> Supprimer</button>
</form> <br>
    <?php
    if(isset($_POST['supp'])) {
    $newligne="";
    $monfichier=fopen('listeproduits.txt','r');
    $nom=$_POST['produits'];
        while(!feof($monfichier)){
        $ligne=fgets($monfichier);
        $col=explode(";", $ligne);
        if($nom==$col[0]){
           $l="";
        }else{
            $l=$ligne;
        }
        $newligne=$newligne.$l;
    }
    fclose($monfichier);
    $mon=fopen('listeproduits.txt','w+');
    fwrite($mon,$newligne."\n");
    fclose($mon);
}
?>
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
</body>
</html>