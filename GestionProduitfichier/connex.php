<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>connexion</title>
</head>
<body>
<form action="" method="post">
    <label for="login">Login:</label>
    <input type="text" name="login"   style="width:30%" placeholder="login" required>
    <label for="pwd" >Password:</label>
    <input type="password"  name="pwd"  style="width:30%" placeholder="password" required>
  <button type="submit" name="valider" class="btn" style="background-color:pink ; width:15%" >Connexion</button>
</form>
<?php
$monfichier =fopen('adduser1.txt','r'); 
if(isset($_POST['valider'])){
    $login=$_POST['login'];
    $pwd=$_POST['pwd'];
    while(!feof($monfichier)){
        $ligne=fgets($monfichier);
        $col=explode(";", $ligne);
        if(  $login==$col[1] && $pwd==$col[2] && $col[6]=="admin"){
            header("location: adduser.php");
        }
         else if ($login==$col[1] && $pwd==$col[2] && $col[6]=="user" ) {
            header("location: accueil.php");
        }
    }
}  
fclose($monfichier);

?> 
</body>
</html>