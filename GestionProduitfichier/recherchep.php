<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="projets.css">
    
    <title>liste des produits</title>
</head>

    <body>

    <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                
                </div>
                <ul class="nav navbar-nav">
                <li class="active"><a href="accueil.php">ACCUEIL</a></li>
                <li><a href="listprod.php">LISTE PRODUITS</a></li>
                <li><a href="ajoutprod.php">AJOUT PRODUIT</a></li>
                <li><a href="modifier.php">MODIFIER PRODUIT</a></li>
                <li><a href="rechercher.php">RECHERCHER PRODUIT </a></li>
                <li><a href="supprime.php">SUPPRIMER PRODUIT</a></li>
                </ul>
            
            </div>
    </nav>


    <form  method="POST" action="" style="margin-left:25%;margin-top:-1%;">
        <p>
            <input type="text" name="quantite" placeholder="par quantite" />
            <input type="number" min=1000 name="prix_min" placeholder="par prix_min"  />
            <input type="number" min=1 name="prix_max" placeholder="par prix_max" />
        
            <button type="submit"  name="ok" class="btn btn-primary">Rechercher</button>
        </p>
    </form>

            <br><br>
            <h1>RECHERCHER DE PRODUITS</h1>
     <?php
       $ligne=10;
       $col=4;
         if(isset($_POST['ok'])){
            $r=$_POST['quantite'];
            $prixmin=$_POST['prix_min'];
            $prixmax=$_POST['prix_max'];

            if(empty($_POST['quantite'])&& empty($_POST['prix_min'])&& empty($_POST['prix_max'])) {
                header('location:rechercher.php'); 
            }else{
              
                echo '<table class="table tables">
             <thead class="thead-dark">
                 <tr>
                 <th scope="col">DESIGNATION</th>
                 <th scope="col">PRIX UNITAIRE</th>
                 <th scope="col">QUANTITE</th>
                 <th scope="col">MONTANT</th>
                 </tr>
             </thead>
             <tbody>';
            $read=file("listprod.txt");    
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
                 echo'</tbody>
                 </table>';
        
        }
         }
            

    ?>     

<style>


.thead-dark{
  background-color:skyblue;
  width:1%;
}
.thead{
  background-color:white;
  width:1%;
}
.th{

  width:1%;
  
}
.tm{
  background-color:skyblue;
  width:1%;
}

table
 {
    border: 1px solid rgb(32, 53, 54);
    margin-left: 2%;
    margin-right:-2%;
    width: 80%;
    margin-top:-20%; 
    height: 200px;
}


tfoot {
    background-color: #333;
    color: #fff;
}
h1{
    margin-left: 35%;
    color: darkcyan;
    padding-top:-1%;
    padding-bottom:1%;
}
.red{
color: red !important;
}


</style>
</body>
</html>