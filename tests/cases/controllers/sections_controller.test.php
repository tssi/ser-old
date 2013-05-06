<?php
/* Sections Test cases generated on: 2013-05-06 05:08:09 : 1367809689*/
App::import('Controller', 'Sections');

class TestSectionsController extends SectionsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SectionsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.template', 'app.section_affiliation');

	function startTest() {
		$this->Sections =& new TestSectionsController();
		$this->Sections->constructClasses();
	}

	function endTest() {
		unset($this->Sections);
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
