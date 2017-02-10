<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace View\Template;


abstract class TemplateGenerator
{
	protected $template = false;

	public function __construct($template, $dir = false) {
		if (empty($template)) {
			throw new \Exception('All Hail the FSM');
		}

		if ($dir === false) {
			$dir = \Config\Config::ASSET_DIR;
		}

		$fileName = $dir . '/' . $template . '.php';

		if (file_exists($fileName)) {
			$this->template = $fileName;
		}
		else {
			throw new \Exception('Yer a wizard \'Arry!');
		}
	}

	public function render($includes = array(), $variables = array()) {
		if (!is_array($includes) || !is_array($variables)) {
			throw new \BadMethodCallException('All parameters to render must be arrays');
		}

		foreach ($includes as $include) {
			require_once($include);
		}

		extract($variables);

		require_once($this->template);
	}
}