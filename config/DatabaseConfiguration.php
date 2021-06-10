<?php
declare(strict_types=1);

class DatabaseConfiguration
{

	public function __construct(
		private string $databaseServer = 'localhost',
		private string $databaseName = 'slavik_webglobe',
		private string $databaseUser = 'root',
		private string $databasePassword = '',
		private string $databaseEncoding = 'utf8mb4',
	) {}

	/**
	 * @return string
	 */
	public function getDatabaseServer(): string
	{
		return $this->databaseServer;
	}

	/**
	 * @return string
	 */
	public function getDatabaseName(): string
	{
		return $this->databaseName;
	}

	/**
	 * @return string
	 */
	public function getDatabaseUser(): string
	{
		return $this->databaseUser;
	}

	/**
	 * @return string
	 */
	public function getDatabasePassword(): string
	{
		return $this->databasePassword;
	}

	/**
	 * @return string
	 */
	public function getDatabaseEncoding(): string
	{
		return $this->databaseEncoding;
	}
}
