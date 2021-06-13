<?php
declare(strict_types=1);

class WorkerPosition
{
	public function __construct(
		private int $id,
		private string $created_at,
		private string $updated_at,
		private string $title,
		private float $default_margin,
	) {}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getCreatedAt(): string
	{
		return $this->created_at;
	}

	/**
	 * @param string $created_at
	 * @return WorkerPosition
	 */
	public function setCreatedAt(string $created_at): WorkerPosition
	{
		$this->created_at = $created_at;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUpdatedAt(): string
	{
		return $this->updated_at;
	}

	/**
	 * @param string $updated_at
	 * @return WorkerPosition
	 */
	public function setUpdatedAt(string $updated_at): WorkerPosition
	{
		$this->updated_at = $updated_at;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return WorkerPosition
	 */
	public function setTitle(string $title): WorkerPosition
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @return float
	 */
	public function getDefaultMargin(): float
	{
		return $this->default_margin;
	}

	/**
	 * @param float $default_margin
	 * @return WorkerPosition
	 */
	public function setDefaultMargin(float $default_margin): WorkerPosition
	{
		$this->default_margin = $default_margin;
		return $this;
	}

}
