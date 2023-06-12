<?php
$title = "Connexion";
include("parts/header.php");
include("utils/connectDB.php");
session_start();
$errors = [];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (empty($_POST["username"])) {
        $errors["username"] = 'Veuillez saisir un username';
    }

    if (empty($_POST["password"])) {
        $errors["password"] = 'Veuillez saisir un mot de passe';
    }


    if (count($errors) == 0) {

        $stmt = $bdd->prepare(
            'SELECT * FROM users WHERE username = :username'
        );
        $stmt->bindParam(':username', $_POST["username"]);

        $stmt->execute();

        $res = $stmt->fetch();

        if (!$res || !password_verify($_POST["password"], $res["password"])) {

            $errors["password"] = 'Identifiants ou mot de passe incorrecte';
        } else {
            // CONNEXION RÉUSSIE
            // Le hash correspond
            // J'ajoute la session et je redirige l'utilisateur
            $_SESSION["username"] = $res["username"];
            header('coach.php');
        }
    }
}

?>



<div class="container d-flex flex-column col-lg-4">
    <h1 class="text-warning text-center text-decoration-underline mb-5">Connexion</h1>

    <form method="post" action="login.php">
        <div class="form-group">
            <label for="username">Identifiant</label>
            <input id="username" name="username" class="form-control">
        </div>
        <div class="form-group mt-2">
            <label for="password">Mot de passe</label>
            <input id="password" name="password" class="form-control">
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

        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-outline-danger col-lg-3 fw-semibold mt-3 mb-3">
        </div>
    </form>

    <!-- <a href="register.php" class="text-success fw-bold text-decoration-underline">M'enregistrer</a> -->
    <div class="row justify-content-center">
        <a href="http://localhost:8080/php_cours/presentation_des_joueurs/index.php" class="mt-4 col-lg-3 btn btn-primary fw-bold">ACCUEIL</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <?php
    include("parts/footer.php");
    ?>