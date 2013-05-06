<?php
/* Subject Fixture generated on: 2013-05-06 05:07:46 : 1367809666 */
class SubjectFixture extends CakeTestFixture {
	var $name = 'Subject';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 8, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nomenclature' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 80, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'weight' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '4,2'),
		'scope' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 1, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'limit' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 'Lorem ',
			'nomenclature' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'weight' => 1,
			'scope' => 'Lorem ipsum dolor sit ame',
			'limit' => 'Lorem ipsum dolor sit amet',
			'created' => '2013-05-06 05:07:46',
			'modified' => '2013-05-06 05:07:46'
		),
	);
}
