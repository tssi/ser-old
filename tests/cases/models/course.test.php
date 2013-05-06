<?php
/* Course Test cases generated on: 2013-05-06 05:07:39 : 1367809659*/
App::import('Model', 'Course');

class CourseTestCase extends CakeTestCase {
	var $fixtures = array('app.course', 'app.curriculum', 'app.subject', 'app.level');

	function startTest() {
		$this->Course =& ClassRegistry::init('Course');
	}

	function endTest() {
		unset($this->Course);
		ClassRegistry::flush();
	}

}
