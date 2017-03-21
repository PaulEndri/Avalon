<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Avalon\Core\BootService;

class BootService {
	public static $config = null;
	public static $routes = [];

	public function __construct($configFileName) {
		$config = new \Avalon\Core\Config\Config($configFileName);

		$config->load();

		self::$config = $config;

		return $this;
	}

	public function registerRoutes($routes = array()) {
		$routeController = new \Avalon\Core\Route\RouteController();
		self::$routes    = $routeController::loadRoutes($routeController);

		return $this;
	}

	public function launchApp() {

	}
}