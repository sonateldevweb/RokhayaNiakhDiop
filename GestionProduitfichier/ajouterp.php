<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter Produit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<form action="" method="POST"  class="form-group">
     <label>produits: </label>
            <input name="produits" type="text" placeholder="produits" required /> 
     <label>prix : </label>
            <input name="p" type="number" placeholder="prix" required /> 
     <label>quantité:  </label>
             <input name="n" type="number" placeholder="quantite" required />
             <button type="submit"  name="ok" >ajouter</button>
</form> <br> 
<?php
if(isset($_POST['ok'])){
$nom=$_POST['produits'];
$prix=$_POST['p'];
$quantite=$_POST['n'];
$ajouter=fopen( 'listeproduits.txt' ,'a+');
// if($nom!=$col[0]){
 fwrite($ajouter,"\n" .$nom.";".$prix.";".$quantite);
// }else{
//     echo"ça existe déja!!!!!";
// }
fclose($ajouter);
}
?>
<?php
$monfichier=fopen('listeproduits.txt','a+');
echo' <table border=1 width=100% height=100% class="t">
<tr>
<th>Nom</th>
<th>Prix</th>
<th>Quantité</th>
<th>Montant</th>
</tr>';
while(!feof($monfichier)){
  $ligne=fgets($monfichier);    
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
fclose( $monfichier);
?>
</body>
</html>