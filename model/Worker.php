<?php
declare(strict_types=1);

class Worker
{
	public function __construct(
		private int $id,
		private int $position_id,
		private string $created_at,
		private string $updated_at,
		private string $surname,
		private string $lastname,
		private ?string $middlename,
		private ?string $titles,
		private string $email,
		private string $phone,
		private ?float $margin,
		private string $position_title,
		private float $default_margin,
	)
	{

	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return int
	 */
	public function getPositionId(): int
	{
		return $this->position_id;
	}

	/**
	 * @param int $position_id
	 * @return Worker
	 */
	public function setPositionId(int $position_id): Worker
	{
		$this->position_id = $position_id;
		return $this;
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
	 * @return Worker
	 */
	public function setCreatedAt(string $created_at): Worker
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
	 * @return Worker
	 */
	public function setUpdatedAt(string $updated_at): Worker
	{
		$this->updated_at = $updated_at;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getSurname(): string
	{
		return $this->surname;
	}

	/**
	 * @param string $surname
	 * @return Worker
	 */
	public function setSurname(string $surname): Worker
	{
		$this->surname = $surname;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLastname(): string
	{
		return $this->lastname;
	}

	/**
	 * @param string $lastname
	 * @return Worker
	 */
	public function setLastname(string $lastname): Worker
	{
		$this->lastname = $lastname;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getMiddlename(): ?string
	{
		return $this->middlename;
	}

	/**
	 * @param string|null $middlename
	 * @return Worker
	 */
	public function setMiddlename(?string $middlename): Worker
	{
		$this->middlename = $middlename;
		return $this;
	}

	/**
	 * @return string|null
	 */
	public function getTitles(): ?string
	{
		return $this->titles;
	}

	/**
	 * @param string|null $titles
	 * @return Worker
	 */
	public function setTitles(?string $titles): Worker
	{
		$this->titles = $titles;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return Worker
	 */
	public function setEmail(string $email): Worker
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPhone(): string
	{
		return $this->phone;
	}

	/**
	 * @param string $phone
	 * @return Worker
	 */
	public function setPhone(string $phone): Worker
	{
		$this->phone = str_replace(' ', '', $phone);
		return $this;
	}

	/**
	 * @return float|null
	 */
	public function getMargin(): ?float
	{
		return $this->margin;
	}

	/**
	 * @param float|null $margin
	 * @return Worker
	 */
	public function setMargin(?float $margin): Worker
	{
		$this->margin = $margin;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPositionTitle(): string
	{
		return $this->position_title;
	}

	/**
	 * @return float
	 */
	public function getDefaultMargin(): float
	{
		return $this->default_margin;
	}

}
