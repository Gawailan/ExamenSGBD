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
    <form action="/boarding/update" method="post">
        <!-- ID -->
        <input type="hidden" name="id" value="<?= $boarding->id ?>">
        <!-- Start Date -->
        <label>Date de d'entrée:</label>
        <input type="date" name="dateStart" value="<?php echo $boarding->dateStart ?>" disabled>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['dateStart']) && !empty($_SESSION['ERROR']['UPDATE']['dateStart'])) {?><?=$_SESSION['ERROR']['UPDATE']['dateStart']?><?php } ?>
        <!-- End Date -->
        <label>Date de de sortie:</label>
        <input type="date" name="dateEnd" value="<?php echo $boarding->dateEnd ?>" disabled>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['dateEnd']) && !empty($_SESSION['ERROR']['UPDATE']['dateEnd'])) {?><?=$_SESSION['ERROR']['UPDATE']['dateEnd']?><?php } ?>
        <!-- Animal -->
        <label for="animal_id">Nom de l'animal</label>
        <select name="animal_id" id="animal_id">
            <?php foreach ($animals as $animal) : ?>
                <option value="<?= $animal->id ?>" <?php if ($animal->microship == $boarding->animal->microship) { ?>selected<?php } ?>><?= $animal->name; ?> (<?= $animal->owner->name; ?> <?= $animal->owner->firstname; ?>)</option>
            <?php endforeach; ?>
        </select>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['animal_id']) && !empty($_SESSION['ERROR']['UPDATE']['animal_id'])) {?><?=$_SESSION['ERROR']['UPDATE']['animal_id']?><?php } ?>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>