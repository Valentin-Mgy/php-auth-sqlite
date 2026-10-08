<?php
session_start();

// 1. Le vigile : si non connecté, redirection immédiate
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$role = $_SESSION['user_role'];
$email = $_SESSION['user_email'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bienvenue <?= htmlspecialchars($email) ?></h1>

    <?php if ($role === 'admin'): ?>
        <p style="color: red; font-weight: bold;">Rôle : admin</p>
        <p>Accès au panneau d'administration.</p>
    <?php elseif ($role === 'client'): ?>
        <p style="color: green; font-weight: bold;">Rôle : client</p>
        <p>Accès à votre espace client standard.</p>
    <?php endif; ?>

    <p><a href="logout.php">Se déconnecter</a></p>
</body>
</html>