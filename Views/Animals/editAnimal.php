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
        <!-- Id -->
        <input type="hidden" name="id" value="<?= $animal->id ?>">
        <!-- Name -->
        <label for="animal-name">Nom:</label>
        <input id="animal-name" type="text" name="name" value="<?= $animal->name; ?>">
        <?php if(isset($_SESSION['ERROR']['UPDATE']['name']) && !empty($_SESSION['ERROR']['UPDATE']['name'])) {?><?=$_SESSION['ERROR']['UPDATE']['name']?><?php } ?>
        <!-- Species -->
        <label for="specie_animal">Espece de l'animal:</label>
        <select name="specie" id="specie_animal">
            <option value="Canin" <?php if ($animal->specie == "Canin") { ?>selected<?php } ?>>Canin</option>
            <option value="Felin" <?php if ($animal->specie == "Felin") { ?>selected<?php } ?>>Félin</option>
        </select>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['specie']) && !empty($_SESSION['ERROR']['UPDATE']['specie'])) {?><?=$_SESSION['ERROR']['UPDATE']['specie']?><?php } ?>
        <!-- Gender -->
        <fieldset>
            <legend>Genre:</legend>
            <input type="radio" name="gender" value="1" <?php if ($animal->gender == "1") { ?>checked="checked" <?php } ?>>
            <label>Mâle</label>
            <input type="radio" name="gender" value="0" <?php if ($animal->gender == "0") { ?>checked="checked" <?php } ?>>
            <label>Femelle</label>
        </fieldset>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['gender']) && !empty($_SESSION['ERROR']['UPDATE']['gender'])) {?><?=$_SESSION['ERROR']['UPDATE']['gender']?><?php } ?>
        <!-- Bday -->
        <label for="animal-bday">Date d'anniversaire:</label>
        <input id="animal-bday" type="date" name="bday" value="<?= $animal->bday; ?>">
        <?php if(isset($_SESSION['ERROR']['UPDATE']['bday']) && !empty($_SESSION['ERROR']['UPDATE']['bday'])) {?><?=$_SESSION['ERROR']['UPDATE']['bday']?><?php } ?>
        <!-- Sterilized -->
        <fieldset>
            <legend>Stérelisé ?</legend>
            <input type="radio" name="sterilized" value="1" <?php if ($animal->sterilized == "1") { ?>checked="checked" <?php } ?>>
            <label>Oui</label>
            <input type="radio" name="sterilized" value="0" <?php if ($animal->sterilized == "0") { ?>checked="checked" <?php } ?>>
            <label>Non</label>
        </fieldset>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['sterilized']) && !empty($_SESSION['ERROR']['UPDATE']['sterilized'])) {?><?=$_SESSION['ERROR']['UPDATE']['sterilized']?><?php } ?>
        <!-- Microship -->
        <label for="animal-micorship">Numero de puces:</label>
        <input id="animal-microship" type="text" name="microship" value="<?= $animal->microship ?>">
        <?php if(isset($_SESSION['ERROR']['UPDATE']['microship']) && !empty($_SESSION['ERROR']['UPDATE']['microship'])) {?><?=$_SESSION['ERROR']['UPDATE']['microship']?><?php } ?>
        <!-- Owner -->
        <label for="owner_id">Proprietaire:</label>
        <select name="owner_id" id="owner_id">
            <?php foreach ($persons as $person) : ?>
                <option value="<?= $person->id ?>" <?php if ($animal->owner->id == $person->id) { ?>selected<?php } ?>><?= $person->name; ?> <?= $person->firstname; ?></option>
            <?php endforeach; ?>
        </select>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['owner_id']) && !empty($_SESSION['ERROR']['UPDATE']['owner_id'])) {?><?=$_SESSION['ERROR']['UPDATE']['owner_id']?><?php } ?>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>