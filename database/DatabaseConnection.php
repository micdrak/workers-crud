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

		$options = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false,
		];

		$this->connection = new PDO (
			$dsn,
			$this->databaseConfiguration->getDatabaseUser(),
			$this->databaseConfiguration->getDatabasePassword(),
			$options
		);

		return $this->connection;
	}
}
