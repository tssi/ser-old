<?php
/* TeachingLoads Test cases generated on: 2013-05-14 08:16:29 : 1368512189*/
App::import('Controller', 'TeachingLoads');

class TestTeachingLoadsController extends TeachingLoadsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TeachingLoadsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.teaching_load', 'app.employee', 'app.subject', 'app.course', 'app.curriculum', 'app.department', 'app.level', 'app.section', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.template', 'app.section_affiliation');

	function startTest() {
		$this->TeachingLoads =& new TestTeachingLoadsController();
		$this->TeachingLoads->constructClasses();
	}

	function endTest() {
		unset($this->TeachingLoads);
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
