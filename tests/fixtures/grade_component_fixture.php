<?php
/* GradeComponent Fixture generated on: 2013-05-06 05:07:42 : 1367809662 */
class GradeComponentFixture extends CakeTestFixture {
	var $name = 'GradeComponent';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'recordbook_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'general_component_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 7, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'order_index' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '5,1'),
		'under' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 14, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'percentage' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '5,2'),
		'ceil' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'floor' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'rule' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'recordbook_id' => 1,
			'general_component_id' => 'Lorem',
			'order_index' => 1,
			'under' => 'Lorem ipsum ',
			'percentage' => 1,
			'ceil' => 1,
			'floor' => 1,
			'rule' => ''
		),
	);
}
