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
    <form action="/animal/store" method="post">
        <!-- Name -->
        <label for="animal-name">Nom de l'animal:</label></br>
        <input id="animal-name" type="text" name="name"></br>
        <?php if(isset($_SESSION['ERROR']['STORE']['name']) && !empty($_SESSION['ERROR']['STORE']['name'])) {?><?=$_SESSION['ERROR']['STORE']['name']?><?php } ?></br></br>
        <!-- Species -->
        <label for="animal-species">Espece de l'animal:</label></br>
        <select name="specie" id="animal-species">
            <option value="Canin">Canin</option>
            <option value="Felin">Félin</option>
        </select></br>
        <?php if(isset($_SESSION['ERROR']['STORE']['specie']) && !empty($_SESSION['ERROR']['STORE']['specie'])) {?><?=$_SESSION['ERROR']['STORE']['specie']?><?php } ?></br></br>
        <!-- Gender -->
        <fieldset>
            <legend>Genre</legend>
            <input type="radio" name="gender" value="1">
            <label>Mâle</label>
            <input type="radio" name="gender" value="0">
            <label>Femelle</label></br>
            <?php if(isset($_SESSION['ERROR']['STORE']['gender']) && !empty($_SESSION['ERROR']['STORE']['gender'])) {?><?=$_SESSION['ERROR']['STORE']['gender']?><?php } ?>
        </fieldset></br></br>
        <!-- Bday -->
        <label for="person-bday">Date d'anniversaire:</label></br>
        <input id="person-bday" type="date" name="bday"></br>
        <?php if(isset($_SESSION['ERROR']['STORE']['bday']) && !empty($_SESSION['ERROR']['STORE']['bday'])) {?><?=$_SESSION['ERROR']['STORE']['bday']?><?php } ?></br></br>
        <!-- Sterilized -->
        <fieldset>
            <legend>Stérelisé ?</legend>
            <input type="radio" name="sterilized" value="1">
            <label>Oui</label>
            <input type="radio" name="sterilized" value="0">
            <label>Non</label></br>
            <?php if(isset($_SESSION['ERROR']['STORE']['sterilized']) && !empty($_SESSION['ERROR']['STORE']['sterilized'])) {?><?=$_SESSION['ERROR']['STORE']['sterilized']?><?php } ?>
        </fieldset></br></br>
        <!-- Microship -->
        <label for="animal-microship">Numéro de puce (15Chiffres):</label></br>
        <input id="animal-microship" type="text" name="microship"></br>
        <?php if(isset($_SESSION['ERROR']['STORE']['microship']) && !empty($_SESSION['ERROR']['STORE']['microship'])) {?><?=$_SESSION['ERROR']['STORE']['microship']?><?php } ?></br></br>
        <!-- Owner -->
        <label for="owner_id">Propriétaire</label></br>
        <select name="owner_id" id="owner_id">
            <?php foreach ($persons as $person) : ?>
                <option value="<?= $person->id ?>"><?= $person->name; ?> <?= $person->firstname; ?></option>
            <?php endforeach; ?>
        </select></br>
        <?php if(isset($_SESSION['ERROR']['STORE']['owner_id']) && !empty($_SESSION['ERROR']['STORE']['owner_id'])) {?><?=$_SESSION['ERROR']['STORE']['owner_id']?><?php } ?></br></br>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>