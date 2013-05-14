<?php
class MeasurablesController extends AppController {

	var $name = 'Measurables';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$measurables = $this->api($_GET);
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->Measurable->recursive = 2;
			$cond = array();
			if(!empty($this->data)){
				foreach($this->data['GeneralComponent'] as $field=>$value){
					$cond['GeneralComponent.'.$field]=$value;
				}
			}
			$measurables  = $this->Measurable->find('all',array('conditions'=>$cond,'limit'=>10));
		}else{
		$this->Measurable->recursive = 0;
		$this->set('measurables', $this->paginate());
		}
		if($this->Rest->isActive()||$this->RequestHandler->isAjax()){
			//Sanitize data
			if($this->Rest->isActive()){
				$this->set('data',$measurables);
			}else{				
				echo json_encode($measurables);
				exit;
			}
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid measurable', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('measurable', $this->Measurable->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Measurable->create();
			if ($this->Measurable->save($this->data)) {
				$this->Session->setFlash(__('The measurable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measurable could not be saved. Please, try again.', true));
			}
		}
		$recordbooks = $this->Measurable->Recordbook->find('list');
		$generalComponents = $this->Measurable->GeneralComponent->find('list');
		$this->set(compact('recordbooks', 'generalComponents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid measurable', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Measurable->save($this->data)) {
				$this->Session->setFlash(__('The measurable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measurable could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Measurable->read(null, $id);
		}
		$recordbooks = $this->Measurable->Recordbook->find('list');
		$generalComponents = $this->Measurable->GeneralComponent->find('list');
		$this->set(compact('recordbooks', 'generalComponents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for measurable', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Measurable->delete($id)) {
			$this->Session->setFlash(__('Measurable deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Measurable was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	protected function api($params){
		$schema = $this->Measurable->schema();
		//pr($schema);
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'Measurable.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'Measurable.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'Measurable.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(Measurable.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(Measurable.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['Measurable.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->Measurable->recursive = 1;
		return $this->Measurable->find('all',array('conditions'=>$conditions,'group'=>$group));
	}
}
