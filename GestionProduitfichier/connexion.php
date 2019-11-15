<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>connexion</title>
</head>
<body>
<form action="connexion.php" method="post">
    <label for="login">Login:</label>
    <input type="text" name="login"   style="width:30%" placeholder="login" required>
    <label for="pwd" >Password:</label>
    <input type="password"  name="pwd"  style="width:30%" placeholder="password" required>
  <button type="submit" name="valider" class="btn" style="background-color:pink ; width:15%" >Connexion</button>
</form>
<?php 
if(isset($_POST['valider'])){
    $monfichier =fopen("fichiertab.txt","r");
    while(!feof($monfichier)){
        $ligne=fgets($monfichier);
        $col=explode(",", $ligne);
        
            if($_POST['login']==$col[1] && $_POST['pwd']==$col[2] ){
                header("location: adduser.php");
            }
            else {
                $i++;
            }
        }
    if($_POST['login']!=$col[1] && $_POST['pwd']!=$col[2] ){
        header("location: accueil.php");
    }
    fclose( $monfichier);
}
?> 
<!--$i==substr_count($monfichier, "\n")  -->
</body>
</html>