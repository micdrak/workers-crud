<?php
declare(strict_types=1);

class WorkerDbResource implements WorkerResource
{
	public function __construct(
		private DatabaseConnection $db,
	)
	{
	}

	/**
	 * @param int $id
	 * @return Worker
	 */
	public function getOne(int $id): Worker
	{
		$query = $this->db->getConnection()->prepare('
			SELECT w.*, wp.title AS position_title, wp.default_margin FROM `workers` AS w
			JOIN `workers_position` AS wp ON wp.id = w.position_id WHERE w.id = :id
		');
		$query->execute([$id]);
		$result = $query->fetch();

		return new Worker(...$result);
	}

	/**
	 * @return array Worker[]
	 */
	public function getList(): array
	{
		$result = [];
		$workers = $this->db->getConnection()->query('
			SELECT w.*, wp.title AS position_title, wp.default_margin FROM `workers` AS w
			JOIN `workers_position` AS wp ON wp.id = w.position_id
		')->fetchAll();
		foreach ($workers as $worker) {
			$result[] = new Worker(...$worker);
		}

		return $result;
	}

	public function save(Worker $worker): bool
	{
		$update = [
			'id' => $worker->getId(),
			'position_id' => $worker->getPositionId(),
			'updated_at' => $worker->getUpdatedAt(),
			'surname' => $worker->getSurname(),
			'lastname' => $worker->getLastname(),
			'middlename' => $worker->getMiddlename(),
			'titles' => $worker->getTitles(),
			'email' => $worker->getEmail(),
			'phone' => $worker->getPhone(),
			'margin' => $worker->getMargin(),
		];

		try {
			$query = $this->db->getConnection()->prepare('
				UPDATE `workers` SET
					position_id = :position_id,
					updated_at = :updated_at,
					surname = :surname,
					lastname = :lastname,
					middlename = :middlename,
					titles = :titles,
					email = :email,
					phone = :phone,
					margin = :margin
				WHERE id = :id
			');

			//return $query->execute($update);
			$query->execute($update);
			$query->debugDumpParams();
			return true;
		} catch (PDOException $e) {
			//TODO nice message and logger interface
			throw $e;
		}
	}

	public function insert(Worker $worker)
	{
		$insert = [
			'position_id' => $worker->getPositionId(),
			'created_at' => $worker->getCreatedAt(),
			'updated_at' => $worker->getUpdatedAt(),
			'surname' => $worker->getSurname(),
			'lastname' => $worker->getLastname(),
			'middlename' => $worker->getMiddlename(),
			'titles' => $worker->getTitles(),
			'email' => $worker->getEmail(),
			'phone' => $worker->getPhone(),
			'margin' => $worker->getMargin(),
		];

		try {
			$query = $this->db->getConnection()->prepare('
				INSERT INTO `workers` VALUES (NULL, :position_id, :created_at, :updated_at, :surname,	:lastname, :middlename, :titles, :email, :phone, :margin)
			');

			return $query->execute($insert);

		} catch (PDOException $e) {
			//TODO log;
			throw $e;
		}
	}

	public function delete(int $Id): bool
	{
		try {
			$query = $this->db->getConnection()->prepare('
				DELETE FROM `workers` WHERE id = ?
			');

			return $query->execute([$Id]);

		} catch (PDOException $e) {
			throw $e;
		}
	}
}
