<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Liste animal(s)</title>
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
        <h3>Liste Animal</h3>
    </div>
    <div class=container>
    <?php if (isset($animals) && !empty($animals)) : ?>
        <ul>
            <?php foreach ($animals as $animal) : ?>
                <li class=data><a href="/animal/show/<?= $animal->id; ?>"><?= $animal->name; ?> (<?= $animal->owner->name ?> <?= $animal->owner->firstname ?>)</a>
                    <a href="/animal/edit/<?= $animal->id; ?>">Editer</a>
                    <form action="/animal/destroy" method="POST">
                        <input type="hidden" name="id" value="<?= $animal->id; ?>">
                        <input type="submit" value="SUPPR">
                    </form>
                </li></br>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <a href="/animal/create">Ajouter un animal</a>
    </div>
</body>

</html>