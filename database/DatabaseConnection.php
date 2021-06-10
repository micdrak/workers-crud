<?php
declare(strict_types=1);

class DatabaseConnection
{

	/** @var PDO|null */
	private ?PDO $connection = null;

	public function __construct(
		private DatabaseConfiguration $databaseConfiguration,
	) {}

	/**
	 * @return PDO|null
	 */
	public function getConnection(): ?PDO
	{
		return $this->connection ?? $this->connect();
	}

	/**
	 * @return PDO
	 */
	private function connect(): ?PDO
	{
		$dsn = 'mysql:host=' . $this->databaseConfiguration->getDatabaseServer() .
			';dbname=' . $this->databaseConfiguration->getDatabaseName() .
			';charset=' . $this->databaseConfiguration->getDatabaseEncoding();

		$this->connection = new PDO (
			$dsn,
			$this->databaseConfiguration->getDatabaseUser(),
			$this->databaseConfiguration->getDatabasePassword()

		);

		return $this->connection;
	}
}
