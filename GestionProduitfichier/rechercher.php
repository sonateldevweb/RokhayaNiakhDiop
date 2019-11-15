<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <style>
     .t tr:nth-child(even){
      background-color:pink;
     }
  </style>
    </head>
    <body>
        <?php   $produit=array(
                       array("costume", 50000,20,50000*20), 
                       array("chemise", 6000,40,6000*40),
                       array("pantalon", 6000,50,6000*50), 
                       array("cravate", 2000,60,2000*60),
                       array("robe", 30000,35,30000*35),
                       array("jupe", 15000,25,15000*25),
                       array("chaussure", 10000,80,10000*80), 
                       array("sac",25000,9,25000*15),
                   );
         ?>
               <form  method="post" action=""> 
                     <label  class="sr-only">Rechercher</label>
                     <input type="number" name="recherche" placeholder="taper un seuil">
                     <input type="number" name="pumin" placeholder="Prix minimum">
                    <input type="number" name="pumax"  placeholder="Prix Maximum">
                    <button type="submit" name="valider" >Rechercher</button>
                </form> <br> <br>
                <?php 
                      $ligne=8;
                      $colonne=4;
                    if (isset($_POST ['valider'])){
                        $r=$_POST['recherche'];
                        $prixmin=$_POST['pumin'];
                        $prixmax=$_POST['pumax'];
                      
                            echo '<table  border=1 width=100% height=100% class="t">
                                <thead class="thead-dark">
                                    <tr style="background-color:#E5E5E5;"> 
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Quantité</th>
                                    <th>Montant</th>
                                    </tr>
                                    ';                              
          for($i=0;$i<$ligne;$i++){
          echo '<tr>';
          if($r<=$produit[$i][1] && $r!=""){
         if($produit[$i][2] < 10){                             
         for($j=0;$j<$colonne;$j++){
        echo '<td  class="bg-danger">'.$produit[$i][$j].'</td>';       
      }
     }
     else {
     for($j=0;$j<$colonne;$j++){
        echo '<td >'.$produit[$i][$j].'</td>';
        }
         }
         }
        elseif($prixmin<=$produit[$i][2] && $prixmax=="" && $r==""){
         if($produit[$i][2]<10){
                                            
        for($j=0;$j<$colonne;$j++){
          echo '<td  class="bg-danger">'.$produit[$i][$j].'</td>';       
         }
     }
     else {
     for($j=0;$j<$colonne;$j++){
     echo '<td >'.$produit[$i][$j].'</td>';
    }
     }
    }
     elseif($prixmax<=$produit[$i][2] && $prixmin=="" && $r==""){
    if($produit[$i][2]<10){
                                        
  for($j=0;$j<$colonne;$j++){
     echo '<td  class="bg-danger">'.$produit[$i][$j].'</td>';       
     }
 }
  else {
    for($j=0;$j<$colonne;$j++){
   echo '<td >'.$produit[$i][$j].'</td>';
     }
 }
 }
 elseif( $r=="" && $produit[$i][2]>=$prixmin && $produit[$i][2]<=$prixmax && $prixmin!="" && $prixmax!="" ){
    if($produit[$i][2]<10){
                                                
     for($j=0;$j<$colonne;$j++){
         echo '<td  class="bg-danger">'.$produit[$i][$j].'</td>';       
 }
  }
     else {
    for($j=0;$j<$colonne;$j++){
      echo '<td >'.$produit[$i][$j].'</td>';
     }
 }
 }                               
  elseif($r<=$produit[$i][1] && $prixmin<=$produit[$i][2] && $prixmax >= $produit[$i][2] && $prixmax>$prixmin && $prixmax!="" && $prixmin!="" && $r!=""){
if($produit[$i][2]<10){                                   
     for($j=0;$j<$colonne;$j++){
 echo '<td  class="bg-danger">'.$produit[$i][$j].'</td>';       
    }
    }
    else {
      for($j=0;$j<5;$j++){
       echo '<td >'.$produit[$i][$j].'</td>';
         }
         }
     }                             
 }                
     echo '</tr>';     
         echo  '</tbody>
     </table> ';
  }   
    ?>
</html>