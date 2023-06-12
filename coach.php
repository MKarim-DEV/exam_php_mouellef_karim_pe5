<?php
include("utils/connectDB.php");
session_start();

//if (!array_key_exists("username", $_SESSION)) {
//   header("Location: login.php");
//}

$title = "Bienvenue coach";
include("parts/header.php");
$players = get_all_players();

?>
<h1 class="text-center text-primary text-decoration-underline mb-4">Bienvenue Coach</h1>
<div class="d-flex justify-content-center">
    <a class="btn btn-success p-3 fw-semibold" href="http://localhost:8080/php_cours/presentation_des_joueurs/add_player.php">AJOUTER UN JOUEUR</a>
</div>
<div class="d-flex flex-wrap">
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
                                <div class="d-flex justify-content-evenly">
                                    <a class="btn btn-warning py-0" href="update.php?id=<?php echo $player["player_id"] ?>">Update</a>
                                    <a class="btn btn-danger py-0" href="delete_player.php?id=<?php echo $player["player_id"] ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>

        <div class="d-flex justify-content-center">
            <a class="btn btn-danger p-3 fw-semibold" href="http://localhost:8080/php_cours/presentation_des_joueurs/logout.php">SE DECONNECTER</a>
        </div>

        <?php
        include("parts/footer.php");
        ?>