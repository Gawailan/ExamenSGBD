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
        <input type="hidden" name="entity" value="Animal">
        <input type="hidden" name="action" value="store">
        <label for="animal-name">Nom de l'animal:</label>
        <input id="animal-name" type="text" name="name">
        <fieldset>
            <legend>Genre</legend>
            <input type="radio" name="gender" value="1">
            <label>Mâle</label>
            <input type="radio" name="gender" value="0">
            <label>Femelle</label>
        </fieldset>
        <label for="person-bday">Date d'anniversaire:</label>
        <input id="person-bday" type="date" name="bday">
        <fieldset>
            <legend>Stérelisé ?</legend>
            <input type="radio" name="sterilized" value="1">
            <label>Oui</label>
            <input type="radio" name="sterilized" value="0">
            <label>Non</label>
        </fieldset>
        <label for="animal-microship">Numéro de puce:</label>
        <input id="animal-microship" type="text" name="microship">
        <label for="owner_id">Propriétaire</label>
        <select name="owner_id" id="owner_id">
            <?php foreach ($persons as $person) : ?>
                <option value="<?= $person->id ?>"><?= $person->name; ?> <?= $person->firstname; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit">
    </form>
</body>

</html>