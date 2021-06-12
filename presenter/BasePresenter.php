<?php
declare(strict_types=1);

abstract class BasePresenter
{

	/**
	 * @param string $presenterAction
	 */
	public function callAction(string $presenterAction = 'default')
	{
		$actionName = "action" . ucfirst($presenterAction);

		$this->$actionName();
	}

	/**
	 * @param string $templateName
	 * @param array|null $data
	 */
	public function includeTemplate(string $templateName, array|null $data = null): void
	{
		include 'templates' . DIRECTORY_SEPARATOR . $templateName . '.php';
	}

	/**
	 * Workaround for real template engine
	 *
	 * @param string $templateName
	 * @param array|null $templateData
	 * @return string
	 */
	public function renderPage(string $templateName, array|null $templateData = null): string
	{
		ob_start();

		$this->includeTemplate('header');
		$this->includeTemplate('menu');
		$this->includeTemplate('messages');
		$this->includeTemplate($templateName, $templateData);
		$this->includeTemplate('footer');

		return ob_get_clean();
	}

	/**
	 * @param string $message
	 */
	public function redirectWithMessage(string $message): void
	{
		header('Location: index.php?page=' . $_GET['page'] . '&message=' . $message);
		exit;
	}
}
