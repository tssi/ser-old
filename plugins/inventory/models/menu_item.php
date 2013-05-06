<?php
class MenuItem extends inventoryAppModel {
	var $name = 'MenuItem';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Unit' => array(
			'className' => 'Inventory.Unit',
			'foreignKey' => 'unit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
