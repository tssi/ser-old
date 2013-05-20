<?php
/* Classlists Test cases generated on: 2013-05-20 10:38:41 : 1369039121*/
App::import('Controller', 'Classlists');

class TestClasslistsController extends ClasslistsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ClasslistsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.classlist', 'app.student', 'app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.template', 'app.section_affiliation');

	function startTest() {
		$this->Classlists =& new TestClasslistsController();
		$this->Classlists->constructClasses();
	}

	function endTest() {
		unset($this->Classlists);
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
