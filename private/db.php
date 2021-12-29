<?php

//Connexion a la dataBase

$host = "localhost:3306";
$dbname = "quiz";
$user = "root";
$pass = "";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('SET NAMES UTF8');
} catch (Exception $e) {
    echo 'Erreur de connexion à la base de donnée' . $e->getMessage();
}