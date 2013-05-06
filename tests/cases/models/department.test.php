<?php
/* Department Test cases generated on: 2013-05-06 05:07:41 : 1367809661*/
App::import('Model', 'Department');

class DepartmentTestCase extends CakeTestCase {
	var $fixtures = array('app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.level', 'app.section_affiliation');

	function startTest() {
		$this->Department =& ClassRegistry::init('Department');
	}

	function endTest() {
		unset($this->Department);
		ClassRegistry::flush();
	}

}
