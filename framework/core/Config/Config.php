<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Config;

class Config
{

	const     TEMPLATE_DEPENDENCIES = false;
	const  ASSET_DIR = false;
	protected $fileName = false;
	private $defaultFileName = 'config.inc.php';

	public function __construct($fileName) {
		if (empty($fileName)) {
			$fileName = __DIR__ . '/' . $this->defaultFileName;
		}

		$this->fileName = $fileName;
	}

	public function load($forceWrite = false) {
		$configExists = file_exists($this->fileName);

		if ($forceWrite || $configExists === false) {
			$this->create();
		}
		else {
			require_once($this->fileName);
		}
	}

	private function create() {
		//	$generator = new \Config\Generator($this->fileName);

		//	$generator->launch();
	}
}