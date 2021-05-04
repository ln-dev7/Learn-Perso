<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="minichat.css">
    <link rel="icon" href="minichat.png">
    <title>MiniChat</title>
</head>
<body>
    <form action="minichat_post.php" method="POST" id="minichat">
        <input type="text" name="pseudo" id="pseudo" placeholder="Votre pseudo" required>
        <input type="text" name="messages" id="messages" placeholder="Votre message" required>
        <input type="submit" id="envoyer">
        <?php
            // Connexion à la base de données
            try
            {
                $bdd = new PDO('mysql:host=localhost;dbname=demo;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }

            // Récupération des 10 derniers messages
            $reponse = $bdd->query('SELECT pseudo, messages FROM minichat ORDER BY ID DESC LIMIT 0, 8');
        ?>
        <div id="all-messages">
        <?php
            // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
            while ($donnees = $reponse->fetch())
            {
                echo '<div id="all-messages-message"><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['messages']) . '</div>';
            }

            $reponse->closeCursor();
        ?>
        </div>
    </form>
</body>
</html>