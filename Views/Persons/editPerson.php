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
    <form action="/person/update" method="post">
        <!-- Id -->
        <input type="hidden" name="id" value="<?= $person->id ?>">
        <!-- Name -->
        <label for="person-name">Nom:</label>
        <input id="person-name" type="text" name="name" value="<?= $person->name; ?>">
        <?php if(isset($_SESSION['ERROR']['UPDATE']['name']) && !empty($_SESSION['ERROR']['UPDATE']['name'])) {?><?=$_SESSION['ERROR']['UPDATE']['name']?><?php } ?>
        <!-- Firstname -->
        <label for="person-firstname">Prenom:</label>
        <input id="person-firstname" type="text" name="firstname" value="<?= $person->firstname; ?>">
        <?php if(isset($_SESSION['ERROR']['UPDATE']['firstname']) && !empty($_SESSION['ERROR']['UPDATE']['firstname'])) {?><?=$_SESSION['ERROR']['UPDATE']['firstname']?><?php } ?>
        <!-- Bday -->
        <label for="person-bday">Date d'anniversaire:</label>
        <input id="person-bday" type="date" name="bday" value="<?= $person->bday; ?>">
        <?php if(isset($_SESSION['ERROR']['UPDATE']['bday']) && !empty($_SESSION['ERROR']['UPDATE']['bday'])) {?><?=$_SESSION['ERROR']['UPDATE']['bday']?><?php } ?>
        <!-- Email -->
        <label for="person-email">Email:</label>
        <input id="person-email" type="email" name="email" value="<?= $person->email; ?>">
        <?php if(isset($_SESSION['ERROR']['UPDATE']['email']) && !empty($_SESSION['ERROR']['UPDATE']['email'])) {?><?=$_SESSION['ERROR']['UPDATE']['email']?><?php } ?>
        <!-- Phone -->
        <label for="person-phone">Phone:</label>
        <input id="person-phone" type="text" name="phone" value="<?= $person->phone; ?>">
        <?php if(isset($_SESSION['ERROR']['UPDATE']['phone']) && !empty($_SESSION['ERROR']['UPDATE']['phone'])) {?><?=$_SESSION['ERROR']['UPDATE']['phone']?><?php } ?>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>