<?php
declare(strict_types=1);

interface WorkerPositionResource
{

	/**
	 * @return array WorkerPosition[]
	 */
	public function getList(): array;

	public function getOne(int $id): WorkerPosition;

	public function save(WorkerPosition $workerPosition): bool;

	public function insert(WorkerPosition $workerPosition);

}
