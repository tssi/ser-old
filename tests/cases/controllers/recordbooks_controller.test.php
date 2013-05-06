<?php
/* Recordbooks Test cases generated on: 2013-05-06 05:08:09 : 1367809689*/
App::import('Controller', 'Recordbooks');

class TestRecordbooksController extends RecordbooksController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RecordbooksControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.recordbook', 'app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.template', 'app.template_detail', 'app.general_component', 'app.grade_component', 'app.measurable', 'app.section_affiliation');

	function startTest() {
		$this->Recordbooks =& new TestRecordbooksController();
		$this->Recordbooks->constructClasses();
	}

	function endTest() {
		unset($this->Recordbooks);
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
