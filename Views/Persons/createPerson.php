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