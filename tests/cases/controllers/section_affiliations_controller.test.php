<?php
/* SectionAffiliations Test cases generated on: 2013-05-06 05:08:09 : 1367809689*/
App::import('Controller', 'SectionAffiliations');

class TestSectionAffiliationsController extends SectionAffiliationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SectionAffiliationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.section_affiliation', 'app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.template');

	function startTest() {
		$this->SectionAffiliations =& new TestSectionAffiliationsController();
		$this->SectionAffiliations->constructClasses();
	}

	function endTest() {
		unset($this->SectionAffiliations);
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
