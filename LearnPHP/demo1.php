<!DOCTYPE html>
<html lang="en">
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
            <input type="file" name="monfichier" />
            <input type="submit" value="Valider" />
        </p>
    </form>
    <p>
        <a href="demo2.php?nom=Ngoya&amp;prenom=Leonel&amp;repeter=5">Dis-moi bonjour !</a>
    </p>
    <?php
        // 1 : on ouvre le fichier
        $monfichier = fopen('demo.txt', 'r+');
         // 2 : on fera ici nos opérations sur le fichier...
        // 3 : quand on a fini de l'utiliser, on ferme le fichier
        fclose($monfichier);
    ?>
</body>
</html>