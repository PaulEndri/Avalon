<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Avalon\View\Template;


abstract class Generator
{
	protected $template = false;
	protected $assetDir = __DIR__;

	public function __construct($template, $dir = false) {
		if (empty($template)) {
			throw new \Exception('All Hail the FSM');
		}

		if ($dir === false) {
			$config = $GLOBALS['config'];
			$dir    = $config->loaded['DIR'];
		}

		$this->assetDir = $dir;
		$fileName       = $dir . '/' . $template . '.php';

		if (file_exists($fileName)) {
			$this->template = $fileName;
		}
		else {
			throw new \Exception('Yer a wizard \'Arry!');
		}
	}

	public function render($assets = array(), $variables = array()) {
		if (!is_array($assets) || !is_array($variables)) {
			throw new \BadMethodCallException('All parameters to render must be arrays');
		}

		foreach ($assets as $asset) {
			require_once($asset);
		}

		extract($variables);

		require_once($this->template);
	}
}