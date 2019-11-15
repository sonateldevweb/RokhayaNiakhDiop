<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>adduser</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
    <form action="" method="post">
        <label>Nom</label>
       <input type="text" name="nom"><br>
       <label>login</label>
       <input type="text"  name="login"><br>
       <label>mot de passe</label>
       <input type="password"  name="pwd"><br>
       <label>identifiant</label>
       <input type="text"  name="id"><br>
       <label>tel</label>
       <input type="number"  name="tel"><br>
       <label>adresse</label>
       <input type="text"  name="add"><br>
       <label>profil</label>
       <input type="text"  name="user"><br>
       <button type="submit" name="envoyer">valider </button>
    </form>  <br> <br>
    <?php
    if(isset($_POST['envoyer'])){
    $nom=$_POST['nom'];
    $login=$_POST['login'];
    $pwd=$_POST['pwd'];
    $id=$_POST['id'];
    $tel=$_POST['tel'];
    $adresse=$_POST['add'];
    $profil=$_POST['user'];
    
    $monfichier=fopen("adduser1.txt",'a+');
    while( $ligne=fgets($monfichier)){
     $col=explode(";", $ligne);
    if($login==$col[1]&& $pwd==$col[2] && $id==$col[3] && $tel==$col[4]){
        echo "existe deja!!!";
    }else{
    fwrite($monfichier,"\n".$nom.";".$login.";".$pwd.";".$id.";".$tel.";".$adresse.";".$profil);
}
}
    fclose($monfichier);
    }
    ?>
    <?php
$user=fopen('adduser1.txt','a+');
echo'<table border=1 width=100% height=100%>
    <tr>
<th>Nom</th>
<th>login</th>
<th>mot de passe</th>
<th>identifiant</th>
<th>tel</th>
<th>adresse</th>
<th>profil</th>
<th>statut</th>
</tr>';
while(!feof($user)){
    $ligne=fgets($user);    
    $col=explode(";",$ligne);
if(isset($_POST['submit'])){
    if($disabled){
        echo '<button class="btn btn-success btn-sm" disabled="enabled">bloquer</button>';
    }else{
        echo '<button class="btn btn-danger btn-sm" disabled="disabled">bloquer</button>';
    }
}
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