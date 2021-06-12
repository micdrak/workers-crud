<?php
declare(strict_types=1);

class DataSourceFactory
{

	private $workerPositionDbResource = null;

	public function __construct(private DatabaseConnection $databaseConnection)
	{

	}

	// Here should be Chain of responsibility
	public function getWorkerPositionDatabaseResource(): WorkerPositionResource
	{
		$this->workerPositionDbResource ?? $this->workerPositionDbResource = new WorkerPositonDbResource($this->databaseConnection);

		return $this->workerPositionDbResource;
	}
}
