<?php
declare(strict_types=1);

class PositionPresenter extends BasePresenter
{

	public function __construct(
		private DataSourceFactory $dataSourceFactory,
		private InputValidator $inputValidator,
	)
	{
	}

	public function actionDefault()
	{
		$list = $this->dataSourceFactory->getWorkerPositionDatabaseResource()->getList();

		print $this->renderPage('positions', $list);
	}

	public function actionSave()
	{
		$positionId = intval($_POST['id']);
		$defaultMargin = floatval($_POST['default_margin']);
		$title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);

		$this->validateInput($defaultMargin, $title);

		$position = $this->dataSourceFactory->getWorkerPositionDatabaseResource()->getOne($positionId);
		$position->setUpdatedAt(DateTimeHelper::getNow());
		$position->setTitle($title);
		$position->setDefaultMargin($defaultMargin);

		$result = $this->dataSourceFactory->getWorkerPositionDatabaseResource()->save($position);

		$message = $result === true ? 'success' : 'error';

		$this->redirectWithMessage($message);
	}

	public function actionInsert()
	{
		$defaultMargin = floatval($_POST['default_margin']);
		$title = filter_var($_POST['title'], FILTER_SANITIZE_SPECIAL_CHARS);

		$this->validateInput($defaultMargin, $title);

		$position = new WorkerPosition(
			0,
			DateTimeHelper::getNow(),
			DateTimeHelper::getNow(),
			$title,
			$defaultMargin,
		);
		$result = $this->dataSourceFactory->getWorkerPositionDatabaseResource()->insert($position);

		$message = $result === true ? 'success' : 'error';

		$this->redirectWithMessage($message);
	}

	public function actionDelete()
	{
		$positionId = intval($_POST['id']);

		$result = $this->dataSourceFactory->getWorkerPositionDatabaseResource()->delete($positionId);

		if ($result === true) {
			$this->redirectWithMessage('deleted');
		}
	}

	/**
	 * @param float $defaultMargin
	 * @param mixed $title
	 */
	private function validateInput(float $defaultMargin, mixed $title): void
	{
		if ($this->inputValidator->validateGreaterThanZero($defaultMargin) === false) {
			$this->redirectWithMessage('Nesprávná výchozí odměna');
		}
		if ($this->inputValidator->validateMinimalStringLenght($title) === false) {
			$this->redirectWithMessage('Nesprávný název');
		}
	}

}
