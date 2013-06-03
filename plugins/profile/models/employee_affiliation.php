<?php
class EmployeeAffiliation extends AppModel {
	var $name = 'EmployeeAffiliation';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Employee' => array(
			'className' => 'Profile.Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
