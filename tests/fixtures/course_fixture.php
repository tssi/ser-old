<?php
/* Course Fixture generated on: 2013-05-06 05:07:39 : 1367809659 */
class CourseFixture extends CakeTestFixture {
	var $name = 'Course';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'curriculum_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 6, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'subject_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'level_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 2, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'weight_compute' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '4,2'),
		'weight_display' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '4,2'),
		'tree_index' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'order_index' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 2),
		'has_child' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'has_parent' => array('type' => 'boolean', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => '51871e7b-9e30-45f3-b6fb-490646278abb',
			'curriculum_id' => 'Lore',
			'subject_id' => 'Lorem ',
			'level_id' => '',
			'weight_compute' => 1,
			'weight_display' => 1,
			'tree_index' => 1,
			'order_index' => 1,
			'has_child' => 1,
			'has_parent' => 1
		),
	);
}
