<?php
require_once 'config.php';
header('Content-Type: text/plain; charset=utf-8');

//Download data
echo 'Downloading data…'.PHP_EOL;
$csv = file_get_contents(
    'http://base-donnees-publique.medicaments.gouv.fr/'.
    'telechargement.php?fichier=CIS_bdpm.txt'
);
file_put_contents('data/CIS_bdpm.csv', $csv);
$csv = file_get_contents(
    'http://base-donnees-publique.medicaments.gouv.fr/'.
    'telechargement.php?fichier=CIS_CPD_bdpm.txt'
);
file_put_contents('data/CIS_CPD_bdpm.csv', $csv);

//PDO
$pdo = new PDO('mysql:dbname='.DBNAME.';host=localhost', DBUSER, DBPASS);
$pdo->exec("SET NAMES 'utf8';");

//Create tables
echo 'Creating tables…'.PHP_EOL;
$query = $pdo->prepare(
    file_get_contents('create_tables.sql')
);
$query->execute();

//Empty tables
echo 'Emptying tables…'.PHP_EOL;
$query = $pdo->prepare(
    "DELETE FROM `Spécialités`;
    DELETE FROM `Conditions de prescription et de délivrance`;"
);
$query->execute();

//Load CSV files
echo 'Importing data…'.PHP_EOL;
$query = $pdo->prepare(
    "LOAD DATA INFILE '".__DIR__."/data/CIS_bdpm.csv'
    INTO TABLE `Spécialités`
    FIELDS TERMINATED BY '\t';
    LOAD DATA INFILE '".__DIR__."/data/CIS_CPD_bdpm.csv'
    INTO TABLE `Conditions de prescription et de délivrance`
    FIELDS TERMINATED BY '\t';"
);
$query->execute();

//Timestamp
echo 'Writing timestamp…'.PHP_EOL;
file_put_contents('data/timestamp.json', json_encode(new DateTime()).PHP_EOL);

//Done
echo 'Done!'.PHP_EOL;
?>
