<?php
class Unit extends inventoryAppModel {
	var $name = 'Unit';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Product' => array(
			'className' => 'Inventory.Product',
			'foreignKey' => 'unit_id',
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
