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
    <form action="/person/store" method="post">
        <!-- Name -->
        <label for="person-name">Nom:</label>
        <input id="person-name" type="text" name="name" value="">
        <?php if(isset($_SESSION['ERROR']['STORE']['name']) && !empty($_SESSION['ERROR']['STORE']['name'])) {?><?=$_SESSION['ERROR']['STORE']['name']?><?php } ?>
        <!-- Firstanem -->
        <label for="person-firstname">Prenom:</label>
        <input id="person-firstname" type="text" name="firstname" value="">
        <?php if(isset($_SESSION['ERROR']['STORE']['firstname']) && !empty($_SESSION['ERROR']['STORE']['firstname'])) {?><?=$_SESSION['ERROR']['STORE']['firstname']?><?php } ?>
        <!-- Bday -->
        <label for="person-bday">Date d'anniversaire:</label>
        <input id="person-bday" type="date" name="bday" value="">
        <?php if(isset($_SESSION['ERROR']['STORE']['bday']) && !empty($_SESSION['ERROR']['STORE']['bday'])) {?><?=$_SESSION['ERROR']['STORE']['bday']?><?php } ?>
        <!-- Email -->
        <label for="person-email">Email:</label>
        <input id="person-email" type="text" name="email">
        <?php if(isset($_SESSION['ERROR']['STORE']['email']) && !empty($_SESSION['ERROR']['STORE']['email'])) {?><?=$_SESSION['ERROR']['STORE']['email']?><?php } ?>
        <!-- Phone -->
        <label for="person-phone">Telephone:</label>
        <input id="person-phone" type="text" name="phone" value="">
        <?php if(isset($_SESSION['ERROR']['STORE']['phone']) && !empty($_SESSION['ERROR']['STORE']['phone'])) {?><?=$_SESSION['ERROR']['STORE']['phone']?><?php } ?>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>