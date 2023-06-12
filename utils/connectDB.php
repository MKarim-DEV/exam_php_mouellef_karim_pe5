<?php
include("functions.php");
// Try permet de tester le code et dès qu'une erreur survient
// Le code passe dans le Catch
try {

    $bdd = connectDB();

    configPDO($bdd);
}
// $e permet de recuperer l'erreur qui à déclencher le catch
catch (Exception $e) {

    echo ('Erreur connexion à la base de données : ' . $e->getMessage());

    exit;
}