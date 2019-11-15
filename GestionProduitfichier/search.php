<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>recherche</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<form  method="POST" action="" style="margin-left:25%;margin-top:-1%;">
        <p>
            <input type="text" name="quantite" placeholder="Quantité" />
            <input type="number" min=1000 name="prix_min" placeholder="prix_min"  />
            <input type="number" min=1 name="prix_max" placeholder="prix_max" />
            <button type="submit"  name="ok" >Rechercher</button>
        </p>
    </form>
    <?php
    $ligne=10;
    $col=4;
      if(isset($_POST['ok'])){
         $r=$_POST['quantite'];
         $prixmin=$_POST['prix_min'];
         $prixmax=$_POST['prix_max'];
         if(empty($_POST['quantite'])&& empty($_POST['prix_min'])&& empty($_POST['prix_max'])) {
             header('location:search.php'); 
         }else{
            echo '<table  border=1 width=100% height=100%>
                <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Quantité</th>
                <th scope="col">Montant</th>
                </tr>';
           $read=file("listeproduits.txt");    
           for($i=0;$i< count($read);$i++){
               $designation=strtok($read[$i],";");
               $pu=strtok(";");
               $quantite=strtok(";");
               $montant=$pu*$quantite;
               $montant=strtok(";");
               //recherche par quantite
               if($r<=$quantite && $r!="" && $prixmax=="" && $prixmin==""){
                  if($quantite<10){
                      echo'
                      <tr class="bg-danger">';
                         echo' <td>'.$designation.'</td>';
                         echo' <td>'.$pu.'</td>';
                         echo' <td>'.$quantite.'</td>';
                         echo' <td>'.$montant.'</td>';
                    echo'</tr>';
                   }else{
                       echo'<tr>';
                       echo'<td>'.$designation.'</td>';
                       echo'<td>'.$pu.'</td>';
                       echo'<td>'.$quantite.'</td>';
                       echo'<td>'.$montant.'</td>';
                       echo'</tr>';
                   }
               }
               //recherche par prix minimmum
               elseif($prixmin<=$pu && $prixmax=="" && $r==""){
                   if($quantite<10){
                       echo'
                       <tr class="bg-danger">';
                          echo'  <td>'.$designation.'</td>';
                          echo' <td>'.$pu.'</td>';
                          echo' <td>'.$quantite.'</td>';
                          echo' <td>'.$montant.'</td>';
                     echo'</tr>';
                    }else{
                        echo'<tr>';
                        echo'<td>'.$designation.'</td>';
                        echo'<td>'.$pu.'</td>';
                        echo'<td>'.$quantite.'</td>';
                        echo'<td>'.$montant.'</td>';
                        echo'</tr>';
                    }
               }
               //recherche par prix maximum
               elseif($prixmax>=$pu && $prixmin=="" && $r==""){
                   if($quantite<10){
                       echo'
                       <tr class="bg-danger">';
                          echo'  <td>'.$designation.'</td>';
                          echo' <td>'.$pu.'</td>';
                          echo' <td>'.$quantite.'</td>';
                          echo' <td>'.$montant.'</td>';
                     echo'</tr>';
                    }else{
                        echo'<tr>';
                        echo'<td>'.$designation.'</td>';
                        echo'<td>'.$pu.'</td>';
                        echo'<td>'.$quantite.'</td>';
                        echo'<td>'.$montant.'</td>';
                        echo'</tr>';
                    }
               }
               //recherche par l'interval entre prixmin et prixmax
             elseif($r=="" && $pu>=$prixmin && $pu<=$prixmax && $prixmin!="" && $prixmax!=""){
               if($quantite<10){
                   echo'
                   <tr class="bg-danger">';
                      echo'  <td>'.$designation.'</td>';
                      echo' <td>'.$pu.'</td>';
                      echo' <td>'.$quantite.'</td>';
                      echo' <td>'.$montant.'</td>';
                 echo'</tr>';
                }else{
                    echo'<tr>';
                    echo'<td>'.$designation.'</td>';
                    echo'<td>'.$pu.'</td>';
                    echo'<td>'.$quantite.'</td>';
                    echo'<td>'.$montant.'</td>';
                    echo'</tr>';
                }
             }
             //recherche pour tous les trois cas
             elseif($r<=$quantite && $prixmin<=$pu && $prixmax >= $pu && $prixmax>$prixmin && $prixmax!="" && $prixmin!="" && $r!=""){
               if($quantite<10){
                   echo'
                   <tr class="bg-danger">';
                      echo'  <td>'.$designation.'</td>';
                      echo' <td>'.$pu.'</td>';
                      echo' <td>'.$quantite.'</td>';
                      echo' <td>'.$montant.'</td>';
                 echo'</tr>';
                }else{
                    echo'<tr>';
                    echo'<td>'.$designation.'</td>';
                    echo'<td>'.$pu.'</td>';
                    echo'<td>'.$quantite.'</td>';
                    echo'<td>'.$montant.'</td>';
                    echo'</tr>';
                }
             }
           }
                echo'</table>';    
       }
        } 
   ?>     
</body>
</html>