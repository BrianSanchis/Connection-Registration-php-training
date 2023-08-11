<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
<?php require_once('traitement_inscription.php'); ?>
    <form action="traitement_inscription.php" method="post">
        <div id="contener">
            <div class="input-contener">
                <label for="">Pseudo :</label>
                <input type="text" name="username">
            </div>
                <div class="input-contener">
                    <label for="">Email :</label>
                    <input type="mail" name="mail">
                    <?php echo $errorMessage; ?>
                </div>
                    <div class="input-contener">
                        <label for="">Mot de passe</label>
                        <input type="password" name="password">
                        <?php echo $errorShort; ?>
                        <?php echo $errorTall; ?>
                    </div>
                <div class="input-contener">
                    <label for="">Confirmation mot de passe :</label>
                    <input type="password" name="confPass">
                    <?php echo $errorConf; ?>
                </div>
            <input type="submit" value="S'inscrire">
        </div>
    </form>
</body>
</html>