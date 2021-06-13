<div class="table">
	<div class="tr">
		<span>Název</span>
		<span>Výchozí odměna</span>
		<span>Vloženo</span>
		<span>Upraveno</span>
		<span>&nbsp;</span>
		<span>&nbsp;</span>
	</div>
	<div class="tr">
		<?php foreach ($data as $position) {
			/** @var WorkerPosition $position */
			?>
			<form method="post" action="index.php?page=position&action=save">
				<input type="hidden" name="id" value="<?php echo $position->getId() ?>" />
				<div><input type="text" name="title" value="<?php echo $position->getTitle() ?>" /></div>
				<div><input type="text" name="default_margin" value="<?php echo $position->getDefaultMargin() ?>" /></div>
				<div><?php echo $position->getCreatedAt() ?></div>
				<div><?php echo $position->getUpdatedAt() ?></div>
				<div><input type="submit" value="Uložit" /></div>

				<?php //Here should be XSRF token ?>

			</form>
			<form method="post" action="index.php?page=position&action=delete">
				<input type="hidden" name="id" value="<?php echo $position->getId() ?>" />
				<div><input type="submit" value="Smazat" onclick="return confirm('Opravdu smazat?');" /></div>
			</form>
		<?php } ?>
	</div>
	<div class="tr">
		<form method="post" action="index.php?page=position&action=insert" class="tr">
			<input type="text" name="title" value="" />
			<input type="text" name="default_margin" value="" />
			<input type="submit" value="Vložit" />
		</form>
	</div>
</div>
