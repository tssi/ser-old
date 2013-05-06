<?php
/* Curriculums Test cases generated on: 2013-05-06 05:08:08 : 1367809688*/
App::import('Controller', 'Curriculums');

class TestCurriculumsController extends CurriculumsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CurriculumsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.curriculum', 'app.department', 'app.level', 'app.course', 'app.subject', 'app.recordbook', 'app.section', 'app.section_affiliation', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.template');

	function startTest() {
		$this->Curriculums =& new TestCurriculumsController();
		$this->Curriculums->constructClasses();
	}

	function endTest() {
		unset($this->Curriculums);
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
