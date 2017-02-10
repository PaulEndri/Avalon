<?php
/**
 * Created by Juan S (aka Paul Endri)
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

	public function getDepencies();
}