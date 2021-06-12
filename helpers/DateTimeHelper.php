<?php
declare(strict_types=1);

class DateTimeHelper
{

	/**
	 * @return string 'Y-m-d H:i:s' of NOW
	 */
	public static function getNow(): string
	{
		return (new DateTime())->format('Y-m-d H:i:s');
	}
}
