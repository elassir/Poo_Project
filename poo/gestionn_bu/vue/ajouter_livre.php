<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset = "utf-8">
    <meta name = "veiwport" content ="width = device-width, initial-scale=1.0">
    <title>ajouter un livre</title>


</head>
<body>
<h1>Ajouter un livre </h1>
    <form action ="../controlleur/enregistrer_livre.php" method= "POST">
        <label for="titre">titre:</label>
        <input type="text" id="titre" name="titre" required ><br>

        <label for="auteur">Auteur :</label>
        <input type="Text" id="auteur" name="auteur" required><br>

        <label for= "isbn">isbn :</label>
        <input type="int" id="isbn" name="ISBN" required><br>

        <label for= "nb_exemplaire">nb_exemplaire :</label>
        <input type="int" id="nb_exemplaire" name="nb_exemplaire" required><br>

        <label for="date_parution" >date_parution </label>
        <input type="date" id="date_parution" name ="date_parution"required><br>

        <input type="submit" value="ajouter le livre">
    </form>
</body>
</html>