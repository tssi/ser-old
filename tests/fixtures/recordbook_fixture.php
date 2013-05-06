<?php
/* Recordbook Fixture generated on: 2013-05-06 05:07:44 : 1367809664 */
class RecordbookFixture extends CakeTestFixture {
	var $name = 'Recordbook';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'section_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'subject_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 15, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'esp' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '6,2'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'section_id' => 1,
			'subject_id' => 'Lorem ipsum d',
			'esp' => 1
		),
	);
}
