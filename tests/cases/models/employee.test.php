<?php
/* Employee Test cases generated on: 2013-06-03 10:05:52 : 1370246752*/
App::import('Model', 'Employee');

class EmployeeTestCase extends CakeTestCase {
	var $fixtures = array('app.employee');

	function startTest() {
		$this->Employee =& ClassRegistry::init('Employee');
	}

	function endTest() {
		unset($this->Employee);
		ClassRegistry::flush();
	}

}
