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
	public function get_rawscores($section,$subject,$esp){
		$joins = array(
						array(
						'table' => 'measurables',
						'alias' => 'MeasurableItem',
						'type' => 'inner',
						'conditions' => array('MeasurableItem.id = Rawscore.measurable_id')
						),
						array(
						'table' => 'recordbooks',
						'alias' => 'Recordbook',
						'type' => 'inner',
						'conditions' => array('Recordbook.id = MeasurableItem.recordbook_id')
						),
					);
		$conditions = array('Recordbook.esp'=>$esp,'Recordbook.section_id'=>$section,'Recordbook.subject_id'=>$subject);
		return $this->find('all',array('joins'=>$joins,'conditions'=>$conditions));
	}
}
