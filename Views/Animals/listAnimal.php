<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Animals</title>
</head>

<body>
<ul>
        <li><a href="/person">Personnes</a></li>
        <li><a href="/boarding">Séjour</a></li>
        <li><a href="/animal">Animaux</a></li>
    </ul>
    <?php if (isset($animals) && !empty($animals)) : ?>
        <ul>
            <?php foreach ($animals as $animal) : ?>
                <li><a href="/animal/show/<?= $animal->id; ?>"><?= $animal->name; ?> (<?= $animal->owner->name ?> <?= $animal->owner->firstname ?>)</a>
                    <a href="/animal/edit/<?= $animal->id; ?>">Editer</a>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="id" value="<?= $animal->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="/animal/create">Ajouter un animal</a>
</body>

</html>