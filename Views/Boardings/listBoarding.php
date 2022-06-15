<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Séjours</title>
</head>

<body>
<ul>
        <li><a href="/person">Personnes</a></li>
        <li><a href="/boarding">Séjour</a></li>
        <li><a href="/animal">Animaux</a></li>
    </ul>
    <?php if (isset($boardings) && !empty($boardings)) : ?>
        <ul>
            <?php foreach ($boardings as $boarding) : ?>
                <li><a href="index.php?entity=Boarding&id=<?= $boarding->id; ?>"><?= $boarding->animal->name; ?> <?= $boarding->dateStart ?></a>
                    <a href="index.php?entity=Boarding&id=<?= $boarding->id; ?>&action=edit">Editer</a>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="entity" value="Boarding">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $boarding->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php?entity=Boarding&action=create">Crée un séjour</a>
</body>

</html>