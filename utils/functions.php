<?php
function connectDB(){
    $host = 'localhost';
    $dbName = 'fff';
    $user = 'root';
    $password = '';

    return new PDO(
        'mysql:host='.$host.';dbname='.$dbName.';charset=utf8',
        $user,
        $password);
}

function configPDO($bdd){
// Cette ligne demandera à pdo de renvoyer les erreurs SQL si il y en a
$bdd->setAttribute(PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION);

// Ne recuperer que les indices assoc
$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
PDO::FETCH_ASSOC);
}

function get_all_players(){
    //Création de la requete Sql
    $bdd = connectDB();
    $allUsers = $bdd->prepare('SELECT * FROM players
    ORDER BY player_id');
    $allUsers->execute();
    return $allUsers->fetchAll(2);
}

function find_player_by_id(int $id): array
{
    //Création et préparation de la requete Sql
    $bdd = connectDB();
    $request = $bdd->prepare('SELECT * FROM  players WHERE player_id = :id');

    //Je renseigne mes parametres
    $request->execute([
        "id" => $id
    ]);

    //Je renvoie le resultat
    return $request->fetch();
}

function add_players():void
{
    //Création et préparation de la requete Sql
    $pdo = connectDB();
    $request = $pdo->prepare('INSERT INTO players(name,firstname,age,position,picture) VALUES (:name,:firstname,:age,:position,:picture)');

    //Je renseigne mes parametres
    $request->execute([
        "name" => $_POST["name"],
        "firstname" => $_POST["firstname"],
        "age" => $_POST["age"],
        "position" => $_POST["postiion"],
        "picture" => $_POST["picture"]
    ]);
}

