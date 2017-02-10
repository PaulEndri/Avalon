<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 2/9/2017
 * Time: 7:34 PM
 */

namespace View\Template;

abstract class Template extends TemplateGenerator implements TemplateBase
{
	const DEFAULT_ASSETS = true;
	private $forceAll = false;
	private $dependencies = [];

	public function load() {
		//	$args = func_get_args();
	}

	public function setDependencies() {
		$args = func_get_args();

		if (is_array($args)) {
			foreach ($args as $arg) {
				$this->setDependency($arg);
			}
		}
		else {
			$this->setDependency($args);
		}
	}

	public function setDependency($arg) {
		if (is_array($arg)) {
			$this->setDependencies($arg);
		}
		else {
			$this->dependencies[] = $arg;
		}
	}

	public function clearDependencies() {
		$this->dependencies = [];
	}

	public function validate() {
		if ($this->template === false) {
			throw new \Exception('Template is missing.');
		}

		if ($this->forceAll) {
			if (empty($this->dependencies)) {
				throw new \Exception('Template is missing required dependencies');
			}
		}

		return true;
	}
	/*
		public function setDependencyDir($dir) {
			if(empty($dir)) {
				$dir = $this->config->
			}
			else {
				$this->dependancy
			}
		}
	*/
}