<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Core\Config;


class Generator
{
	private $fileName = false;

	public function __construct($fileName) {
		if (empty($fileName)) {
			throw new \Exception('UH OH BATMAN');
		}
		else {
			$this->fileName = $fileName;
		}
	}

	public function launch() {
		(new \View\Views\ConfigView)->render();
	}
}