<?php

require_once __DIR__ . '/vendor/autoload.php';

require_once __DIR__ . '/inc/db.php';
// dump($pdo);

$sqlRef = 'SELECT * FROM `todo`';
$pdoStatementRef = $pdo->query($sqlRef);
$todolistRef = $pdoStatementRef->fetchAll(PDO::FETCH_ASSOC);
$sql = '';
$name = '';

// Si je soumet mon formulaire
if (!empty($_POST)) {
    // Je recupere les valeurs de POST dans mes variables
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $importance = isset($_POST['importance']) ? $_POST['importance'] : '';

    // Je valide mes informations
    if ($name === '') {
        // Si le champ est vide
        exit('Votre champ est vide !');
    } else {
        // Si le nom du todo est déà dans la base de données
        foreach ($todolistRef as $todo) {
            if ($todo['name'] === $name) {
                exit('Ce nom est déjà dans la liste (pensez à regarder et supprimer vos todo en DONE )');
            }
        }
    }

    // Je prepare ma requete sql qui va ajouter le nouveau todo dans ma liste
    $sql = "
    INSERT INTO `todo` (`name`, `importance`) 
    VALUES ('{$name}', '{$importance}')
    ";

    // J'execute ma requete et recupere le nombre de lignes affectées
    $affectedRows = $pdo->exec($sql);

    // dump($affectedRows);

    if ($affectedRows === 1) {
        header('Location: index.php' . (!empty($_GET['order']) ? '?order=' . $_GET['order'] : ''));
        exit();
    }
    exit('Une erreur s\'est produite !');
}

// Je vais recuperer les variable contenus dans GET
if (!empty($_GET['id']) && !empty($_GET['action'])) {
    // Je recupere les valeurs de POST dans mes variables
    $id = isset($_GET['id']) ? (int)$_GET['id'] : '';
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $sql = '';

    // Je prepare ma requete en fonction de l'action souhaitée
    switch ($action) {
        case 'done':
            $sql = "UPDATE `todo` SET `fait` = '1' WHERE id = '{$id}'";
            break;
        case 'remove':
            $sql = "DELETE FROM `todo` WHERE id = '{$id}'";
            break;
        case 'todo':
            $sql = "UPDATE `todo` SET `fait` = '0' WHERE id = '{$id}'";
            break;
    }

    // J'execute ma requete et recupere le nombre de lignes affectées
    $affectedRows = $pdo->exec($sql);

    // dump($affectedRows);

    if ($affectedRows === 1) {
        header('Location: index.php' . (!empty($_GET['order']) ? '?order=' . $_GET['order'] : ''));
        exit();
    }
    exit('Une erreur s\'est produite !');
}



// Je recupere ici un tableau avec les todo qui sont effectuees
$sqlDone = 'SELECT * FROM `todo` WHERE `fait` = 1';
$pdoStatementDone = $pdo->query($sqlDone);
$todolistDone = $pdoStatementDone->fetchAll(PDO::FETCH_ASSOC);
// dump($todolistDone);

// Je prépare ma requête sql
$sql = 'SELECT * FROM `todo` WHERE `fait` = 0';

// Si un tri a été demandé, on réécrit la requête
if (!empty($_GET['order'])) {
    // Récupération du tri choisi
    $order = trim($_GET['order']);
    if ($order == 'importance') {
        $sql = '
        SELECT * 
        FROM `todo`
        WHERE `fait` = 0
        ORDER BY `importance`
    ';
    } else {
        exit('Ceci n\'est pas un nom de colonne !');
    }
}

// Je l'execute et stocke le résultat dans une variable
$pdoStatement = $pdo->query($sql);

// Je formate mon résultat sous forme de tableau associatif et je le stocke dans ma variable $todolist
$todolist = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

// dump($todolistRef);
// dump($todolist);

require_once __DIR__ . '/views/todolist.php';
