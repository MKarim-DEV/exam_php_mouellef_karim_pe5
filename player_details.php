<?php
//var_dump($_GET["id"]);
include("utils/connectDB.php");
$player = find_player_by_id($_GET["id"]);
$title =$player["firstname"]." ".$player["name"];
include("parts/header.php");
?>
<h1 class="text-center text-decoration-underline text-primary"><?php echo $player["firstname"]?> <?php echo $player["name"]?></h1>
<div class="row justify-content-center">
    <div class="card border bg-primary border-3 border-warning mx-5 my-5 shadow col-lg-2">
        <img src='http://localhost:8080/php_cours/presentation_des_joueurs/img/<?php echo $player["picture"] ?>' class=" pt-4 card-img-top" alt="card-img-top" height="320">
        <div class="card-body">
        <h5 class="card-title text-light fw-semibold text-center"><?php echo $player["firstname"] ?> <?php echo $player["name"] ?></h5>
            <p class="card-text text-warning fw-bold text-center "><?php echo $player["age"] ?> ans</p>
            <p class="card-text text-danger fw-semibold text-center"><?php echo $player["position"] ?></p>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <a href="http://localhost:8080/php_cours/presentation_des_joueurs/index.php" class="mt-4 col-lg-2 btn btn-primary fw-bold">Retour à l'accueil</a>
</div>

<?php
include("parts/footer.php");
?>