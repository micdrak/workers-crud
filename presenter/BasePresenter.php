<?php
declare(strict_types=1);

abstract class BasePresenter
{

	/**
	 * @param string $route
	 */
	public function callAction(string $route = 'default')
	{
		$actionName = "action" . ucfirst($route);

		$this->$actionName();
	}

	/**
	 * @param string $template
	 * @param array|null $templateVariables
	 * @return string
	 */
	public function renderTemplate(string $template, array|null $templateVariables = null): string
	{
		ob_start();
		extract($templateVariables);
		include 'templates' . DIRECTORY_SEPARATOR . $template . '.php';

		return ob_get_clean();
	}
}
