<?php
declare(strict_types=1);

class WorkerPresenter extends BasePresenter
{

	public function __construct(private DataSourceFactory $dataSourceFactory)
	{

	}

	public function actionDefault()
	{
		$workerPosition = $this->dataSourceFactory->getWorkerPositionDatabaseResource();
		$list = $workerPosition->getList();

		print $this->renderTemplate('positions', $list);
	}

}
