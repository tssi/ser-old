<?php
/* Recordbook Test cases generated on: 2013-05-06 05:07:44 : 1367809664*/
App::import('Model', 'Recordbook');

class RecordbookTestCase extends CakeTestCase {
	var $fixtures = array('app.recordbook', 'app.section', 'app.subject', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail');

	function startTest() {
		$this->Recordbook =& ClassRegistry::init('Recordbook');
	}

	function endTest() {
		unset($this->Recordbook);
		ClassRegistry::flush();
	}

}
