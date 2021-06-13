<?php
declare(strict_types=1);

class DataSourceFactory
{
	/** @var ?WorkerDbResource */
	private ?WorkerDbResource $workerDbResource = null;

	/** @var ?WorkerPositionDbResource */
	private ?WorkerPositionDbResource $workerPositionDbResource = null;



	public function __construct(private DatabaseConnection $databaseConnection)
	{

	}

	// Here should be Chain of responsibility
	public function getWorkerPositionDatabaseResource(): WorkerPositionResource
	{
		$this->workerPositionDbResource ?? $this->workerPositionDbResource = new WorkerPositionDbResource($this->databaseConnection);

		return $this->workerPositionDbResource;
	}

	public function getWorkerDatabaseResource(): WorkerResource
	{
		$this->workerDbResource ?? $this->workerDbResource = new WorkerDbResource($this->databaseConnection);

		return $this->workerDbResource;
	}
}
