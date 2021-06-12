<?php
declare(strict_types=1);

set_include_path(
	'database' . PATH_SEPARATOR .
	'helpers' . PATH_SEPARATOR .
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

$dataSourceFactory = new DataSourceFactory($db);

$_GET['page'] = "position";

$page = $_GET['page'] ?? 'HomePage';
$action = $_GET['action'] ?? 'default';
$presenterName = $page . 'Presenter';

// FIXME - mic print_r smazat
echo "<pre>" . print_r($_GET, true) . "</pre>";
echo "post:";
echo "<pre>" . print_r($_POST, true) . "</pre>";

/** @var BasePresenter $presenter */
$presenter = new $presenterName($dataSourceFactory);
$presenter->callAction($action);
//TODO handle bad requests