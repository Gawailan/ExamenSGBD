<?php
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/css.css" rel="stylesheet">
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
    <div>
        <h3>Tableau de bord</h3>
        <p>
            <b>Date du jour:</b></br>
            <?= $date ?>
        </p>
        <?php { ?><?php } ?>
        <!-- NBpersons -->
        <?php if (isset($nbpersons)) { ?>
            <p><?= $nbpersons ?> Personnes nous font confiances régulièrement !</p>
        <?php } ?>
        <!-- NBanimals -->
        <?php if (isset($nbanimals)) { ?>
            <p>Nombres de pokémon réel déjà inscrit chez nous: <?= $nbanimals ?></p>
        <?php } ?>
        <!-- NBboarding -->
        <?php if (isset($nbboardings)) { ?>
            <p>Total de séjour déjà réalisé ches nous: <?= $nbboardings ?></p>
        <?php } ?>
        <!-- STARTtoday -->
        <b>Séjour commencant aujourd'hui:</b>
        <?php if (isset($startBoardings) && !empty($startBoardings)) : ?>
            <p>
                <?php foreach ($startBoardings as $boarding) { ?>
                    <li class=data><a href="/boarding/show/<?= $boarding->id; ?>"><?= $boarding->animal->name; ?> (<?= $boarding->animal->owner->name ?> <?= $boarding->animal->owner->firstname ?>)</a></li></br>
                <?php } ?>
            <?php else : ?>
                </br></br>Aucun
            </p>
        <?php endif; ?>
        <!-- ENDtoday -->
        <b>Séjour finissant aujourd'hui:</b>
        <?php if (isset($endBoardings) && !empty($endBoardings)) : ?>
            <p>
                <?php foreach ($endBoardings as $boarding) { ?>
                    <li class=data><a href="/boarding/show/<?= $boarding->id; ?>"><?= $boarding->animal->name; ?> (<?= $boarding->animal->owner->name ?> <?= $boarding->animal->owner->firstname ?>)</a></li></br>
                <?php } ?>
            <?php else : ?>
                </br></br>Aucun
            </p>
        <?php endif; ?>
    </div>
</body>

</html>