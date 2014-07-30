<?php
require_once 'config.php';
$pdo = new PDO('mysql:dbname='.DBNAME.';host=localhost', DBUSER, DBPASS);
$pdo->exec("SET NAMES 'utf8';");
$query = $pdo->prepare(
    'SELECT `Code CIS`, `Dénomination du médicament` FROM `Spécialités`;'
);
$query->execute();
$results = $query->fetchAll();
header('Content-Type: text/plain');
foreach ($results as $result) {
    echo 'http://medicaments.rudloff.pro/index.php?id='.$result['Code CIS'].PHP_EOL;
}
?>