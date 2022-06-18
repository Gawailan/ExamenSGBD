<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/css.css" rel="stylesheet">
    <title>Liste de séjour</title>
</head>

<body>
<nav id=nav>
        <ul>
            <li><a href="/home">Acceuil</a></li>
            <li><a href="/person">Personnes</a></li>
            <li><a href="/boarding">Séjour</a></li>
            <li><a href="/animal">Animaux</a></li>
        </ul>
    </nav>
    <div>
        <h1>Chennil: Pokedex des pets réels</h1>
        <h3>Liste séjour</h3>
    </div>
    <div class=container>
    <?php if (isset($boardings) && !empty($boardings)) : ?>
        <ul>
            <?php foreach ($boardings as $boarding) : ?>
                <li class=data><a href="/boarding/show/<?= $boarding->id; ?>"><?= $boarding->animal->name; ?> <?= $boarding->dateStart ?></a><?php if($boarding->dateStart <= $dateDay){ ?> (Outdated or Starded)<?php } ?>
                <?php if(!($boarding->dateStart <= $dateDay)){ ?>
                    <a href="/boarding/edit/<?= $boarding->id; ?>">Editer</a>
                    <form action="/boarding/destroy" method="POST">
                        <input type="hidden" name="id" value="<?= $boarding->id; ?>">
                        <input type="submit" value="SUPPR"><?php } ?>
                    </form>
                </li></br>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="/boarding/create">Crée un séjour</a>
    </div>
</body>

</html>