<?php
require_once 'config.php';
$pdo = new PDO('mysql:dbname='.DBNAME.';host=localhost', DBUSER, DBPASS);
$pdo->exec("SET NAMES 'utf8';");
$query = $pdo->prepare(
    'SELECT `Code CIS`, `Dénomination du médicament` FROM `Spécialités`
    WHERE `Type de procédure d\'autorisation de mise sur le marché`
    NOT LIKE "Autorisation d\'importation parallèle";'
);
$query->execute();
$results = $query->fetchAll();
header('Content-Type: text/plain');
foreach ($results as $result) {
    echo 'https://medicaments.rudloff.pro/index.php?id='.$result['Code CIS'].PHP_EOL;
}
?>
