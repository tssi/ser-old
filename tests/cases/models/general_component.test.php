<?php
/* GeneralComponent Test cases generated on: 2013-05-06 05:07:41 : 1367809661*/
App::import('Model', 'GeneralComponent');

class GeneralComponentTestCase extends CakeTestCase {
	var $fixtures = array('app.general_component', 'app.grade_component', 'app.measurable', 'app.template_detail');

	function startTest() {
		$this->GeneralComponent =& ClassRegistry::init('GeneralComponent');
	}

	function endTest() {
		unset($this->GeneralComponent);
		ClassRegistry::flush();
	}

}
