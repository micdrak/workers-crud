<?php
declare(strict_types=1);

class InputValidator
{

	/**
	 * At least 2 characters required
	 * @param string $title
	 * @return bool
	 */
	public function validateMinimalStringLenght(string $title): bool
	{
		return strlen($title) > 1;
	}

	/**
	 * More than zero required
	 * @param float $margin
	 * @return bool
	 */
	public function validateGreaterThanZero(float $margin):bool
	{
		return $margin > 0;
	}

	/**
	 * @param string $email
	 * @return bool
	 */
	public function validateEmail(string $email): bool
	{
		return filter_var($email,VALIDATE_EMAIL);
	}
}
