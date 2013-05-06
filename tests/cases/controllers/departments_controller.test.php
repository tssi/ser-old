<?php
/* Departments Test cases generated on: 2013-05-06 05:08:08 : 1367809688*/
App::import('Controller', 'Departments');

class TestDepartmentsController extends DepartmentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class DepartmentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.recordbook', 'app.section', 'app.level', 'app.template', 'app.template_detail', 'app.general_component', 'app.grade_component', 'app.measurable', 'app.section_affiliation');

	function startTest() {
		$this->Departments =& new TestDepartmentsController();
		$this->Departments->constructClasses();
	}

	function endTest() {
		unset($this->Departments);
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
