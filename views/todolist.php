<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="inc/css/style.css">
    <title>TODO LIST</title>
</head>

<body>
    <main class="container">
        <div class="header">
            <h1 class="header_title">
                TODO LIST
            </h1>
            <p class="header_desc">
                Voici une application toute simple permettant de répertorier vos todos, mais aussi d'en ajouter et d'en supprimer !
            </p>
        </div>
        <div>
            <form action="" method="post">
                <input type="text" name="name" id="name" placeholder="Ajouter un nouveau todo">
                <button type="submit">Ajouter</button>
            </form>
        </div>
        <ul>
            <?php foreach ($todolist as $todo) : ?>
                <li>
                    <?= $todo['name'] ?>
                </li>
            <?php endforeach ?>
        </ul>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>