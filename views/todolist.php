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
    <div class="container my-5">
        <div class="header m-3 text-center">
            <h1 class="header_title">
                TODO LIST
            </h1>
            <p class="header_desc lead">
                Voici une application toute simple permettant de répertorier vos todos, mais aussi d'en ajouter et d'en supprimer !
            </p>
        </div>
        <form action="" method="post">
            <div class="input-group mb-3">
                <input type="text" class="input form-control" placeholder="Todo name..." aria-label="Todo name..." aria-describedby="button-addon2" name="name">
                <button class="input-btn btn btn-outline-secondary" type="submit" id="button-addon2">Ajouter !</button>
            </div>
        </form>
        <?php if (!empty($todolist) && count($todolist) >= 2) : ?>
            <a href="index.php?order=importance" class="btn btn-primary mb-3">Trier par importance</a>&nbsp;
            <?php if (!empty($_GET['order'])) : ?>
                <a href="index.php" class="btn btn-dark mb-3">Annuler le tri</a><br>
            <?php endif ?>
        <?php endif ?>
        <ul class="list-group">
            <?php foreach ($todolist as $todo) :
                $color = 'list-group-item-light';
                if ($todo['importance'] == 1) {
                    $color = 'list-group-item-dark';
                } else if ($todo['importance'] == 2) {
                    $color = 'list-group-item-warning';
                }
            ?>
                <li class="list-group-item <?= $color ?>">
                    <div class="d-flex justify-content-between">
                        <div class="me-1">
                            <p class="my-1">
                                <?= $todo['name'] ?>
                            </p>
                        </div>
                        <div class="btn-group ms-1" role="group">
                            <a href="index.php?<?= !empty($_GET['order']) ? 'order=' . $_GET['order'] . '&' : '' ?>action=done&id=<?= $todo['id'] ?>" class="btn btn-outline-success"><i class="bi bi-check2-circle"></i> Done</a>
                            <a href="index.php?<?= !empty($_GET['order']) ? 'order=' . $_GET['order'] . '&' : '' ?>action=remove&id=<?= $todo['id'] ?>" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Supprimer</a>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
        <?php if (!empty($todolistDone)) : ?>
            <div class="header mt-5 text-center">
                <h2 class="header_title">
                    DONE
                </h2>
                <p class="header_desc lead">
                    Ici, se trouve la liste de tous vos todo qui sont effectués. Vous pouvez les garder ici, les repasser en todo ou bien les supprimer !
                </p>
            </div>
            <ul class="list-group">
                <?php foreach ($todolistDone as $todo) : ?>
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <div class="me-1">
                                <p class="my-1">
                                    <?= $todo['name'] ?>
                                </p>
                            </div>
                            <div class="btn-group ms-1" role="group">
                                <a href="index.php?<?= !empty($_GET['order']) ? 'order=' . $_GET['order'] . '&' : '' ?>action=todo&id=<?= $todo['id'] ?>" class="btn btn-outline-primary"><i class="bi bi-check2-circle"></i> Todo</a>
                                <a href="index.php?<?= !empty($_GET['order']) ? 'order=' . $_GET['order'] . '&' : '' ?>action=remove&id=<?= $todo['id'] ?>" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Supprimer</a>
                            </div>
                        </div>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>