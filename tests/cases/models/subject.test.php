<?php
/* Subject Test cases generated on: 2013-05-06 05:07:46 : 1367809666*/
App::import('Model', 'Subject');

class SubjectTestCase extends CakeTestCase {
	var $fixtures = array('app.subject', 'app.course', 'app.curriculum', 'app.department', 'app.level', 'app.section', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.section_affiliation', 'app.template');

	function startTest() {
		$this->Subject =& ClassRegistry::init('Subject');
	}

	function endTest() {
		unset($this->Subject);
		ClassRegistry::flush();
	}

}
