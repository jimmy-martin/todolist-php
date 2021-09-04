<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/inc/db.php';
// dump($pdo);

$name = '';

// Si je soumet mon formulaire
if (!empty($_POST)) {
    // Je recupere les valeurs de POST dans mes variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    
    // Je valide mes informations
    if ($name === '') {
        exit('Votre champ est vide !');
    }

    // Je prepare ma requete sql qui va ajouter le nouveau todo dans ma liste
    $sql = "
    INSERT INTO `todo` (`name`) 
    VALUES ('{$name}')
    ";

    // J'execute ma requete et recupere le nombre de lignes affectées
    $affectedRows = $pdo->exec($sql);

    // dump($affectedRows);

    if ($affectedRows === 1) {
        header('Location: index.php');
        exit();
    } else {
        exit('Une erreur s\'est produite !');
    }
}

// Je prépare ma requête sql
$sql = 'SELECT * FROM `todo`';

// Je l'execute et stocke le résultat dans une variable
$pdoStatement = $pdo->query($sql);

// Je formate mon résultat sous forme de tableau associatif et je le stocke dans ma variable $todolist
$todolist = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

// dump($todolist);

require_once __DIR__ . '/views/todolist.php';
