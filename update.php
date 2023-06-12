<?php
include("utils/connectDB.php");
$title = "Update player";
include("parts/header.php");

if (!isset($_GET["id"])) {
    header('Location: coach.php');
}

$requete = $bdd->prepare("SELECT * from players WHERE player_id = :id;");
$requete->execute([
    "id" => $_GET["id"]
]);

$player = $requete->fetch();

if (!$player) {
    header('Location: coach.php');
}

$errors = [];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (empty($_POST["name"])) {
        $errors["name"] = 'Veuillez saisir un nom';
    }
    if (empty($_POST["firstname"])) {
        $errors["firstname"] = 'Veuillez saisir un prénom';
    }
    if (empty($_POST["age"])) {
        $errors["age"] = 'Veuillez saisir un age';
    }
    if (empty($_POST["position"])) {
        $errors["position"] = 'Veuillez choisir une position';
    }


    if (count($errors) == 0) {

        $requete = $bdd->prepare("UPDATE players SET name = :name , firstname=:firstname, age = :age, position=:position, picture=:picture WHERE player_id = :id;");

        $requete->execute([
            "name" => $_POST["name"],
            "firstname" => $_POST["firstname"],
            "age" => $_POST["age"],
            "position" => $_POST["position"],
            "picture" => $_POST["picture"],
            "id" => $_GET["id"],
        ]);
        header('Location: coach.php');
    }
}
?>

<form method="POST" action="update.php?id=<?php echo $player["player_id"] ?>" class="form-control">
    <div class="form-group">
        <label>Nom</label>
        <input type="text" name="name" value="<?php echo $player["name"] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Prénom</label>
        <input type="text" name="firstname" value="<?php echo $player["firstname"] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Age</label>
        <input type="number" min="14" name="age" value="<?php echo $player["age"] ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="position">Position</label>
        <select name="position" class="form-control">
            <option>Selectionner une position</option>
            <option>Gardien</option>
            <option>Défenseur</option>
            <option>Milieu</option>
            <option>Attaquant</option>
        </select>
    </div>
    <div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-outline-danger col-lg-3 fw-semibold mt-3 mb-3">
    </div>

    <?php
    //Affichage des erreurs
    if (count($errors) != 0) {
        echo (' <h4>Erreurs lors de la dernière soumission du formulaire : </h2>');
        foreach ($errors as $error) {
            echo ('<div class="text-danger">' . $error . '</div>');
        }
    }
    ?>
</form>
<?php
include("parts/footer.php");
?>