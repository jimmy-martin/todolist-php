<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="inc/css/style.css">
    <title>TODO LIST</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1 class="header_title">
                TODO LIST
            </h1>
            <p class="header_desc">
                Voici une application toute simple permettant de répertorier vos todos, mais aussi d'en ajouter et d'en supprimer !
            </p>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="input form-control" placeholder="Todo name..." aria-label="Todo name..." aria-describedby="button-addon2">
            <button class="input-btn btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
        </div>
        <ul class="list-group">
            <?php foreach ($todolist as $todo) : ?>
                <li class="list-group-item">
                    <?= $todo['name'] ?>
                    <button type="button" class="btn btn-outline-success"></button>
                    <button type="button" class="btn btn-outline-primary"></button>
                    <button type="button" class="btn btn-outline-danger"></button>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>