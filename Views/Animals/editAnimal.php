<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $animal->name; ?></title>
</head>

<body>
    <ul>
        <li><a href="/person">Personnes</a></li>
        <li><a href="/boarding">Séjour</a></li>
        <li><a href="/animal">Animaux</a></li>
    </ul>
    <form action="/animal/update" method="post">
        <input type="hidden" name="id" value="<?= $animal->id ?>">
        <label for="animal-name">Nom:</label>
        <input id="animal-name" type="text" name="name" value="<?= $animal->name; ?>">
        <fieldset>
            <legend>Genre:</legend>
            <input type="radio" name="gender" value="1" <?php if ($animal->gender == "1") { ?>checked="checked" <?php } ?>>
            <label>Mâle</label>
            <input type="radio" name="gender" value="0" <?php if ($animal->gender == "0") { ?>checked="checked" <?php } ?>>
            <label>Femelle</label>
        </fieldset>
        <label for="animal-bday">Date d'anniversaire:</label>
        <input id="animal-bday" type="date" name="bday" value="<?= $animal->bday; ?>">
        <fieldset>
            <legend>Stérelisé ?</legend>
            <input type="radio" name="sterilized" value="1" <?php if ($animal->sterilized == "1") { ?>checked="checked" <?php } ?>>
            <label>Oui</label>
            <input type="radio" name="sterilized" value="0" <?php if ($animal->sterilized == "0") { ?>checked="checked" <?php } ?>>
            <label>Non</label>
        </fieldset>
        <label for="animal-name">Nom de l'animal:</label>
        <input id="animal-name" type="text" name="microship" value="<?= $animal->microship ?>">
        <label for="owner_id">Proprietaire:</label>
        <select name="owner_id" id="owner_id">
            <?php foreach ($persons as $person) : ?>
                <option value="<?= $person->id ?>" <?php if ($animal->owner->id == $person->id) { ?>selected<?php } ?>><?= $person->name; ?> <?= $person->firstname; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit">
    </form>
</body>

</html>