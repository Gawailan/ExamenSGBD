<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Games</title>
</head>

<body>
    <ul>
        <li><a href="/person">Personnes</a></li>
        <li><a href="/boarding">Séjour</a></li>
        <li><a href="/animal">Animaux</a></li>
    </ul>
    <?php if (isset($persons) && !empty($persons)) : ?>
        <ul>
            <?php foreach ($persons as $person) : ?>
                <li><a href="/person/show/<?= $person->id; ?>"><?= $person->name; ?> <?= $person->firstname; ?></a>
                    <a href="/person/edit/<?= $person->id; ?>">Editer</a>
                    <form action="/person/destroy" method="POST">
                        <input type="hidden" name="id" value="<?= $person->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="/person/create">Ajouter un propriétaire</a>
</body>

</html>