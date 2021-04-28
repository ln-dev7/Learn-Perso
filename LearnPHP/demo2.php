<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['repeter']))
        {
            // 1 : On force la conversion en nombre entier
            $_GET['repeter'] = (int) $_GET['repeter'];
        
            // 2 : Le nombre doit être compris entre 1 et 100
            if ($_GET['repeter'] >= 1 AND $_GET['repeter'] <= 100) 
            {	
                for ($i = 0 ; $i < $_GET['repeter'] ; $i++)
                {
                    echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !<br />';
                }
            }
        }
        else
        {
           echo 'Il faut renseigner un nom, un prénom et un nombre de répétitions !';
        }
    ?>
    <p>Bonjour !</p>

    <p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo strip_tags($_POST['prenom']); ?> !</p>

    <p>Si tu veux changer de prénom, <a href="demo1.php">clique ici</a> pour revenir à la page demo1.php.</p>

    <?php
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
        {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['monfichier']['size'] <= 1000000)
            {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['monfichier']['tmp_name'],($_FILES['monfichier']['name']));
                    echo "L'envoi a bien été effectué !";
                }
            }
        }
    ?>
</body>
</html>