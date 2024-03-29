<?php
class TeachingLoad extends AppModel {
	var $name = 'TeachingLoad';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $virtualFields =  array('sy'=>'ROUND(TeachingLoad.esp)','sy_tb'=>"CONCAT(ROUND(TeachingLoad.esp),' - ',ROUND(TeachingLoad.esp)+1)");
	var $belongsTo = array(
		'Employee' => array(
			'className' => 'Profile.Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subject_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'section_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
