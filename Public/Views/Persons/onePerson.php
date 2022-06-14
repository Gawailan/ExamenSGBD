<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <ul>
        <li><a href="index.php?entity=Person">Personnes</a></li>
        <li><a href="index.php?entity=Boarding">Séjour</a></li>
        <li><a href="index.php?entity=Animal">Animaux</a></li>
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
                    <a href="index.php?entity=Animal&id=<?= $animal->id; ?>"><?= $animal->name; ?></a>
                </li>
            <?php } ?>
        </ul>
    
    <?php else :?>
        <p>Aucun animal trouvé.</p>
    <?php endif; ?>

</body>

</html>