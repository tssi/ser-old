<?php
/* Template Test cases generated on: 2013-05-06 10:28:13 : 1367828893*/
App::import('Model', 'Template');

class TemplateTestCase extends CakeTestCase {
	var $fixtures = array('app.template', 'app.subject', 'app.course', 'app.curriculum', 'app.department', 'app.level', 'app.section', 'app.recordbook', 'app.grade_component', 'app.general_component', 'app.measurable', 'app.template_detail', 'app.section_affiliation');

	function startTest() {
		$this->Template =& ClassRegistry::init('Template');
	}

	function endTest() {
		unset($this->Template);
		ClassRegistry::flush();
	}

}
