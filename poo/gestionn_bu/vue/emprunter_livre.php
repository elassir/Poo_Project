<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>emprunter livre</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
</head>
<body>
<h1> Emprunter des livres </h1>
    <form action ="../controlleur/chercher_livre.php" method= "POST">
        <label for="titre">titre:</label>
        <input type="text" id="titre" name="titre" required ><br>

        <label for="auteur">Auteur :</label>
        <input type="text" id="auteur" name="auteur" ><br>

        <label for= "isbn">isbn :</label>
        <input type="text" id="isbn" name="ISBN" ><br>

        <label for= "id_membre">Numero d'abonné:</label>
        <input type="text" id="id_membre" name="id_membre" ><br>

        <button >chercher</button><br>
        

        <label for="date_emprunt" >date_emprunt: </label>
        <input type="date" id="date_emprunt" name ="date_emprunt"required><br>

        <label for="date_retour" >date_retour: </label>
        <input type="date" id="date_retour" name ="date_retour"required><br>

        <input type="submit" value="emprunter le livre ">
    </form>
</body>
</html>