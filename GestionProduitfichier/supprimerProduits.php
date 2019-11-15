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
     .t tr:nth-child(even){
      background-color:pink;
     }
  </style>
</head>
<body> <br>
<form action="" method="post">
     <label>produits</label>
            <input name="produits" type="text" placeholder="produits"/>
    <button name="supp" type="submit"> Supprimer</button>
</form> <br>

<div class="container-fluid">
        <div class="jumbotron">
   <center><h1> Listes des produits</h1></center>
        </div>
    </div>
    <?php
   $produits = array(
    array("costume", 50000,20,50000*20), 
    array("chemise", 6000,40,6000*40),
    array("pantalon", 6000,50,6000*50), 
    array("cravate", 2000,60,2000*60),
    array("robe", 30000,35,30000*35),
    array("jupe", 15000,25,15000*25),
    array("chaussure", 10000,80,10000*80), 
    array("sac",25000,15,25000*15),
);
     echo ' <table border=1 width=100% height=100% class="t">';
     echo'<tr style="background-color:#E5E5E5;"> <th> Nom </th>';
     echo'<th> prix </th>';
     echo '<th> Quantité </th>';
     echo '<th> montants </th>';
     echo '</tr>';
 if(isset($_POST['produits'])){
     $supprimer=$_POST['produits'];
     echo "<tr>";
     for( $ligne=0; $ligne<=count($produits); $ligne++){
        for($col=0;$col<4;$col++){
            if($supprimer==$produits[$ligne][0]){
                unset($produits[$ligne]);
            }
        }
     }
     echo "</tr>";
 }
for( $ligne=0; $ligne<=count($produits); $ligne++){
    echo '<tr>';
    for($col=0;$col<4;$col++){
        echo "<td>" .$produits[$ligne][$col]."</td>";
  }
  echo"</tr>" ;
}
  echo" </table>";   
    ?>
</body>
</html>