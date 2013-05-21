<?php
class Recordbook extends AppModel {
	var $name = 'Recordbook';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $virtualFields =  array('sy'=>'ROUND(Recordbook.esp)','sy_tb'=>"CONCAT(ROUND(Recordbook.esp),'-',ROUND(Recordbook.esp)+1)");
	var $belongsTo = array(
		'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'section_id',
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
		)
	);

	var $hasMany = array(
		'GradeComponent' => array(
			'className' => 'GradeComponent',
			'foreignKey' => 'recordbook_id',
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
		'Measurable' => array(
			'className' => 'Measurable',
			'foreignKey' => 'recordbook_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'Measurable.order_index',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
