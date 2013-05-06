<?php
/* SectionAffiliation Test cases generated on: 2013-05-06 05:07:45 : 1367809665*/
App::import('Model', 'SectionAffiliation');

class SectionAffiliationTestCase extends CakeTestCase {
	var $fixtures = array('app.section_affiliation', 'app.section', 'app.curriculum', 'app.department', 'app.level', 'app.course', 'app.subject', 'app.template');

	function startTest() {
		$this->SectionAffiliation =& ClassRegistry::init('SectionAffiliation');
	}

	function endTest() {
		unset($this->SectionAffiliation);
		ClassRegistry::flush();
	}

}
