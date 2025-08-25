<?php

spl_autoload_register(function ($class) {
	$base_dir = __DIR__ . '/../';
	$file = $base_dir . str_replace('\\', '/', $class) . '.php';
	echo $file . PHP_EOL;
	if (file_exists($file)) {
		require_once $file;
	}
});