<div class="table">
	<div class="tr">
		<div>Název</div>
		<div>Výchozí odměna</div>
		<div>Vloženo</div>
		<div>Upraveno</div>
		<div>&nbsp;</div>
		<div>&nbsp;</div>
	</div>
	<?php foreach ($data as $position) {
		/** @var WorkerPosition $position */
		?>
		<div class="tr">

			<div><input type="text" name="title" value="<?php echo $position->getTitle() ?>" form="formSavePosition<?php echo $position->getId() ?>" /></div>
			<div><input type="text" name="default_margin" value="<?php echo $position->getDefaultMargin() ?>" form="formSavePosition<?php echo $position->getId() ?>" /></div>
			<div><?php echo $position->getCreatedAt() ?></div>
			<div><?php echo $position->getUpdatedAt() ?></div>

			<div>
				<form method="post" id="formSavePosition<?php echo $position->getId() ?>" action="index.php?page=position&action=save">
					<input type="hidden" name="id" value="<?php echo $position->getId() ?>"/>
					<input type="submit" value="Uložit"/>
					<?php //Here should be XSRF token ?>
				</form>
			</div>

			<div>
				<form method="post" action="index.php?page=position&action=delete">
					<input type="hidden" name="id" value="<?php echo $position->getId() ?>"/>
					<?php //Here should be XSRF token ?>
					<input type="submit" value="Smazat" onclick="return confirm('Opravdu smazat?');"/>
				</form>
			</div>
		</div>
	<?php } ?>
</div>
<div class="table" style="margin-top: 2em;">
	<div class="tr"><span>Uložit novou pozici</span></div>
	<div class="tr">
		<div><form method="post" action="index.php?page=position&action=insert">
			<input type="text" name="title" placeholder="Název" value=""/>
			<input type="text" name="default_margin" placeholder="Výchozí odměna" value=""/>
			<input type="submit" value="Vložit"/>
		</form>
		</div>
	</div>
</div>
