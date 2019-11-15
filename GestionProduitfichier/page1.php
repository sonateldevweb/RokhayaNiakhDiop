<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
 <?php
// if(file_exists("fichier.txt")) {
//      echo "Le fichier fichier.txt existe";
//      }else {
//           echo "Le fichier n'existe pas"; 
//         }
$monfichier=fopen('fichier.txt','r');
$produits = array(
    array("costume", 50000,20,50000*20), 
    array("chemise", 6000,40,6000*40),
    array("pantalon", 6000,50,6000*50), 
    array("cravate", 2000,60,2000*60),
    array("robe", 30000,35,30000*35),
    array("jupe", 15000,25,15000*25),
    array("chaussure", 10000,80,10000*80), 
    array("sac",25000,9,25000*15),
);
fwrite($monfichier ,$produits);

// $text="rokhaya  kya diop";
// fwrite( $monfichier,$text);
//  while(!feof($monfichier))
// $text2=" pratique sur les fichiers \n";
// $text1="inserer un autre texte  \n";
// fwrite($monfichier,$text2);
// fwrite($monfichier,$text1);
//   echo fgets($monfichier). "<br>"; 
 fclose($monfichier);

 ?>

</body>
</html>