<?php
declare(strict_types=1);

set_include_path(
	'database' . PATH_SEPARATOR .
	'model' . PATH_SEPARATOR .
	'presenter' . PATH_SEPARATOR .
	'templates'
);
spl_autoload_register(function ($className) {
	include $className . '.php';
});

$db = new DatabaseConnection(
	new DatabaseConfiguration()
);


$dbWorkersPosition = new WorkerPositonDb($db);

$presenter = new HomePagePresenter($dbWorkersPosition);
$presenter->callAction();