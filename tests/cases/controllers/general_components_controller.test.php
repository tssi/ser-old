<?php
/* GeneralComponents Test cases generated on: 2013-05-06 05:08:08 : 1367809688*/
App::import('Controller', 'GeneralComponents');

class TestGeneralComponentsController extends GeneralComponentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GeneralComponentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.general_component', 'app.grade_component', 'app.recordbook', 'app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.template', 'app.template_detail', 'app.section_affiliation', 'app.measurable');

	function startTest() {
		$this->GeneralComponents =& new TestGeneralComponentsController();
		$this->GeneralComponents->constructClasses();
	}

	function endTest() {
		unset($this->GeneralComponents);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
