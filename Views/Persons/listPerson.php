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
    <div>
        <h1>Chennil: Pokedex des pets réels</h1>
    </div>
    <div class=container>
    <?php if (isset($persons) && !empty($persons)) : ?>
        <ul>
            <?php foreach ($persons as $person) : ?>
                <li class=data><a href="/person/show/<?= $person->id; ?>"><?= $person->name; ?> <?= $person->firstname; ?></a>
                    <a href="/person/edit/<?= $person->id; ?>">Editer</a>
                    <form action="/person/destroy" method="POST">
                        <input type="hidden" name="id" value="<?= $person->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li></br>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="/person/create">Ajouter un propriétaire</a>
    </div>
</body>

</html>