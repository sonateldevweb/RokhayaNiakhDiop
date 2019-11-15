<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>liste user</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<?php
$user=fopen('adduser1.txt','r');
echo' <table border=1 width=100% height=100%>
    <tr>
<th>Nom</th>
<th>login</th>
<th>mot de passe</th>
<th>identifiant</th>
<th>tel</th>
<th>adresse</th>
<th>profil</th>
</tr>';
while(!feof($user)){
    $ligne=fgets($user);    
    $col=explode(";",$ligne);
   echo"<tr>";
   for($i=0;$i<count($col);$i++ ){
    echo "<td>".$col[$i]."</td>";
}
echo"</tr>";
}
echo "</table>";
fclose( $user);


?>
    
</body>
</html>