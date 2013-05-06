<?php
/* Measurables Test cases generated on: 2013-05-06 05:08:09 : 1367809689*/
App::import('Controller', 'Measurables');

class TestMeasurablesController extends MeasurablesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MeasurablesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.measurable', 'app.recordbook', 'app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.template', 'app.template_detail', 'app.general_component', 'app.grade_component', 'app.section_affiliation');

	function startTest() {
		$this->Measurables =& new TestMeasurablesController();
		$this->Measurables->constructClasses();
	}

	function endTest() {
		unset($this->Measurables);
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
