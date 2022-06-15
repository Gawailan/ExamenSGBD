<!DOCTYPE html>
<html lang="en">

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
    <?= $person->name; ?>
    <?= $person->firstname; ?>
    <?= $person->bday; ?>
    <?= $person->email; ?>
    <?= $person->phone; ?>

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