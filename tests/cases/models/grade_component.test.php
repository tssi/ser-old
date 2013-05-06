<?php
/* GradeComponent Test cases generated on: 2013-05-06 05:07:42 : 1367809662*/
App::import('Model', 'GradeComponent');

class GradeComponentTestCase extends CakeTestCase {
	var $fixtures = array('app.grade_component', 'app.recordbook', 'app.general_component', 'app.measurable', 'app.template_detail');

	function startTest() {
		$this->GradeComponent =& ClassRegistry::init('GradeComponent');
	}

	function endTest() {
		unset($this->GradeComponent);
		ClassRegistry::flush();
	}

}
