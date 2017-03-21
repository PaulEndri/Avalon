<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Core\BootService;

class BootService {
	public static $config = null;
	public static $routes = [];

	public function __construct($configFileName) {
		$config = new \Core\Config\Config($configFileName);

		$config->load();

		self::$config = $config;

		return $this;
	}

	public function registerRoutes() {
		$routeService = new RouteService();
		self::$routes = $routeService::loadRoutes();

		return $this;
	}
}