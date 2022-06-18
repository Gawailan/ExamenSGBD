<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Séjour de: <?= $boarding->animal->name ?></title>
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
    <h3>Edition Séjour</h3>
    <form action="/boarding/update" method="post">
        <!-- ID -->
        <input type="hidden" name="id" value="<?= $boarding->id ?>">
        <!-- Start Date -->
        <label>Date de d'entrée:</label></br>
        <input type="date" name="dateStart" value="<?php echo $boarding->dateStart ?>" disabled></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['dateStart']) && !empty($_SESSION['ERROR']['UPDATE']['dateStart'])) {?><?=$_SESSION['ERROR']['UPDATE']['dateStart']?><?php } ?></br></br>
        <!-- End Date -->
        <label>Date de de sortie:</label></br>
        <input type="date" name="dateEnd" value="<?php echo $boarding->dateEnd ?>" disabled></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['dateEnd']) && !empty($_SESSION['ERROR']['UPDATE']['dateEnd'])) {?><?=$_SESSION['ERROR']['UPDATE']['dateEnd']?><?php } ?></br></br>
        <!-- Animal -->
        <label for="animal_id">Nom de l'animal</label></br>
        <select name="animal_id" id="animal_id">
            <?php foreach ($animals as $animal) : ?>
                <option value="<?= $animal->id ?>" <?php if ($animal->microship == $boarding->animal->microship) { ?>selected<?php } ?>><?= $animal->name; ?> (<?= $animal->owner->name; ?> <?= $animal->owner->firstname; ?>)</option>
            <?php endforeach; ?>
        </select></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['animal_id']) && !empty($_SESSION['ERROR']['UPDATE']['animal_id'])) {?><?=$_SESSION['ERROR']['UPDATE']['animal_id']?><?php } ?></br></br>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>