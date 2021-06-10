<?php
declare(strict_types=1);

class WorkerPositonDb implements WorkerPosition
{
	public function __construct(
		private DatabaseConnection $db,
	){}

	public function getList(): ?array
	{

		return $this->db->getConnection()->query('SELECT * FROM `workers_position`')->fetchAll();

	}

	public function save(): bool
	{
		// TODO: Implement save() method.
	}

	public function update(int $id): WorkerPosition
	{
		// TODO: Implement update() method.
	}
}
