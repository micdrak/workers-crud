<?php
declare(strict_types=1);

interface WorkerResource
{

	/**
	 * @return array Worker[]
	 */
	public function getList(): array;

	public function getOne(int $id): Worker;

	public function save(Worker $worker): bool;

	public function insert(Worker $worker);

	public function delete(int $sId): bool;

}
