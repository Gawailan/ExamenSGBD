<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $person->name; ?></title>
</head>

<body>
<ul>
        <li><a href="/person">Personnes</a></li>
        <li><a href="/boarding">Séjour</a></li>
        <li><a href="/animal">Animaux</a></li>
    </ul>
    <form action="index.php" method="post">
        <input type="hidden" name="entity" value="Boarding">
        <input type="hidden" name="action" value="store">
        <label>Date de d'entrée:</label>
        <input type="date" name="dateStart" value="<?php echo $boarding->dateStart?>">
        <label>Date de de sortie:</label>
        <input type="date" name="dateEnd" value="<?php echo $boarding->dateEnd?>">
        <label for="animal_id">Nom de l'animal</label>
        <select name="animal_id" id="animal_id">
            <?php foreach ($animals as $animal) : ?>
                <option value="<?= $animal->id ?>" <?php if($animal->microship == $boarding->animal->microship) { ?>selected<?php } ?>><?= $animal->name; ?> (<?= $animal->owner->name; ?> <?= $animal->owner->firstname; ?>)</option>
            <?php endforeach; ?>
        </select>
        <input type="submit">
    </form>
</body>

</html>