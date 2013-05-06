<?php
class Counter extends inventoryAppModel {
	var $name = 'Counter';
	var $actsAs = array('Increment'=>array('incrementFieldName'=>'value'));
	
}
