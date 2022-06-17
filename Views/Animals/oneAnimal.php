<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
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
        <p>Proprietaire:</p>
    </b>
    <a href="/person/show/<?= $animal->owner->id; ?>"><?= $animal->owner->name; ?> <?= $animal->owner->firstname; ?></a>
    <b>
        <p>Séjour:</p>
    </b>
    <?php if ($animal->boardings) : ?>
        <ul>
            <li>A venir / Débuté :
                <ul>
                    <?php foreach ($animal->boardings as $boarding) : ?>
                        <?php if ($boarding->dateEnd >= $dateDay) { ?>
                            <li>
                                <a href="/boarding/show/<?= $boarding->id; ?>"><?= $boarding->dateStart; ?></a>
                            </li>
                        <?php } ?>
                    <?php endforeach ?>
                </ul>
            </li>
            <li>Historique :
                <ul>
                    <?php foreach ($animal->boardings as $boarding) : ?>
                        <?php if ($boarding->dateEnd < $dateDay) { ?>
                            <li>
                                <a href="/boarding/show/<?= $boarding->id; ?>"><?= $boarding->dateStart; ?></a>
                            </li>
                        <?php } ?>
                    <?php endforeach ?>
                </ul>
            </li>
        </ul>
    <?php else : ?>
        <p>Aucun séjour trouvé.</p>
    <?php endif; ?>
</body>

</html>