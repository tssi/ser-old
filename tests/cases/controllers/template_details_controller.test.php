<?php
/* TemplateDetails Test cases generated on: 2013-05-06 05:08:09 : 1367809689*/
App::import('Controller', 'TemplateDetails');

class TestTemplateDetailsController extends TemplateDetailsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TemplateDetailsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.template_detail', 'app.template', 'app.subject', 'app.course', 'app.curriculum', 'app.department', 'app.level', 'app.section', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.section_affiliation');

	function startTest() {
		$this->TemplateDetails =& new TestTemplateDetailsController();
		$this->TemplateDetails->constructClasses();
	}

	function endTest() {
		unset($this->TemplateDetails);
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
