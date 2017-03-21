<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Avalon\View\Template;

abstract class Template extends Generator implements Base
{
	private $forceAll = false;
	private $assets = [];

	public function load() {
		$vars   = func_get_args();
		$assets = $this->getAssets();

		$this->render($assets, $vars);
	}

	public function setAssets() {
		$args = func_get_args();

		if (is_array($args)) {
			foreach ($args as $arg) {
				$this->setAsset($arg);
			}
		}
		else {
			$this->setAsset($args);
		}
	}

	public function setAsset($arg) {
		if (is_array($arg)) {
			$this->setAssets($arg);
		}
		else {
			$this->assets[] = $arg;
		}
	}

	public function clearAssets() {
		$this->assets = [];
	}

	public function getAssets() {
		if (self::DEFAULT_ASSETS) {
			$defaultAssets = $GLOBALS['boot']->config->loadDefaultAssets();

			return array_merge($this->assets, $defaultAssets);
		}

		return $this->assets;
	}

	public function validate() {
		if ($this->template === false) {
			throw new \Exception('template is missing.');
		}

		if ($this->forceAll) {
			if (empty($this->dependencies)) {
				throw new \Exception('template is missing required dependencies');
			}
		}

		return true;
	}

	public function setAssetDir($dir) {
		$this->assetDir = $dir;
	}

	public function getAssetDir() {
		return $this->assetDir;
	}
}