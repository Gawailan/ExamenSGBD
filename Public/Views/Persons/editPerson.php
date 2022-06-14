<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $person->name; ?></title>
</head>

<body>
    <ul>
        <li><a href="index.php?entity=Person">Personnes</a></li>
        <li><a href="index.php?entity=Boarding">Séjour</a></li>
        <li><a href="index.php?entity=Animal">Animaux</a></li>
    </ul>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?= $person->id ?>">
        <input type="hidden" name="entity" value="Person">
        <input type="hidden" name="action" value="update">
        <label for="person-name">Nom:</label>
        <input id="person-name" type="text" name="name" value="<?= $person->name; ?>">
        <label for="person-firstname">Prenom:</label>
        <input id="person-firstname" type="text" name="firstname" value="<?= $person->firstname; ?>">
        <label for="person-bday">Date d'anniversaire:</label>
        <input id="person-bday" type="date" name="bday" value="<?= $person->bday; ?>">
        <label for="person-email">Email:</label>
        <input id="person-email" type="email" name="email" value="<?= $person->email; ?>">
        <label for="person-phone">Phone:</label>
        <input id="person-phone" type="text" name="phone" value="<?= $person->phone; ?>">
        <input type="submit">
    </form>
</body>

</html>