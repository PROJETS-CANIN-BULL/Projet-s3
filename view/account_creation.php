<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title> Bull's Friends Association </title>
    <link rel="stylesheet" href="css/formulaire.css">
</head>
<body>
<form id="formulaire" method="post" action="index.php">
    <!--<form method="get" action="created.php"> -->
    <fieldset>
        <legend>Création de compte</legend>
        <p>
            <label for="id">Identifiant</label>
            <input type="text" placeholder="Identifiant" name="id" id="id" required/>
        </p>
        <p>
            <label for="mail">Mail</label>
            <input placeholder="Email" name="mail" id="mail" type="email" required>
        </p>
        <p>
            <label for="password">Mot de Passe</label>
            <input type="text" placeholder="Mot de passe" name="password" id="password" required>
        </p>
        <p>
            <input type="submit" value="Envoyer"/>
            <input type='hidden' name='action' value='creationCompte'>

        </p>
</body>
</html>
