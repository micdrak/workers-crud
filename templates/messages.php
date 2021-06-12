<?php
declare(strict_types=1);

$message = $_GET['message'] ?? '';

// TODO hide after timeout
if ($message === "success") {
	echo '<h1 style="color:green;">Uloženo.</h1>';
} else {
	echo '<h1 style="color:red">' . htmlspecialchars($message) . '</h1>';
}


