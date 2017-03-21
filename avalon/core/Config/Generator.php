<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Avalon\Core\Config;


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
		(new \Avalon\View\Views\ConfigView)->render();
	}
}