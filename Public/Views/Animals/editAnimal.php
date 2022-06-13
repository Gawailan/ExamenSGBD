<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $animal->name; ?></title>
</head>

<body>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?= $animal->id ?>">
        <input type="hidden" name="entity" value="Animal">
        <input type="hidden" name="action" value="update">
        <label for="animal-name">Nom:</label>
        <input id="animal-name" type="text" name="name" value="<?= $animal->name; ?>">
        <fieldset>
            <legend>Genre:</legend>
            <input type="radio" name="gender" value="1" <?php if($animal->gender == "true") {?>checked="checked"<?php } ?>>
            <label>Oui</label>
            <input type="radio" name="gender" value="0" <?php if($animal->gender == "false") {?>checked="checked"<?php } ?>>
            <label>Non</label>
        </fieldset>
        <label for="animal-bday">Date d'anniversaire:</label>
        <input id="animal-bday" type="date" name="bday" value="<?= $animal->bday; ?>">
        <fieldset>
            <legend>Stérelisé ?</legend>
            <input type="radio" name="sterilized" value="1" <?php if($animal->sterilized == "true") {?>checked="checked"<?php } ?>>
            <label>Oui</label>
            <input type="radio" name="sterilized" value="0" <?php if($animal->sterilized == "false") {?>checked="checked"<?php } ?>>
            <label>Non</label>
        </fieldset>
        <label for="owner_id">Proprietaire:</label>
        <select name="owner_id" id="owner_id">
            <?php foreach ($persons as $person) : ?>
                <option value="<?= $person->id ?>" <?php if($animal->owner->id = $person->id) {?>checked="checked"<?php } ?>><?= $person->name; ?> <?= $person->firstname; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit">
    </form>
</body>

</html>