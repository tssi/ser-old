<?php
/* Classlist Test cases generated on: 2013-05-20 06:23:04 : 1369023784*/
App::import('Model', 'Classlist');

class ClasslistTestCase extends CakeTestCase {
	var $fixtures = array('app.classlist', 'app.student', 'app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.template', 'app.section_affiliation');

	function startTest() {
		$this->Classlist =& ClassRegistry::init('Classlist');
	}

	function endTest() {
		unset($this->Classlist);
		ClassRegistry::flush();
	}

}
