<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset = "utf-8">
    <meta name = "veiwport" content ="width = device-width, initial-scale=1.0">
    <title>ajouter un membre</title>

</head>
<body>
    <h1>Ajouter un membre</h1>
    <form action ="../controlleur/enregistrer_membre.php" method= "POST">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required ><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for= "adresse">Adresse :</label>
        <input type="text" id="adresse" name="adresse" required><br>

        <label for="date_inscription" >date_inscription: </label>
        <input type="date" id="date_inscription" name ="date_inscription"required><br>

        <input type="submit" value="ajouter le membre">
    </form>
</body>
</html>