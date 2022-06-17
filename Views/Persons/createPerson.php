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
    <form action="/person/store" method="post">
        <!-- Name -->
        <label for="person-name">Nom:</label></br>
        <input id="person-name" type="text" name="name" value=""></br>
        <?php if (isset($_SESSION['ERROR']['STORE']['name']) && !empty($_SESSION['ERROR']['STORE']['name'])) { ?><?= $_SESSION['ERROR']['STORE']['name'] ?><?php } ?></br>
        </br>
        <!-- Firstanem -->
        <label for="person-firstname">Prenom:</label></br>
        <input id="person-firstname" type="text" name="firstname" value=""></br>
        <?php if (isset($_SESSION['ERROR']['STORE']['firstname']) && !empty($_SESSION['ERROR']['STORE']['firstname'])) { ?><?= $_SESSION['ERROR']['STORE']['firstname'] ?><?php } ?></br>
        </br>
        <!-- Bday -->
        <label for="person-bday">Date d'anniversaire:</label></br>
        <input id="person-bday" type="date" name="bday" value=""></br>
        <?php if (isset($_SESSION['ERROR']['STORE']['bday']) && !empty($_SESSION['ERROR']['STORE']['bday'])) { ?><?= $_SESSION['ERROR']['STORE']['bday'] ?><?php } ?></br></br>
        <!-- Email -->
        <label for="person-email">Email:</label></br>
        <input id="person-email" type="text" name="email"></br>
        <?php if (isset($_SESSION['ERROR']['STORE']['email']) && !empty($_SESSION['ERROR']['STORE']['email'])) { ?><?= $_SESSION['ERROR']['STORE']['email'] ?><?php } ?></br></br>
        <!-- Phone -->
        <label for="person-phone">Telephone:</label></br>
        <input id="person-phone" type="text" name="phone" value=""></br>
        <?php if (isset($_SESSION['ERROR']['STORE']['phone']) && !empty($_SESSION['ERROR']['STORE']['phone'])) { ?><?= $_SESSION['ERROR']['STORE']['phone'] ?><?php } ?></br></br>
        <!-- Send -->
        <input type="submit">
    </form>
</body>

</html>