<?php
declare(strict_types=1);

$menuItems = ['Pozice', 'Pracovníci'];

foreach ($menuItems as $item) { ?>
	<a href="" class="menu" style="display: inline-block; line-height: 2em; border: 1px solid black; padding: 1em; margin: 1em; text-decoration: none;"><?php echo $item?></a>
<?php
}

