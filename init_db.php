<?php
declare(strict_types=1);

$pdo = new PDO('sqlite:' . __DIR__ . '/database.sqlite');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// 1. Création de la table
$pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        email TEXT NOT NULL UNIQUE,
        password_hash TEXT NOT NULL,
        role TEXT NOT NULL
    )
");

// 2. Préparation de deux comptes de test
$utilisateurs = [
    [
        'email' => 'admin@test.fr',
        'password' => 'Admin123!',
        'role' => 'admin'
    ],
    [
        'email' => 'client@test.fr',
        'password' => 'Client123!',
        'role' => 'client'
    ]
];

// 3. Insertion avec mot de passe haché
$stmt = $pdo->prepare("INSERT OR IGNORE INTO users (email, password_hash, role) VALUES (:email, :hash, :role)");

foreach ($utilisateurs as $u) {
    $stmt->execute([
        ':email' => $u['email'],
        ':hash'  => password_hash($u['password'], PASSWORD_DEFAULT),
        ':role'  => $u['role']
    ]);
}

echo "Base de données initialisée avec succès avec 2 comptes tests !\n";