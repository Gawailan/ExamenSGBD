<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $person->name; ?></title>
</head>

<body>
    <form action="index.php" method="post">
        <input type="hidden" name="entity" value="Person">
        <input type="hidden" name="action" value="store">
        <label for="person-name">Nom:</label>
        <input id="person-name" type="text" name="name" value="">
        <label for="person-firstname">Prenom:</label>
        <input id="person-firstname" type="text" name="firstname" value="">
        <label for="person-bday">Date d'anniversaire:</label>
        <input id="person-bday" type="date" name="bday" value="">
        <label for="person-email">Email:</label>
        <input id="person-email" type="email" name="email" value="">
        <label for="person-phone">Telephone:</label>
        <input id="person-phone" type="text" name="phone" value="">
        <input type="submit">
    </form>
</body>

</html>