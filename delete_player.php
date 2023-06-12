<?php
include("parts/header.php");
include("utils/connectDB.php");
if (isset($_GET["id"])) {
    $player = find_player_by_id($bdd, $_GET["id"]);
    if (count($player) === 0) {
        header("Location: index.php");
    }
    $player = $player[0];
} else {
    header("Location: index.php");
}

?>
<h2>Supprimer un joeur</h2>

<a class="btn btn-danger" href="delete.php?id=<?php echo $player["player_id"] ?>">Delete</a>
<a class="btn btn-secondary" href="index.php">Cancel</a>




<?php
include("parts/footer.php");
?>