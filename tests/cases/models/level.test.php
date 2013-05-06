<?php
/* Level Test cases generated on: 2013-05-06 05:07:42 : 1367809662*/
App::import('Model', 'Level');

class LevelTestCase extends CakeTestCase {
	var $fixtures = array('app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.section_affiliation', 'app.section', 'app.template');

	function startTest() {
		$this->Level =& ClassRegistry::init('Level');
	}

	function endTest() {
		unset($this->Level);
		ClassRegistry::flush();
	}

}
