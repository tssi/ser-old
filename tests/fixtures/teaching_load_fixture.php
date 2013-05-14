<?php
/* TeachingLoad Fixture generated on: 2013-05-14 08:15:31 : 1368512131 */
class TeachingLoadFixture extends CakeTestFixture {
	var $name = 'TeachingLoad';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'employee_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 8),
		'subject_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'section_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'class_type' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'esp' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '6,2'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'employee_id' => 1,
			'subject_id' => 'Lorem ',
			'section_id' => 1,
			'class_type' => 'Lorem ipsum dolor sit ame',
			'esp' => 1
		),
	);
}
