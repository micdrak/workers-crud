
<div class="table">
	<div class="tr">
		<div>Pozice</div>
		<div>Příjmení</div>
		<div>Jméno</div>
		<div>Prostřední jméno</div>
		<div>Tituly</div>
		<div>Email</div>
		<div>Telefon</div>
		<div>Osobní odměna</div>
		<div>Běžná odměna na pozici</div>
		<div>Vložen</div>
		<div>Naposledy upraven</div>
		<div>&nbsp;</div>
		<div>&nbsp;</div>
	</div>
	<?php foreach ($data['workersList'] as $worker) {
		/** @var Worker $worker */
	?>
		<div class="tr">
			<div><select name="position_id" form="formSaveWorker<?php echo $worker->getId() ?>">
				<?php foreach ($data['positionsList'] as $position) { /** @var WorkerPosition $position */ ?>
					<option value="<?php echo $position->getId() ?>" <?php if($position->getId() === $worker->getPositionId()) echo 'selected'; ?>>
						<?php echo $position->getTitle() ?>
					</option>
				<?php } ?>
				</select>
			</div>
			<div><input type="text" name="lastname" value="<?php echo $worker->getLastname() ?>" form="formSaveWorker<?php echo $worker->getId() ?>" /></div>
			<div><input type="text" name="surname" value="<?php echo $worker->getSurname() ?>" form="formSaveWorker<?php echo $worker->getId() ?>" /></div>
			<div><input type="text" name="middlename" value="<?php echo $worker->getMiddlename() ?>" form="formSaveWorker<?php echo $worker->getId() ?>" /></div>
			<div><input type="text" name="titles" value="<?php echo $worker->getTitles() ?>" form="formSaveWorker<?php echo $worker->getId() ?>" /></div>
			<div><input type="email" name="email" value="<?php echo $worker->getEmail() ?>" form="formSaveWorker<?php echo $worker->getId() ?>" /></div>
			<div><input type="number" name="phone" value="<?php echo $worker->getPhone() ?>" form="formSaveWorker<?php echo $worker->getId() ?>" /></div>
			<div><input type="number" name="margin" value="<?php echo $worker->getMargin() ?>" placeholder="Dle pozice" form="formSaveWorker<?php echo $worker->getId() ?>" /></div>
			<div><?php echo $worker->getDefaultMargin() ?></div>
			<div><?php echo $worker->getCreatedAt() ?></div>
			<div><?php echo $worker->getUpdatedAt() ?></div>
			<div>
				<form method="post" id="formSaveWorker<?php echo $worker->getId() ?>" action="index.php?page=workers&action=save">
					<input type="hidden" name="id" value="<?php echo $worker->getId() ?>" />
					<input type="submit" value="Uložit" />
					<?php //Here should be XSRF token ?>
				</form>
			</div>

			<div>
				<form method="post" action="index.php?page=workers&action=delete">
					<input type="hidden" name="id" value="<?php echo $worker->getId() ?>"/>
					<?php //Here should be XSRF token ?>
					<input type="submit" value="Smazat" onclick="return confirm('Opravdu smazat?');"/>
				</form>
			</div>
		</div>
	<?php } ?>
</div>
<div class="insert_worker" style="margin-top: 2em;">
	<div><span>Uložit nového pracovníka</span></div>
	<form method="post" action="index.php?page=workers&action=insert">
		<div><input type="text" name="lastname" value="" placeholder="Jméno" /></div>
		<div><input type="text" name="surname" value="" placeholder="Příjmení" /></div>
		<div>Pozice: <select name="position_id">
				<?php foreach ($data['positionsList'] as $position) { /** @var WorkerPosition $position */ ?>
					<option value="<?php echo $position->getId() ?>"><?php echo $position->getTitle() ?></option>
				<?php } ?>
			</select>
		</div>
		<div><input type="text" name="middlename" value="" placeholder="Prostřední jméno" /></div>
		<div><input type="text" name="titles" value="" placeholder="Tituly" /></div>
		<div><input type="email" name="email" value="" placeholder="Email"  /></div>
		<div><input type="number" name="phone" value="" placeholder="Telefon"  /></div>
		<div><input type="number" name="margin" value="" placeholder="Odměna"  /></div>
		<input type="submit" value="Vložit"/>
	</form>
</div>
