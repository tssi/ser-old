<?php
/* Measurable Test cases generated on: 2013-05-06 05:07:43 : 1367809663*/
App::import('Model', 'Measurable');

class MeasurableTestCase extends CakeTestCase {
	var $fixtures = array('app.measurable', 'app.recordbook', 'app.general_component', 'app.grade_component', 'app.template_detail');

	function startTest() {
		$this->Measurable =& ClassRegistry::init('Measurable');
	}

	function endTest() {
		unset($this->Measurable);
		ClassRegistry::flush();
	}

}
