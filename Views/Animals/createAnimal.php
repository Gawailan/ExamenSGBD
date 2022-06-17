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
    <form action="/animal/store" method="post">
        <!-- Name -->
        <label for="animal-name">Nom de l'animal:</label>
        <input id="animal-name" type="text" name="name">
        <?php if(isset($_SESSION['ERROR']['STORE']['name']) && !empty($_SESSION['ERROR']['STORE']['name'])) {?><?=$_SESSION['ERROR']['STORE']['name']?><?php } ?>
        <!-- Species -->
        <label for="animal-species">Espece de l'animal:</label>
        <select name="specie" id="animal-species">
            <option value="Canin">Canin</option>
            <option value="Felin">Félin</option>
        </select>
        <?php if(isset($_SESSION['ERROR']['STORE']['specie']) && !empty($_SESSION['ERROR']['STORE']['specie'])) {?><?=$_SESSION['ERROR']['STORE']['specie']?><?php } ?>
        <!-- Gender -->
        <fieldset>
            <legend>Genre</legend>
            <input type="radio" name="gender" value="1">
            <label>Mâle</label>
            <input type="radio" name="gender" value="0">
            <label>Femelle</label>
            <?php if(isset($_SESSION['ERROR']['STORE']['gender']) && !empty($_SESSION['ERROR']['STORE']['gender'])) {?><?=$_SESSION['ERROR']['STORE']['gender']?><?php } ?>
        </fieldset>
        <!-- Bday -->
        <label for="person-bday">Date d'anniversaire:</label>
        <input id="person-bday" type="date" name="bday">
        <?php if(isset($_SESSION['ERROR']['STORE']['bday']) && !empty($_SESSION['ERROR']['STORE']['bday'])) {?><?=$_SESSION['ERROR']['STORE']['bday']?><?php } ?>
        <!-- Sterilized -->
        <fieldset>
            <legend>Stérelisé ?</legend>
            <input type="radio" name="sterilized" value="1">
            <label>Oui</label>
            <input type="radio" name="sterilized" value="0">
            <label>Non</label>
        </fieldset>
        <?php if(isset($_SESSION['ERROR']['STORE']['sterilized']) && !empty($_SESSION['ERROR']['STORE']['sterilized'])) {?><?=$_SESSION['ERROR']['STORE']['sterilized']?><?php } ?>
        <!-- Microship -->
        <label for="animal-microship">Numéro de puce:</label>
        <input id="animal-microship" type="text" name="microship">
        <?php if(isset($_SESSION['ERROR']['STORE']['microship']) && !empty($_SESSION['ERROR']['STORE']['microship'])) {?><?=$_SESSION['ERROR']['STORE']['microship']?><?php } ?>
        <!-- Owner -->
        <label for="owner_id">Propriétaire</label>
        <select name="owner_id" id="owner_id">
            <?php foreach ($persons as $person) : ?>
                <option value="<?= $person->id ?>"><?= $person->name; ?> <?= $person->firstname; ?></option>
            <?php endforeach; ?>
        </select>
        <?php if(isset($_SESSION['ERROR']['STORE']['owner_id']) && !empty($_SESSION['ERROR']['STORE']['owner_id'])) {?><?=$_SESSION['ERROR']['STORE']['owner_id']?><?php } ?>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>