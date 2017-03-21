<?php
/**
 * Created by Juan S (aka Paul Endri)
 */

namespace Avalon\View\Template;


interface Base
{
	const DEFAULT_ASSETS = true;

	public function render($includes, $variables);

	public function load();

	public function setAssets();

	public function setAsset($arg);

	public function setAssetDir($dir);

	public function validate();

	public function getAssets();
}