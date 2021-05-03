<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Veuillez taper votre prénom :</p>
    <form action="demo2.php" method="post" enctype="multipart/form-data">
        <p>
            <input type="text" name="prenom" /><br />
            <input type="submit" value="Valider" />
        </p>
    </form>
    <p>
        <a href="demo2.php?nom=Ngoya&amp;prenom=Leonel&amp;repeter=5">Dis-moi bonjour !</a>
    </p>
    <?php
        $bdd = new PDO('mysql:host=localhost;dbname=demo;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        /*$reponse = $bdd->query('SELECT * FROM jeux_video');

        // On affiche chaque entrée une à une
        while ($donnees = $reponse->fetch())
        {
        ?>
            <p>
            <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
            Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
            Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
            <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
        </p>
        <?php
        }

        $reponse->closeCursor(); // Termine le traitement de la requête*/

        /*$reponse = $bdd->query('SELECT nom, possesseur FROM jeux_video WHERE possesseur=\'Florent\' AND prix < 20');

        while ($donnees = $reponse->fetch())
        {
            echo $donnees['nom'] . ' appartient à ' . $donnees['possesseur'] . '<br />';
        }*/

        // les Requete preparees

        $req = $bdd->prepare('SELECT nom, prix, console FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax AND console = :console');
        $req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max'], 'console' => $_GET['console']));

        echo '<ul>';
        while ($donnees = $req->fetch())
        {
            echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR) - '. $donnees['console']. ' </li>';
        }
        echo '</ul>';

        $req->closeCursor();

    ?>
</body>
</html>