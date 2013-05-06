<?php
class ProductType extends inventoryAppModel {
	var $name = 'ProductType';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'Product' => array(
			'className' => 'Inventory.Product',
			'foreignKey' => 'product_type_id',
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
