<?php
/* Curriculum Fixture generated on: 2013-05-06 05:07:40 : 1367809660 */
class CurriculumFixture extends CakeTestFixture {
	var $name = 'Curriculum';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 6, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'department_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'esp' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '6,2'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 'Lore',
			'department_id' => '',
			'name' => 'Lorem ipsum dolor sit amet',
			'esp' => 1,
			'created' => '2013-05-06 05:07:40',
			'modified' => '2013-05-06 05:07:40'
		),
	);
}
