<?php

use Caouecs\Gumby2\Breadcrumb;

class BreadcrumbTest extends Illuminate\Foundation\Testing\TestCase {

	public function testEmpty()
	{
		$this->assertEmpty(Breadcrumb::create()->show());
	}

	/**
	 * @depends testEmpty
	 */
	public function testElement()
	{
		$alert = Breadcrumb::create()->addElement("caouecs");

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
		$alert = Breadcrumb::primary("Hello")->close();

		$matcher = array(
			"tag" => "a",
			"class" => "switch close"
		);

		$this->assetTag($matcher, $alert->show());
	}

}