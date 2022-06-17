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
    <form action="/boarding/store" method="post">
        <!-- Start Date -->
        <label>Date de d'entrée:</label></br>
        <input type="date" name="dateStart"></br>
        <?php if(isset($_SESSION['ERROR']['STORE']['dateStart']) && !empty($_SESSION['ERROR']['STORE']['dateStart'])) {?><?=$_SESSION['ERROR']['STORE']['dateStart']?><?php } ?></br></br>
        <!-- End Date -->
        <label>Date de de sortie:</label></br>
        <input type="date" name="dateEnd"></br>
        <?php if(isset($_SESSION['ERROR']['STORE']['dateEnd']) && !empty($_SESSION['ERROR']['STORE']['dateEnd'])) {?><?=$_SESSION['ERROR']['STORE']['dateEnd']?><?php } ?></br></br>
        <!-- Animal -->
        <label for="animal_id">Nom de l'animal</label></br>
        <select name="animal_id" id="animal_id"></br>
            <?php foreach ($animals as $animal) : ?>
                <option value="<?= $animal->id ?>"><?= $animal->name; ?> (<?= $animal->owner->name; ?> <?= $animal->owner->firstname; ?>)</option>
            <?php endforeach; ?>
        </select></br></br>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>