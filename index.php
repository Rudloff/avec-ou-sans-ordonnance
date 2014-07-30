<?php
require_once 'config.php';
require_once 'smarty/Smarty.class.php';
$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$pdo = new PDO('mysql:dbname='.DBNAME.';host=localhost', DBUSER, DBPASS);
$pdo->exec("SET NAMES 'utf8';");

if (isset($_GET['id'])) {
    $query = $pdo->prepare(
        'SELECT `Dénomination du médicament`,
        GROUP_CONCAT(`Condition de prescription ou de délivrance`
            SEPARATOR ";") as conditions
        FROM `Spécialités`
        LEFT JOIN `Conditions de prescription et de délivrance`
        ON `Conditions de prescription et de délivrance`.`Code CIS`
            = `Spécialités`.`Code CIS`
        WHERE `Spécialités`.`Code CIS` = :id
        GROUP BY `Spécialités`.`Code CIS`;'
    );
    $query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $query->execute();
    $info = $query->fetch();
    if (!empty($info['conditions'])) {
        $smarty->assign('conditions', explode(';', $info['conditions']));
    }
    $smarty->assign('name', $info['Dénomination du médicament']);
    $smarty->assign('id', $_GET['id']);
    $smarty->display('head.tpl');
    $smarty->display('header.tpl');
    $smarty->assign('search', '');
    $smarty->display('search.tpl');
    $smarty->display('info.tpl');
} elseif (isset($_GET['search'])) {
    $smarty->display('head.tpl');
    $smarty->display('header.tpl');
    $smarty->assign('search', $_GET['search']);
    $smarty->display('search.tpl');
    $query = $pdo->prepare(
        'SELECT `Code CIS`, `Dénomination du médicament` FROM `Spécialités`
        WHERE `Dénomination du médicament` LIKE :search;'
    );
    $search = '%'.$_GET['search'].'%';
    $query->bindParam(':search', $search, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll();
    foreach ($results as &$result) {
        $result['name'] = $result['Dénomination du médicament'];
        $result['id'] = $result['Code CIS'];
    }
    $smarty->assign('results', $results);
    $smarty->assign('search', $_GET['search']);
    $smarty->display('results.tpl');
} else {
    $smarty->display('head.tpl');
    $smarty->display('header_big.tpl');
    $smarty->assign('search', '');
    $smarty->display('search.tpl');
    $smarty->display('home.tpl');
}
$smarty->display('footer.tpl');
?>
