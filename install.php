<?php
declare(strict_types=1);


$db = 'CREATE DATABASE `slavik_webglobe` CHARACTER SET utf8 COLLATE utf8_general_ci;';


$dbConfig = new DatabaseConfiguration();
$createDb = (new CreateDatabase($dbConfig))
	->createStructure()
	->populateDefaults()
;

