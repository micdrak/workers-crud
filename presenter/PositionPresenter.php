<?php
declare(strict_types=1);

class PositionPresenter extends BasePresenter
{

	public function __construct(private DataSourceFactory $dataSourceFactory)
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
		$position = $this->dataSourceFactory->getWorkerPositionDatabaseResource()->getOne($positionId);
		$position->setUpdatedAt(DateTimeHelper::getNow());

		try {
			$position->setTitle($_POST['title']);
			$position->setDefaultMargin(floatval($_POST['default_margin']));
		} catch (InvalidModelValueException $e) {
			$this->redirectWithMessage($e->getMessage());
			exit;
		}

		$result = $this->dataSourceFactory->getWorkerPositionDatabaseResource()->save($position);

		$message = $result === true ? 'success' : 'error';

		$this->redirectWithMessage($message);
	}

	public function actionInsert()
	{
		$position = new WorkerPosition(
			0,
			DateTimeHelper::getNow(),
			DateTimeHelper::getNow(),
			$_POST['title'],
			floatval(['default_margin']),
		);
		$result = $this->dataSourceFactory->getWorkerPositionDatabaseResource()->insert($position);

		if ($result === true) {
			header("Location: index.php?page=position&message=success");
		}
	}
}
