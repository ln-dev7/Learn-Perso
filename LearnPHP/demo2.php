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
</body>
</html>