<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="/person">Personnes</a></li>
        <li><a href="/boarding">Séjour</a></li>
        <li><a href="/animal">Animaux</a></li>
    </ul>
    <b>
        <p>Nom</p>
    </b>
    <?= $animal->name; ?>
    <b>
        <p>Espece de l'animal</p>
    </b>
    <?= $animal->specie; ?>
    <b>
        <p>Genre</p>
    </b>
    <?= $animal->gender; ?>
    <b>
        <p>Date d'anniversaire</p>
    </b>
    <?= $animal->bday; ?>
    <b>
        <p>Steriliser ?</p>
    </b>
    <?= $animal->sterilized; ?>
    <b>
        <p>Numéro de puce:</p>
    </b>
    <?= $animal->microship; ?>
    <b>
        <p>Information régime alimentaire:</p>
    </b>
    <?= $animal->behavior->toEat(); ?>
    <b>
        <p>Proprietaire</p>
    </b>
    <a href="/person/show/<?= $animal->owner->id; ?>"><?= $animal->owner->name; ?> <?= $animal->owner->firstname; ?></a>
</body>

</html>