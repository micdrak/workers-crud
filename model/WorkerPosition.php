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
		$this->validateTitle($title) ?: throw new InvalidModelValueException('Invalid title');

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
		if ($this->validateMargin($default_margin) === false) {
			throw new InvalidModelValueException('Invalid margin specified');
		}

		$this->default_margin = $default_margin;
		return $this;
	}

	/**
	 * At least 2 characters required
	 * @param string $title
	 * @return bool
	 */
	public function validateTitle(string $title): bool
	{
		return strlen($title) > 1;
	}

	/**
	 * More than zero required
	 * @param float $margin
	 * @return bool
	 */
	public function validateMargin(float $margin)
	{
		return $margin > 0;
	}

}
