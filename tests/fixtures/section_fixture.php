<?php
/* Section Fixture generated on: 2013-05-06 05:07:45 : 1367809665 */
class SectionFixture extends CakeTestFixture {
	var $name = 'Section';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 4, 'key' => 'primary'),
		'level_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'order_index' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'status' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'level_id' => '',
			'name' => 'Lorem ipsum dolor sit amet',
			'alias' => 'Lorem ip',
			'order_index' => 1,
			'status' => 'Lorem ipsum dolor sit ame',
			'created' => '2013-05-06 05:07:45',
			'modified' => '2013-05-06 05:07:45'
		),
	);
}
