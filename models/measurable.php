<?php
class Measurable extends AppModel {
	var $name = 'Measurable';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Recordbook' => array(
			'className' => 'Recordbook',
			'foreignKey' => 'recordbook_id',
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

	var $hasMany = array(
		'Rawscore' => array(
			'className' => 'Rawscore',
			'foreignKey' => 'measurable_id',
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
