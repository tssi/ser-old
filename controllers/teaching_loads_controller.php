<?php
class TeachingLoadsController extends AppController {

	var $name = 'TeachingLoads';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$teaching_loads = $this->api($_GET);
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->TeachingLoad->recursive = 2;
			$cond = array();
			if(!empty($this->data)){
				foreach($this->data['TeachingLoad'] as $field=>$value){
					$cond['TeachingLoad.'.$field]=$value;
				}
			}
			$teaching_loads  = $this->TeachingLoad->find('all',array('conditions'=>$cond));
		}else{
		$this->TeachingLoad->recursive = 0;
		$this->set('teachingLoads', $this->paginate());
		}
		if($this->Rest->isActive()||$this->RequestHandler->isAjax()){
			//Sanitize data
			if($this->Rest->isActive()){
				$this->set('data',$teaching_loads);
			}else{				
				echo json_encode($teaching_loads);
				exit;
			}
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid teaching load', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('teachingLoad', $this->TeachingLoad->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TeachingLoad->create();
			if ($this->TeachingLoad->save($this->data)) {
				$this->Session->setFlash(__('The teaching load has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teaching load could not be saved. Please, try again.', true));
			}
		}
		$employees = $this->TeachingLoad->Employee->find('list');
		$subjects = $this->TeachingLoad->Subject->find('list');
		$sections = $this->TeachingLoad->Section->find('list');
		$this->set(compact('employees', 'subjects', 'sections'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid teaching load', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->TeachingLoad->save($this->data)) {
				$this->Session->setFlash(__('The teaching load has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The teaching load could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TeachingLoad->read(null, $id);
		}
		$employees = $this->TeachingLoad->Employee->find('list');
		$subjects = $this->TeachingLoad->Subject->find('list');
		$sections = $this->TeachingLoad->Section->find('list');
		$this->set(compact('employees', 'subjects', 'sections'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for teaching load', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TeachingLoad->delete($id)) {
			$this->Session->setFlash(__('Teaching load deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Teaching load was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	protected function api($params){
		$schema = $this->TeachingLoad->schema();
		//pr($schema);
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'TeachingLoad.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'TeachingLoad.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'TeachingLoad.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(TeachingLoad.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(TeachingLoad.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['TeachingLoad.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->TeachingLoad->recursive = 1;
		return $this->TeachingLoad->find('all',array('conditions'=>$conditions,'group'=>$group));
	}
}
