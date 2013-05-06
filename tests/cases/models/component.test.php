<?php
/* Component Test cases generated on: 2013-05-06 04:58:29 : 1367809109*/
App::import('Model', 'Component');

class ComponentTestCase extends CakeTestCase {
	function startTest() {
		$this->Component =& ClassRegistry::init('Component');
	}

	function endTest() {
		unset($this->Component);
		ClassRegistry::flush();
	}

	function testInit() {

	}

	function testInitialize() {

	}

	function testStartup() {

	}

	function testBeforeRender() {

	}

	function testBeforeRedirect() {

	}

	function testShutdown() {

	}

	function testTriggerCallback() {

	}

}
