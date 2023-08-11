<?php
    $servername = "localhost";  // Nom du serveur MySQL
    $username = "votre_nom_utilisateur";  // Nom d'utilisateur de la base de données
    $password = "votre_mot_de_passe";  // Mot de passe de la base de données
    $dbname = "nom_de_votre_base_de_donnees";  // Nom de la base de données

    // Création de la connexion à la base de données
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    } else {
        echo "Connexion réussie à la base de données !";
    }
    $conn->close();
?>