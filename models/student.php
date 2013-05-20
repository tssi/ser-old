<?php
class Student extends AppModel {
	var $name = 'Student';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Classlist' => array(
			'className' => 'Classlist',
			'foreignKey' => 'student_id',
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
