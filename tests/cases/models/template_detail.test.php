<?php
/* TemplateDetail Test cases generated on: 2013-05-06 05:07:47 : 1367809667*/
App::import('Model', 'TemplateDetail');

class TemplateDetailTestCase extends CakeTestCase {
	var $fixtures = array('app.template_detail', 'app.template', 'app.general_component', 'app.grade_component', 'app.recordbook', 'app.section', 'app.level', 'app.department', 'app.curriculum', 'app.course', 'app.subject', 'app.section_affiliation', 'app.measurable');

	function startTest() {
		$this->TemplateDetail =& ClassRegistry::init('TemplateDetail');
	}

	function endTest() {
		unset($this->TemplateDetail);
		ClassRegistry::flush();
	}

}
