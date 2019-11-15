<?php
$code = $_GET['code'];
$newligne = "";
$fichier = fopen('listeapprenant.txt', 'r');
while (!feof($fichier)) {
    $ligne = fgets($fichier);
    $col = explode(";", $ligne);
    if ($code == $col[0]) {
        if ($col[6] == 'present') {
            $col[6] = 'exclure';
        } else {
            $col[6] = 'present';
        }
        $modifier = $col[0] . ";" . $col[1] . ";" . $col[2] . ";" . $col[3] . ";" . $col[4] . ";" . $col[5] . ";" . $col[6] . ";" . $col[7] . ";" . "\n";
    } else {
        $modifier = $ligne;
    }
    $newligne .= $modifier;
}
fclose($fichier);
$fichier = fopen('listeapprenant.txt', 'w+');
fwrite($fichier, trim($newligne));
fclose($fichier);
header("location:exclure.php")
?>