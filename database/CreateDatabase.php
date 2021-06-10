<?php
declare(strict_types=1);

class CreateDatabase
{

	public function __construct(
		private DatabaseConnection $connection,
	) {}

	public function createStructure()
	{
		$database = 'CREATE DATABASE `slavik_webglobe` CHARACTER SET utf8 COLLATE utf8_general_ci;';
		$this->connection->query($database);

		foreach ($this->getTables() as $table) {
			$this->connection->query($table);
		};

		return $this;
	}

	public function populateDefaults()
	{
		//default values

		return $this;
	}

	private function getTables(): array
	{
		return [
			'position' => "CREATE TABLE `worker_position` (
				`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				inserted` datetime NOT NULL,
				`title` varchar(255) NOT NULL,
				`default_revenue` float unsigned NOT NULL COMMENT 'standartni plat',
				PRIMARY KEY (`id`),
				UNIQUE KEY `position_title_unique` (`title`) USING BTREE
				) ENGINE=InnoDB DEFAULT CHARSET=utf8;
				",
			'worker' => "CREATE TABLE `NewTable` (
				`id`  int UNSIGNED NOT NULL AUTO_INCREMENT ,
				`position`  int UNSIGNED NOT NULL ,
				`name`  varchar(255) NOT NULL ,
				`surname`  varchar(255) NOT NULL ,
				`title`  varchar(255) NULL ,
				`email`  varchar(255) NOT NULL ,
				`phone`  varchar(255) NOT NULL ,
				`revenue`  float UNSIGNED NULL DEFAULT NULL  COMMENT 'konkretni plat' ,
				PRIMARY KEY (`id`),
				FOREIGN KEY (`position`) REFERENCES `worker_position` (`id`) ON DELETE RESTRICT
				);
				",
		];
	}
}
