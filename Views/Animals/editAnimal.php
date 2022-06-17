<!DOCTYPE html>
<html lang="fr">

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
    <form action="/animal/update" method="post">
        <!-- Id -->
        <input type="hidden" name="id" value="<?= $animal->id ?>">
        <!-- Name -->
        <label for="animal-name">Nom:</label></br>
        <input id="animal-name" type="text" name="name" value="<?= $animal->name; ?>"></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['name']) && !empty($_SESSION['ERROR']['UPDATE']['name'])) {?><?=$_SESSION['ERROR']['UPDATE']['name']?><?php } ?></br></br>
        <!-- Species -->
        <label for="specie_animal">Espece de l'animal:</label></br>
        <select name="specie" id="specie_animal">
            <option value="Canin" <?php if ($animal->specie == "Canin") { ?>selected<?php } ?>>Canin</option>
            <option value="Felin" <?php if ($animal->specie == "Felin") { ?>selected<?php } ?>>Félin</option>
        </select></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['specie']) && !empty($_SESSION['ERROR']['UPDATE']['specie'])) {?><?=$_SESSION['ERROR']['UPDATE']['specie']?><?php } ?></br></br>
        <!-- Gender -->
        <fieldset>
            <legend>Genre:</legend>
            <input type="radio" name="gender" value="1" <?php if ($animal->gender == "1") { ?>checked="checked" <?php } ?>>
            <label>Mâle</label>
            <input type="radio" name="gender" value="0" <?php if ($animal->gender == "0") { ?>checked="checked" <?php } ?>>
            <label>Femelle</label></br>
            <?php if(isset($_SESSION['ERROR']['UPDATE']['gender']) && !empty($_SESSION['ERROR']['UPDATE']['gender'])) {?><?=$_SESSION['ERROR']['UPDATE']['gender']?><?php } ?>
        </fieldset></br></br>
        <!-- Bday -->
        <label for="animal-bday">Date d'anniversaire:</label></br>
        <input id="animal-bday" type="date" name="bday" value="<?= $animal->bday; ?>"></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['bday']) && !empty($_SESSION['ERROR']['UPDATE']['bday'])) {?><?=$_SESSION['ERROR']['UPDATE']['bday']?><?php } ?></br>
        <!-- Sterilized -->
        <fieldset>
            <legend>Stérelisé ?</legend>
            <input type="radio" name="sterilized" value="1" <?php if ($animal->sterilized == "1") { ?>checked="checked" <?php } ?>>
            <label>Oui</label>
            <input type="radio" name="sterilized" value="0" <?php if ($animal->sterilized == "0") { ?>checked="checked" <?php } ?>>
            <label>Non</label></br>
            <?php if(isset($_SESSION['ERROR']['UPDATE']['sterilized']) && !empty($_SESSION['ERROR']['UPDATE']['sterilized'])) {?><?=$_SESSION['ERROR']['UPDATE']['sterilized']?><?php } ?>
        </fieldset></br></br>
        <!-- Microship -->
        <label for="animal-micorship">Numero de puces:</label></br>
        <input id="animal-microship" type="text" name="microship" value="<?= $animal->microship ?>"></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['microship']) && !empty($_SESSION['ERROR']['UPDATE']['microship'])) {?><?=$_SESSION['ERROR']['UPDATE']['microship']?><?php } ?></br></br>
        <!-- Owner -->
        <label for="owner_id">Proprietaire:</label></br>
        <select name="owner_id" id="owner_id"></br>
            <?php foreach ($persons as $person) : ?>
                <option value="<?= $person->id ?>" <?php if ($animal->owner->id == $person->id) { ?>selected<?php } ?>><?= $person->name; ?> <?= $person->firstname; ?></option>
            <?php endforeach; ?>
        </select></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['owner_id']) && !empty($_SESSION['ERROR']['UPDATE']['owner_id'])) {?><?=$_SESSION['ERROR']['UPDATE']['owner_id']?><?php } ?></br></br>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>