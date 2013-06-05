<?php
class Employee extends profileAppModel {
	var $name = 'Employee';
	var $virtualFields = array('full_name'=>'CONCAT(Employee.last_name,", ",Employee.first_name," ",Employee.middle_name)');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'EmployeeAffiliation' => array(
			'className' => 'Profile.EmployeeAffiliation',
			'foreignKey' => 'employee_id',
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
		'EmployeeContact' => array(
			'className' => 'Profile.EmployeeContact',
			'foreignKey' => 'employee_id',
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
		'TeachingLoad' => array(
			'className' => 'Profile.TeachingLoad',
			'foreignKey' => 'employee_id',
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
