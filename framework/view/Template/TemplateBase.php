<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 2/9/2017
 * Time: 8:20 PM
 */

namespace View\Template;


interface TemplateBase
{
	public function render($includes, $variables);

	public function load();

	public function setDependencies();

	public function setDependency($arg);

	public function setDependencyDir($dir);

	public function validate();

	public function generate($templateName);
}