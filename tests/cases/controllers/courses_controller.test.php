<?php
/* Courses Test cases generated on: 2013-05-06 05:08:08 : 1367809688*/
App::import('Controller', 'Courses');

class TestCoursesController extends CoursesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CoursesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.course', 'app.curriculum', 'app.department', 'app.level', 'app.section', 'app.recordbook', 'app.subject', 'app.template', 'app.template_detail', 'app.general_component', 'app.grade_component', 'app.measurable', 'app.section_affiliation');

	function startTest() {
		$this->Courses =& new TestCoursesController();
		$this->Courses->constructClasses();
	}

	function endTest() {
		unset($this->Courses);
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
