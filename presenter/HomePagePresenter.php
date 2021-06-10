<?php
declare(strict_types=1);

class HomePagePresenter extends BasePresenter
{

	public function __construct(private WorkerPosition $workerPosition)
	{

	}

	public function actionDefault()
	{
		$list = $this->workerPosition->getList();

		print $this->renderTemplate('positions', $list);
	}
}
