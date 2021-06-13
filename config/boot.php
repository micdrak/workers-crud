<?php
declare(strict_types=1);
mb_internal_encoding("UTF-8");
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
$inputValidator = new InputValidator();


$page = $_GET['page'] ?? 'HomePage';
$action = $_GET['action'] ?? 'default';
$presenterName = $page . 'Presenter';


/** @var BasePresenter $presenter */
$presenter = new $presenterName($dataSourceFactory, $inputValidator);
$presenter->callAction($action);
