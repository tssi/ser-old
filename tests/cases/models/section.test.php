<?php
/* Section Test cases generated on: 2013-05-06 05:07:45 : 1367809665*/
App::import('Model', 'Section');

class SectionTestCase extends CakeTestCase {
	var $fixtures = array('app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.section_affiliation', 'app.template', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail');

	function startTest() {
		$this->Section =& ClassRegistry::init('Section');
	}

	function endTest() {
		unset($this->Section);
		ClassRegistry::flush();
	}

}
