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
$user=fopen("tab.txt", "r");
echo"<table>
<tr>
<th>prenom</th>
<th>nom</th>
<th>age</th>
</tr>";
while(!feof($user)){
$line =fgets($user);
$col=explode(";" ,$line);
echo "<tr>";
for($i=0;$i<3;$i++ ){
    echo "<td>".$col[$i]."</td>";
}     
  echo "</tr>";
// if($col[2]<18){
//     echo "<tr style='background:red'>";}
// else{
//     echo"<tr>";
// }
// echo "<td>".$col[0]."</td>";
// echo "<td>".$col[1]."</td>";
// echo "<td>".$col[2]."</td>";
// echo"</tr>";
}
 echo "</table>";
fclose($user);
?>
</body>
</html>