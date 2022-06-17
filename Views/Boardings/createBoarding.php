<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $person->name; ?></title>
</head>

<body>
    <?php var_dump($_POST) ?>
<ul>
        <li><a href="/person">Personnes</a></li>
        <li><a href="/boarding">Séjour</a></li>
        <li><a href="/animal">Animaux</a></li>
    </ul>
    <form action="/boarding/store" method="post">
        <!-- Start Date -->
        <label>Date de d'entrée:</label>
        <input type="date" name="dateStart">
        <?php if(isset($_SESSION['ERROR']['STORE']['dateStart']) && !empty($_SESSION['ERROR']['STORE']['dateStart'])) {?><?=$_SESSION['ERROR']['STORE']['dateStart']?><?php } ?>
        <!-- End Date -->
        <label>Date de de sortie:</label>
        <input type="date" name="dateEnd">
        <?php if(isset($_SESSION['ERROR']['STORE']['dateEnd']) && !empty($_SESSION['ERROR']['STORE']['dateEnd'])) {?><?=$_SESSION['ERROR']['STORE']['dateEnd']?><?php } ?>
        <!-- Animal -->
        <label for="animal_id">Nom de l'animal</label>
        <select name="animal_id" id="animal_id">
            <?php foreach ($animals as $animal) : ?>
                <option value="<?= $animal->id ?>"><?= $animal->name; ?> (<?= $animal->owner->name; ?> <?= $animal->owner->firstname; ?>)</option>
            <?php endforeach; ?>
        </select>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>