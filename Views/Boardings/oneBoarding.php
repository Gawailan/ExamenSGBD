<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/css.css" rel="stylesheet">
    <title>Séjour de: <?= $boarding->animal->name ?></title>
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
    <div class="title">
        <h3>Information Séjour</h3>
    </div>
    <b>
        <p>Nom de l'animal:</p>
    </b>
    <a href="/animal/show/<?= $boarding->animal->id; ?>"><?= $boarding->animal->name; ?></a>
    <b>
        <p>Proprietaire</p>
    </b>
    <a href="/person/show/<?= $boarding->animal->owner->id; ?>"><?= $boarding->animal->owner->name; ?> <?= $boarding->animal->owner->firstname; ?></a>
    <b>
        <p>Date du début du séjour:</p>
    </b>
    <?= $boarding->dateStart; ?>
    <b>
        <p>Date de fin du séjour</p>
    </b>
    <?= $boarding->dateEnd; ?>
</body>

</html>