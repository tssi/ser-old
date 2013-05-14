<?php
/* TeachingLoad Test cases generated on: 2013-05-14 08:15:31 : 1368512131*/
App::import('Model', 'TeachingLoad');

class TeachingLoadTestCase extends CakeTestCase {
	var $fixtures = array('app.teaching_load', 'app.employee', 'app.subject', 'app.course', 'app.curriculum', 'app.department', 'app.level', 'app.section', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.template', 'app.section_affiliation');

	function startTest() {
		$this->TeachingLoad =& ClassRegistry::init('TeachingLoad');
	}

	function endTest() {
		unset($this->TeachingLoad);
		ClassRegistry::flush();
	}

}
