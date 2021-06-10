<?php
declare(strict_types=1);

interface WorkerPosition
{

	public function getList(): ?array;

	public function save(): bool;

	public function update(int $id): WorkerPosition;

}
