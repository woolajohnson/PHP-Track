<?php
require_once 'Database.php';
require_once 'QueryBuilder.php';
require_once 'Sites.php';
require_once 'Clients.php';

$sites = new Sites();
$sites->setTable('sites')
    ->select(['client_id', $sites->getCount()])
    ->group_by('client_id')
    ->having($sites->getCount(), '>', 5);
$leadReport = $sites->get();

$clients = new Clients();
$clientList = $clients->setTable('clients')
    ->where(['last_name' => 'Owen'])
    ->get();

echo "Lead Report:<br>";
var_dump($leadReport);

echo "Client List:<br>";
var_dump($clientList);
?>