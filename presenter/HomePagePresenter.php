<?php
declare(strict_types=1);

class HomePagePresenter extends BasePresenter
{

	public function __construct()
	{

	}

	public function actionDefault()
	{
		print $this->renderPage('home');
	}

}
