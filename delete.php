<?php
include("utils/connectDB.php.php");

if(isset($_GET["id"])){
    $pdo = connectDB();

    $player = find_player_by_id($pdo,$_GET["id"]);
    //Si un ID est renseigné mais n'existe en BDD
    if(count($book) === 0){
        header("Location: index.php");
    }
    //Comme fetchAll renvoie un tableau de Books, je récupere l'unique Book récupéré
    $book = $book[0];
    delete_player($pdo,$player["player_id"]);
    header("Location: index.php");
}else{
    //Si il n'y pas $_GET["id]
    header("Location: index.php");
}


?>