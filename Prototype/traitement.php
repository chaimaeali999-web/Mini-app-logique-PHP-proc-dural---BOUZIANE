<?php

function calculerMoyenne($notes) {
    $total = array_sum($notes); 
    $nombre = count($notes);    
    return $total / $nombre;    
}

function getMention($moyenne) {
    if ($moyenne >= 16) return "Très Bien";
    if ($moyenne >= 14) return "Bien";
    if ($moyenne >= 12) return "Assez Bien";
    if ($moyenne >= 10) return "Passable";
    return "Rattrapage";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'];
    $n1 = $_POST['note1'];
    $n2 = $_POST['note2'];
    $n3 = $_POST['note3'];

    if ($n1 >= 0 && $n1 <= 20 && $n2 >= 0 && $n2 <= 20 && $n3 >= 0 && $n3 <= 20) {
        
        $mesNotes = [$n1, $n2, $n3];

        $moyenne = calculerMoyenne($mesNotes);

        $mention = getMention($moyenne);

        echo "<h1>Résultat de : $nom</h1>";
        echo "La moyenne est : " . round($moyenne, 2) . " / 20<br>";
        echo "Mention : " . $mention;

    } else {
        echo "Erreur : Les notes doivent être entre 0 et 20.";
    }
}
?>