<!DOCTYPE html>
<html lang="en">

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
        <p>Nom:</p>
    </b>
    <?= $person->name; ?>
    <b>
        <p>Prénom:</p>
    </b>
    <?= $person->firstname; ?>
    <b>
        <p>Date d'anniversaire:</p>
    </b>
    <?= $person->bday; ?>
    <b>
        <p>Adresse Email:</p>
    </b>
    <?= $person->email; ?>
    <b>
        <p>Numero de telephone:</p>
    </b>
    <?= $person->phone; ?>
    <b>
        <p>List des animaux:</p>
    </b>
    <?php if ($person->animals): ?>
        <ul>
            <?php foreach ($person->animals as $animal) { ?>
                <li>
                    <a href="/animal/show/<?= $animal->id; ?>"><?= $animal->name; ?></a>
                </li>
            <?php } ?>
        </ul>
    
    <?php else :?>
        <p>Aucun animal trouvé.</p>
    <?php endif; ?>

</body>

</html>