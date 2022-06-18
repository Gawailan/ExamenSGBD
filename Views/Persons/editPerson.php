<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $person->name ?> <?= $person->firstname ?></title>
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
    <h3>Edition propriétaire</h3>
    <form action="/person/update" method="post">
        <!-- Id -->
        <input type="hidden" name="id" value="<?= $person->id ?>">
        <!-- Name -->
        <label for="person-name">Nom:</label></br>
        <input id="person-name" type="text" name="name" value="<?= $person->name; ?>"></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['name']) && !empty($_SESSION['ERROR']['UPDATE']['name'])) {?><?=$_SESSION['ERROR']['UPDATE']['name']?><?php } ?></br></br>
        <!-- Firstname -->
        <label for="person-firstname">Prenom:</label></br>
        <input id="person-firstname" type="text" name="firstname" value="<?= $person->firstname; ?>"></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['firstname']) && !empty($_SESSION['ERROR']['UPDATE']['firstname'])) {?><?=$_SESSION['ERROR']['UPDATE']['firstname']?><?php } ?></br></br>
        <!-- Bday -->
        <label for="person-bday">Date d'anniversaire:</label></br>
        <input id="person-bday" type="date" name="bday" value="<?= $person->bday; ?>"></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['bday']) && !empty($_SESSION['ERROR']['UPDATE']['bday'])) {?><?=$_SESSION['ERROR']['UPDATE']['bday']?><?php } ?></br></br>
        <!-- Email -->
        <label for="person-email">Email:</label></br>
        <input id="person-email" type="email" name="email" value="<?= $person->email; ?>"></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['email']) && !empty($_SESSION['ERROR']['UPDATE']['email'])) {?><?=$_SESSION['ERROR']['UPDATE']['email']?><?php } ?></br></br>
        <!-- Phone -->
        <label for="person-phone">Phone:</label></br>
        <input id="person-phone" type="text" name="phone" value="<?= $person->phone; ?>"></br>
        <?php if(isset($_SESSION['ERROR']['UPDATE']['phone']) && !empty($_SESSION['ERROR']['UPDATE']['phone'])) {?><?=$_SESSION['ERROR']['UPDATE']['phone']?><?php } ?></br></br>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>