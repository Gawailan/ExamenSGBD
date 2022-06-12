<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Games</title>
</head>
<body>
   <ul>
       <li><a href="index.php?entity=Animal">Animaux</a></li>
       <li><a href="index.php?entity=type">Séjour</a></li>
   </ul>
    <?php if (isset($persons) && !empty($persons)): ?>
        <ul>
            <?php foreach($persons as $person): ?>
                <li><a href="index.php?entity=Person&id=<?= $person->id; ?>"><?= $person->name; ?> <?= $person->firstname; ?></a>
                    <a href="index.php?entity=Person&id=<?= $person->id; ?>&action=edit">MODIF</a>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="entity" value="Person">
                        <input type="hidden" name="action" value="destroy">
                        <input type="hidden" name="id" value="<?= $person->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
            <a href="index.php?entity=Person&action=create">CREATE</a>
        </ul>
    <?php endif; ?>
</body>
</html>