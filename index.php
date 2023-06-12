<?php
include("parts/header.php");
include("utils/connectDB.php");
//var_dump(get_all_datas());
$players = get_all_players(); ?>
<h1 class="text-center text-primary text-decoration-underline">ACCUEIL</h1>
<div class="row justify-content-center">
    <a href="http://localhost:8080/php_cours/presentation_des_joueurs/login.php" class="mt-4 col-lg-2 btn btn-warning fw-bold">LOGIN</a>
</div>
<div class="container mt-3">
    <div class="row justify-content-evenly">
        <?php
        foreach ($players as $player) { ?>
            <div class="col-lg-4 mx-1 mb-3">
                <a href='http://localhost:8080/php_cours/presentation_des_joueurs/player_details.php?id=<?php echo $player["player_id"] ?>'>
                    <div class="card border bg-primary border-3 border-warning mx-4 my-5 shadow">
                        <img src='http://localhost:8080/php_cours/presentation_des_joueurs/img/<?php echo $player["picture"] ?>' class=" pt-4 card-img-top" alt="card-img-top" height="320">
                        <div class="card-body">
                            <h5 class="card-title text-light fw-semibold text-center"><?php echo $player["firstname"] ?> <?php echo $player["name"] ?></h5>
                            <p class="card-text text-warning fw-bold text-center "><?php echo $player["age"] ?> ans</p>
                            <p class="card-text text-danger fw-bold text-center"><?php echo $player["position"] ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<?php
include("parts/footer.php");
?>