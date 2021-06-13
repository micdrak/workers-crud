<?php
declare(strict_types=1);

class WorkersPresenter extends BasePresenter
{

	public function __construct(
		private DataSourceFactory $dataSourceFactory,
		private InputValidator $inputValidator,
	)
	{
	}

	public function actionDefault()
	{
		$list = $this->dataSourceFactory->getWorkerDatabaseResource()->getList();
		$positions = $this->dataSourceFactory->getWorkerPositionDatabaseResource()->getList();

		$data = [
			'workersList' => $list,
			'positionsList' => $positions,
		];

		print $this->renderPage('workers', $data);
	}

	public function actionSave()
	{
		$workerId = intval($_POST['id']);
		$worker = $this->dataSourceFactory->getWorkerDatabaseResource()->getOne($workerId);
		$worker->setUpdatedAt(DateTimeHelper::getNow());
		$worker->setPositionId(intval($_POST['position_id']));
		$this->inputValidator->validateMinimalStringLenght($_POST['lastname'])
			? $worker->setLastname($_POST['lastname'])
			: $this->redirectWithMessage('Nesprávné příjmení');
		$this->inputValidator->validateMinimalStringLenght($_POST['surname'])
			? $worker->setSurname($_POST['surname'])
			: $this->redirectWithMessage('Nesprávné jméno');
		$this->inputValidator->validateEmail($_POST['email'])
			? $worker->setEmail($_POST['email'])
			: $this->redirectWithMessage('Nesprávný email');
		$this->inputValidator->validatePhone($_POST['phone'])
			? $worker->setPhone($_POST['phone'])
			: $this->redirectWithMessage('Nesprávné telefonní číslo');
		$worker->setMiddlename($_POST['middlename']);
		$worker->setTitles($_POST['titles']);

		$worker->setMargin($this->resolveMargin($_POST['margin']));

		$result = $this->dataSourceFactory->getWorkerDatabaseResource()->save($worker);

		$message = $result === true ? 'success' : 'error';

		$this->redirectWithMessage($message);
	}

	public function actionInsert()
	{
		$this->inputValidator->validateMinimalStringLenght($_POST['lastname'])
			? $lastname = $_POST['lastname']
			: $this->redirectWithMessage('Nesprávné příjmení');
		$this->inputValidator->validateMinimalStringLenght($_POST['surname'])
			? $surname = $_POST['surname']
			: $this->redirectWithMessage('Nesprávné jméno');
		$this->inputValidator->validateEmail($_POST['email'])
			? $email = $_POST['email']
			: $this->redirectWithMessage('Nesprávný email');
		$this->inputValidator->validatePhone($_POST['phone'])
			? $phone = $_POST['phone']
			: $this->redirectWithMessage('Nesprávné telefonní číslo');

		$worker = new Worker(
			0,
			(int) $_POST['position_id'],
			DateTimeHelper::getNow(),
			DateTimeHelper::getNow(),
			$surname,
			$lastname,
			$_POST['middlename'],
			$_POST['titles'],
			$email,
			$phone,
			$this->resolveMargin($_POST['margin']),
			'',
			0
		);
		$result = $this->dataSourceFactory->getWorkerDatabaseResource()->insert($worker);

		$message = $result === true ? 'success' : 'Chyba při ukládání';

		$this->redirectWithMessage($message);
	}

	public function actionDelete()
	{
		$workerId = intval($_POST['id']);

		$result = $this->dataSourceFactory->getWorkerDatabaseResource()->delete($workerId);

		$message = $result === true ? 'deleted' : 'Chyba při mazání';

		$this->redirectWithMessage($message);
	}

	/**
	 * @param $margin
	 * @return float|null
	 */
	private function resolveMargin($margin): float|null
	{
		$margin = floatval($margin);
		
		return $margin > 0 ? $margin : null;
	}

}
