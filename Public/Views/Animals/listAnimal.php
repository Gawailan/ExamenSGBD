<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Animals</title>
</head>

<body>
    <ul>
        <li><a href="index.php?entity=Person">Personnes</a></li>
        <li><a href="index.php?entity=type">Séjour</a></li>
    </ul>
    <?php if (isset($animals) && !empty($animals)) : ?>
        <ul>
            <?php foreach ($animals as $animal) : ?>
                <li><a href="index.php?entity=Person&id=<?= $animal->id; ?>"><?= $animal->name; ?></a>
                    <a href="index.php?entity=Person&id=<?= $animal->id; ?>&action=edit">MODIF</a>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="entity" value="Person">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $animal->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="index.php?entity=Animal&action=create">Reserver un séjour.</a>
</body>

</html>