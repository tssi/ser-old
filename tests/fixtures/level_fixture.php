<?php
/* Level Fixture generated on: 2013-05-06 05:07:42 : 1367809662 */
class LevelFixture extends CakeTestFixture {
	var $name = 'Level';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 2, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'department_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 11, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'alias' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 5, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'order_index' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'esp' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '6,2'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => '',
			'department_id' => '',
			'name' => 'Lorem ips',
			'alias' => 'Lor',
			'order_index' => 1,
			'esp' => 1,
			'created' => '2013-05-06 05:07:42',
			'modified' => '2013-05-06 05:07:42'
		),
	);
}
