<?php
/* Curriculum Test cases generated on: 2013-05-06 05:07:40 : 1367809660*/
App::import('Model', 'Curriculum');

class CurriculumTestCase extends CakeTestCase {
	var $fixtures = array('app.curriculum', 'app.department', 'app.course', 'app.subject', 'app.level', 'app.section_affiliation');

	function startTest() {
		$this->Curriculum =& ClassRegistry::init('Curriculum');
	}

	function endTest() {
		unset($this->Curriculum);
		ClassRegistry::flush();
	}

}
