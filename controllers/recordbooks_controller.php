<?php
class RecordbooksController extends AppController {

	var $name = 'Recordbooks';

	function index(){
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$recordbooks = $this->api($_GET);
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->Recordbook->recursive = 1;
			$cond = array();
			if(!empty($this->data)){
				foreach($this->data['Recordbook'] as $field=>$value){
					$cond['Recordbook.'.$field]=$value;
				}
			}
			$recordbooks  = $this->Recordbook->find('all',array('conditions'=>$cond));
			//pr($recordbooks);exit();
		}else{
			$this->Recordbook->recursive = 0;
			$this->set('recordbooks', $this->paginate());
		}
		if($this->Rest->isActive()||$this->RequestHandler->isAjax()){
			//Sanitize data
			foreach($recordbooks as $index=>$data){
				$gradecomponents = array();
				foreach($data['GradeComponent'] as $component){
					$componentObj = array();
					foreach( $component as $field => $value){
						if(is_array($value)){
							$componentObj[$field] = $value;
						}else{
							$componentObj['GradeComponent'][$field] = $value;
							
						}
					}
					array_push($gradecomponents,$componentObj);
				}
				$recordbooks[$index]['GradeComponent'] = $gradecomponents;
			}
			if($this->Rest->isActive()){
				$this->set('data',$recordbooks);
			}else{				
				echo json_encode($recordbooks);
				exit;
			}
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid recordbook', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('recordbook', $this->Recordbook->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Recordbook->create();
			if ($this->Recordbook->save($this->data)) {
				$this->Session->setFlash(__('The recordbook has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recordbook could not be saved. Please, try again.', true));
			}
		}
		$sections = $this->Recordbook->Section->find('list');
		$subjects = $this->Recordbook->Subject->find('list');
		$this->set(compact('sections', 'subjects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid recordbook', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Recordbook->save($this->data)) {
				$this->Session->setFlash(__('The recordbook has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recordbook could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Recordbook->read(null, $id);
		}
		$sections = $this->Recordbook->Section->find('list');
		$subjects = $this->Recordbook->Subject->find('list');
		$this->set(compact('sections', 'subjects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for recordbook', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Recordbook->delete($id)) {
			$this->Session->setFlash(__('Recordbook deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Recordbook was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	protected function api($params){
		$schema = $this->Recordbook->schema();
		//pr($schema);
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'Recordbook.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'Recordbook.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'Recordbook.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(Recordbook.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(Recordbook.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['Recordbook.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->Recordbook->recursive = 2;
		return $this->Recordbook->find('all',array('conditions'=>$conditions,'group'=>$group));
	}
}
