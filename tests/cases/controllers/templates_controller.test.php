<?php
/* Templates Test cases generated on: 2013-05-06 05:08:09 : 1367809689*/
App::import('Controller', 'Templates');

class TestTemplatesController extends TemplatesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TemplatesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.template', 'app.subject', 'app.course', 'app.curriculum', 'app.department', 'app.level', 'app.section', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.section_affiliation');

	function startTest() {
		$this->Templates =& new TestTemplatesController();
		$this->Templates->constructClasses();
	}

	function endTest() {
		unset($this->Templates);
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
