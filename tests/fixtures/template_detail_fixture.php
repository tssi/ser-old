<?php
/* TemplateDetail Fixture generated on: 2013-05-06 05:07:47 : 1367809667 */
class TemplateDetailFixture extends CakeTestFixture {
	var $name = 'TemplateDetail';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'template_id' => array('type' => 'integer', 'null' => true, 'default' => NULL),
		'general_component_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 7, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'order_index' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '5,1'),
		'percentage' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '5,2'),
		'under' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 7, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'template_id' => 1,
			'general_component_id' => 'Lorem',
			'order_index' => 1,
			'percentage' => 1,
			'under' => 'Lorem'
		),
	);
}
