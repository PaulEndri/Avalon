<?php
session_start();

spl_autoload_register(function ($input) {
	$currentPath = __DIR__;
	$segments    = explode("\\", trim($input, "\\"));
	$className   = array_pop($segments);
	$filePath    = implode(DIRECTORY_SEPARATOR, $segments);
	$fileName    = strtolower($currentPath . DIRECTORY_SEPARATOR . $filePath . DIRECTORY_SEPARATOR) . "{$className}.php";

	if (!file_exists($fileName)) {
		echo "{$fileName} could not be found";
		exit();
	}
	else {
		require_once($fileName);
	}
});

$configFile  = null;
$routesFile  = file_get_contents("routes.json");
$routes      = json_decode($routesFile, true);
$bootService = new \Avalon\Core\BootService\BootService($configFile);
$bootService->registerRoutes($routes);

$bootService->launchApp();


