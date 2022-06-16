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
                <li><a href="/boarding/show/<?= $boarding->id; ?>"><?= $boarding->animal->name; ?> <?= $boarding->dateStart ?></a>
                    <a href="/boarding/edit/<?= $boarding->id; ?>">Editer</a>
                    <form action="/boarding/destroy" method="POST">
                        <input type="hidden" name="id" value="<?= $boarding->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="/boarding/create">Crée un séjour</a>
</body>

</html>