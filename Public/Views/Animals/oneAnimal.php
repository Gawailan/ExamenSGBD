<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="index.php?entity=Person">Personnes</a></li>
        <li><a href="index.php?entity=type">Séjour</a></li>
        <li><a href="index.php?entity=Animal">Animaux</a></li>
    </ul>
    <b>
        <p>Nom</p>
    </b>
    <?= $animal->name; ?>
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
        <p>Proprietaire</p>
    </b>
    <a href="index.php?entity=Person&id=<?= $animal->owner->id; ?>"><?= $animal->owner->name; ?> <?= $animal->owner->firstname; ?></a>
</body>

</html>