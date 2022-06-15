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
        <p>Nom de l'animal:</p>
    </b>
    <a href="index.php?entity=Animal&id=<?= $boarding->animal->id; ?>"><?= $boarding->animal->name; ?></a>
    <b>
        <p>Proprietaire</p>
    </b>
    <a href="index.php?entity=Person&id=<?= $boarding->animal->owner->id; ?>"><?= $boarding->animal->owner->name; ?> <?= $boarding->animal->owner->firstname; ?></a>
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