<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>searchproduits</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body> <br> 
<form  method="POST" action="">
        <p>
            <input type="text" name="quantite" placeholder="par quantite" />
            <input type="number" min=1000 name="prix_min" placeholder="par prix_min" />
            <input type="number" min=1 name="prix_max" placeholder="par prix_max" />
            <button type="submit"  name="ok" >Rechercher</button>
        </p>
    </form>
    <?php
if(isset($_POST['ok'])){
    $r=$_POST['quantite'];
    $prixmin=$_POST['prix_min'];
    $prixmax=$_POST['prix_max'];
    if(empty($_POST['quantite'])&& empty($_POST['prix_min'])&& empty($_POST['prix_max'])) {
        header('location:search.php'); 
    }else{
    echo' <table border=1 width=100% height=100% class="t">
    <tr>
<th>Nom</th>
<th>Prix</th>
<th>Quantité</th>
<th>Montant</th>
</tr>';
$monfichier=fopen('listeproduits.txt','r+');
while(!feof($monfichier)){
    $ligne=fgets($monfichier);    
    $col=explode(";",$ligne);
    if($r<=$col[2] && $r!="" && $prixmax=="" && $prixmin==""){
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
    elseif($prixmin<=$col[1] && $prixmax=="" && $r==""){
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
         elseif($prixmax>=$col[1] && $prixmin=="" && $r==""){
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
                elseif($r=="" && $col[1]>=$prixmin && $col[1]<=$prixmax && $prixmin!="" && $prixmax!=""){
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
                        elseif($r<=$col[2] && $prixmin<=$col[1] && $prixmax >= $col[1] && $prixmax>$prixmin && $prixmax!="" && $prixmin!="" && $r!=""){
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
}
echo "</table>";
fclose($monfichier);
}
}
    ?>

    
</body>
</html>