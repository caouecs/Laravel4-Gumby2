<?php

use Caouecs\Gumby2\Alert;

class AlertTest extends Illuminate\Foundation\Testing\TestCase {

	public function testShow()
	{
		$alert = Alert::primary("Hello");

		$matcher = array(
			"tag" => "div",
			"class" => "primary alert",
			"content" => "Hello"
		);

		$this->assetTag($matcher, $alert->show());
	}

	/**
	 * @depends testShow
	 */
	public function testClose()
	{
		$alert = Alert::primary("Hello")->close();

		$matcher = array(
			"tag" => "a",
			"class" => "switch close"
		);

		$this->assetTag($matcher, $alert->show());
	}

}