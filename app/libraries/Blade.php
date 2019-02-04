<?php

use Philo\Blade\Blade as CoreBlade;

class Blade extends CoreBlade
{

	function __construct()
	{
		$this->views = __DIR__."/../views";
		$this->cache = __DIR__."/../cache";

		parent::__construct($this->views, $this->cache);
	}

	function stream($template, array $values = [])
	{
		return parent::view()->make($template, $values)->render();
	}

	public function distribute($key, $value)
	{
		$this->view()->share($key, $value);
	}

}
