<?php

use Caouecs\Gumby2\Badge;

class BadgeTest extends Illuminate\Foundation\Testing\TestCase {

	public function testShow()
	{
		$alert = Badge::primary("Hello");

		$matcher = array(
			"tag" => "span",
			"class" => "primary badge",
			"content" => "Hello"
		);

		$this->assetTag($matcher, $alert->show());
	}

}