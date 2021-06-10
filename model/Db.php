<?php
declare(strict_types=1);

abstract class Db
{

	public function __construct(
		private DatabaseConnection $databaseConnection,
	) {}
}
