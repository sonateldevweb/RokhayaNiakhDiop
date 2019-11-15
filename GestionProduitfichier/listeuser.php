<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$user=fopen('adduser1.txt','a+');
echo'<table border=1  class="table table-dark table-striped">
    <tr>
<th>Nom</th>
<th>Login</th>
<th>Mot de passe</th>
<th>Email</th>
<th>Tel</th>
<th>Adresse</th>
<th>Profil</th>
<th>Statut</th>
</tr>';
while(!feof($user)){
    $ligne=fgets($user);    
    $col=explode(";",$ligne);
   echo"<tr>";
   for($i=0;$i<7;$i++ ){
    echo "<td> ".$col[$i]."</td>";
}
echo "<td> <a href='statut.php?login=$col[1]'> <button>$col[7] </button></a></td>";
echo"</tr>";
}
echo "</table>";
fclose( $user);
    ?>
    
</body>
</html>