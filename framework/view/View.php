<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace View;

abstract class View
{
	private $template = '';
	private $controller = '';
	private $file = '';
	private $loadedTemplate = false;

	public function __construct() {
		if (empty($this->template) || empty($this->controller) || empty($this->file)) {
			throw new \Exception('We\'re all mad here!');
		}

		$template             = '\\Template\\Templates\\' . $this->template;
		$this->loadedTemplate = new $template($this->file);
	}

	public function loadControllers($controllers = array()) {
		if (!is_array($controllers) && !empty($controllers)) {
			$controllers = [$controllers];
		}
		elseif (empty($controllers)) {
			throw new \Exception('PARKER, WHERE\'S THAT OP-ED OF SPIDERMAN?!');
		}

		foreach ($controllers as $controller) {
			$this->loadController($controller);
		}
	}

	private function loadController($controller) {
		$class = '\\Controller\\Controllers\\' . $controller;

		if (!class_exists($class)) {
			throw new \Exception('WE NEED PICTURES OF THAT NO-GOOD SPIDERMAN!');
		}

		(new \Controller\Controller($controller))->allow();
	}
}