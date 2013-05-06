<?php
class TemplateDetail extends AppModel {
	var $name = 'TemplateDetail';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Template' => array(
			'className' => 'Template',
			'foreignKey' => 'template_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'GeneralComponent' => array(
			'className' => 'GeneralComponent',
			'foreignKey' => 'general_component_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
