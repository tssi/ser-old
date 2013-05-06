<?php
/* GradeComponents Test cases generated on: 2013-05-06 05:08:08 : 1367809688*/
App::import('Controller', 'GradeComponents');

class TestGradeComponentsController extends GradeComponentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GradeComponentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.grade_component', 'app.recordbook', 'app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.template', 'app.template_detail', 'app.general_component', 'app.measurable', 'app.section_affiliation');

	function startTest() {
		$this->GradeComponents =& new TestGradeComponentsController();
		$this->GradeComponents->constructClasses();
	}

	function endTest() {
		unset($this->GradeComponents);
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
