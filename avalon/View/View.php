<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Avalon\View;

abstract class View
{
	protected $template = '';
	protected $controller = '';
	protected $file = '';

	private $loadedTemplate = false;

	public function __construct($dir = false) {
		if (empty($this->template) || empty($this->controller) || empty($this->file)) {
			throw new \Exception('We\'re all mad here!');
		}

		$template             = '\\template\\templates\\' . $this->template;
		$this->loadedTemplate = new $template($this->file, $dir);
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

		// (new \Controller\Controller($controller))->allow();
	}

	public function render() {
		if ($this->loadedTemplate === false) {
			throw new \Exception('Woah there Cowboy');
		}

		$this->loadedTemplate->load();
	}
}