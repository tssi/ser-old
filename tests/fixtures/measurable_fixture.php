<?php
/* Measurable Fixture generated on: 2013-05-06 05:07:43 : 1367809663 */
class MeasurableFixture extends CakeTestFixture {
	var $name = 'Measurable';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'recordbook_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 10),
		'general_component_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 7, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'header' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 8, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'order_index' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3),
		'items' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'base' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3),
		'ceil' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'floor' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'rule' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sigfig' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 3),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'recordbook_id' => 1,
			'general_component_id' => 'Lorem',
			'header' => 'Lorem ',
			'description' => 'Lorem ipsum dolor sit amet',
			'order_index' => 1,
			'items' => 1,
			'base' => 1,
			'ceil' => 1,
			'floor' => 1,
			'rule' => '',
			'sigfig' => 1
		),
	);
}
