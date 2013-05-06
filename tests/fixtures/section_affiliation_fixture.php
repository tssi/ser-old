<?php
/* SectionAffiliation Fixture generated on: 2013-05-06 05:07:44 : 1367809664 */
class SectionAffiliationFixture extends CakeTestFixture {
	var $name = 'SectionAffiliation';

	var $fields = array(
		'id' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 36, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'section_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 4),
		'curriculum_id' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 6, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'esp' => array('type' => 'float', 'null' => true, 'default' => NULL, 'length' => '6,2'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => '51871e80-921c-4d3d-90a6-49d246278abb',
			'section_id' => 1,
			'curriculum_id' => 'Lore',
			'esp' => 1,
			'created' => '2013-05-06 05:07:44',
			'modified' => '2013-05-06 05:07:44'
		),
	);
}
