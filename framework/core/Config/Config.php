<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Core\Config;

class Config
{

	protected $fileName = false;
	private $defaultFileName = 'config.inc.php';
	protected $loaded = [];

	public function __construct($fileName) {
		if (empty($fileName)) {
			$fileName = __DIR__ . '/' . $this->defaultFileName;
		}

		$this->fileName = $fileName;

		return $this;
	}

	public function load($forceWrite = false) {
		$configExists = file_exists($this->fileName);

		if ($forceWrite || $configExists === false) {
			$this->create();
		}
		else {
			$this->loaded = parse_ini_file($this->fileName);
		}

		$GLOBALS['config'] = $this;

		return $this;
	}

	private function create() {
		$generator = new Generator($this->fileName);

		$generator->launch();
	}

	public function loadDefaultAssets() {
		$asset_dir = $this->loaded['asset_dir'];
		$assets    = [];

		if (empty($asset_dir)) {
			return [];
		}

		$path  = realpath($asset_dir);
		$files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));

		foreach ($files as $name => $object) {
			$assets[] = $name;
		}

		return $assets;
	}
}