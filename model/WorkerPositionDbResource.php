<?php
declare(strict_types=1);

class WorkerPositionDbResource implements WorkerPositionResource
{
	public function __construct(
		private DatabaseConnection $db,
	)
	{
	}

	/**
	 * @param int $id
	 * @return WorkerPosition
	 */
	public function getOne(int $id): WorkerPosition
	{
		$query = $this->db->getConnection()->prepare('
			SELECT * FROM `workers_position` WHERE id = :id
		');
		$query->execute([$id]);
		$result = $query->fetch();

		return new WorkerPosition(...$result);
	}

	/**
	 * @return array WorkerPosition[]
	 */
	public function getList(): array
	{
		$result = [];
		$positions = $this->db->getConnection()->query('
			SELECT * FROM `workers_position`
		')->fetchAll();
		foreach ($positions as $position) {
			$result[] = new WorkerPosition(...$position);
		}

		return $result;
	}

	public function save(WorkerPosition $workerPosition): bool
	{
		$update = [
			'id' => $workerPosition->getId(),
			'updated_at' => $workerPosition->getUpdatedAt(),
			'title' => $workerPosition->getTitle(),
			'default_margin' => $workerPosition->getDefaultMargin(),
		];

		try {
			$query = $this->db->getConnection()->prepare('
				UPDATE `workers_position` SET updated_at = :updated_at, title = :title, default_margin = :default_margin
				WHERE id = :id
			');

			return $query->execute($update);
		} catch (PDOException $e) {
			//TODO nice message and logger interface
			throw $e;
		}
	}

	public function insert(WorkerPosition $workerPosition)
	{
		$insert = [
			'created_at' => $workerPosition->getCreatedAt(),
			'updated_at' => $workerPosition->getUpdatedAt(),
			'title' => $workerPosition->getTitle(),
			'default_margin' => $workerPosition->getDefaultMargin(),
		];

		try {
			$query = $this->db->getConnection()->prepare('
				INSERT INTO `workers_position` VALUES (NULL, :created_at, :updated_at, :title, :default_margin)
			');

			return $query->execute($insert);
		} catch (PDOException $e) {
			if ($e->errorInfo[1] == 1062) {
				// duplicate entry, do something else
			}
			//TODO nice messages like unique constrain and logger interface
			throw $e;
		}
	}

	public function delete(int $positionId): bool
	{
		try {
			$query = $this->db->getConnection()->prepare('
				DELETE FROM `workers_position` WHERE id = ?
			');

			return $query->execute([$positionId]);

		} catch (PDOException $e) {
			//TODO foreign key constraint nice message
			throw $e;
		}
	}
}
