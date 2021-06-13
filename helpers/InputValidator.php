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
		return (bool) filter_var($email,FILTER_VALIDATE_EMAIL);
	}

	/**
	 * @param string $phone
	 * @return bool
	 */
	public function validatePhone(string $phone): bool
	{
		return (bool) preg_match('~^[+]?[()/0-9. -]{9,}$~', $phone, $matches);
	}

}
