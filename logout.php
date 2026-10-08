<?php
// 1. Charger la session existante pour savoir quoi fermer
session_start();

// 2. Vider toutes les données en mémoire ($_SESSION['user_id'], etc.)
$_SESSION = [];

// 3. Détruire le fichier de session sur le serveur
session_destroy();

// 4. Renvoyer l'utilisateur vers le formulaire de connexion
header('Location: login.php');
exit;