<?php
class Template extends AppModel {
	var $name = 'Template';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $virtualFields =  array('sy'=>'ROUND(Template.esp)');
	var $belongsTo = array(
		'Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'subject_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'TemplateDetail' => array(
			'className' => 'TemplateDetail',
			'foreignKey' => 'template_id',
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
