
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
				<form method="post" action="index.php?page=position&action=save" class="tr">
					<input type="hidden" name="id" value="<?php echo $position->getId() ?>"/> <?php echo $position->getId() ?>
					<input type="text" name="title" value="<?php echo $position->getTitle() ?>"/>
					<input type="text" name="default_margin" value="<?php echo $position->getDefaultMargin() ?>"/>
					<span><?php echo $position->getCreatedAt() ?></span>
					<span><?php echo $position->getUpdatedAt() ?></span>
					<input type="submit" value="Uložit"/>

					<?php //Here should be XSRF token ?>
					<button onclick="">Smazat</button>
				</form>
			<?php } ?>
		</div>
		<div class="tr">
			<form method="post" action="index.php?page=position&action=insert" class="tr">
				<input type="text" name="title" value=""/>
				<input type="text" name="default_margin" value=""/>
				<span></span>
				<span></span>
				<input type="submit" value="Vložit"/>
			</form>
		</div>
	</div>
