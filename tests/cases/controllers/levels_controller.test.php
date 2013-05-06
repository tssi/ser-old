<?php
/* Levels Test cases generated on: 2013-05-06 05:08:09 : 1367809689*/
App::import('Controller', 'Levels');

class TestLevelsController extends LevelsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class LevelsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.recordbook', 'app.section', 'app.section_affiliation', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.template');

	function startTest() {
		$this->Levels =& new TestLevelsController();
		$this->Levels->constructClasses();
	}

	function endTest() {
		unset($this->Levels);
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
