<?php
    // Effectuer ici la requête qui insère le message

    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=demo;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }

    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO minichat (pseudo, messages) VALUES(?, ?)');
    $req->execute(array($_POST['pseudo'], $_POST['messages']));

    // Puis rediriger vers minichat.php comme ceci :
    header('Location: minichat.php');
?>