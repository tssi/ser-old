<?php
class Rawscore extends AppModel {
	var $name = 'Rawscore';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'student_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Measurable' => array(
			'className' => 'Measurable',
			'foreignKey' => 'measurable_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
