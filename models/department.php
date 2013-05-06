<?php
class Department extends AppModel {
	var $name = 'Department';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Curriculum' => array(
			'className' => 'Curriculum',
			'foreignKey' => 'department_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Level' => array(
			'className' => 'Level',
			'foreignKey' => 'department_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
