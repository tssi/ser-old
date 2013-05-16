<?php
class GradeComponentsController extends AppController {

	var $name = 'GradeComponents';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$grade_components = $this->api($_GET);
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->GradeComponent->recursive = 2;
			$cond = array();
			if(!empty($this->data)){
				foreach($this->data['GradeComponent'] as $field=>$value){
					$cond['GradeComponent.'.$field]=$value;
				}
			}
			$grade_components  = $this->GradeComponent->find('all',array('conditions'=>$cond,'limit'=>15));
		}else{
		$this->GradeComponent->recursive = 0;
		$this->set('gradeComponents', $this->paginate());
		}
		if($this->Rest->isActive()||$this->RequestHandler->isAjax()){
			//Sanitize data
			if($this->Rest->isActive()){
				$this->set('data',$grade_components);
			}else{				
				echo json_encode($grade_components);
				exit;
			}
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid grade component', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gradeComponent', $this->GradeComponent->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			
			foreach($this->data['GradeComponent'] as $i=>$d){
				$this->data['GradeComponent'][$i]['recordbook_id']=$this->data['Recordbook']['id'];
			}
			if ($this->GradeComponent->saveAll($this->data['GradeComponent'])) {
			
				if($this->RequestHandler->isAjax()){
					$response['status'] = 1;
					$response['msg'] = '<img src="../img/icons/tick.png" />&nbsp; Saving successful';
					$response['data'] = $this->data;
					echo json_encode($response);
					exit();
				}else{ 
					$this->Session->setFlash(__('The grade component has been saved', true));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				if($this->RequestHandler->isAjax()){
					$response['status'] = -1;
					$response['msg'] = '<img src="../img/icons/exclamation.png" />&nbsp; The checklist could not be saved. Please, try again.';
					$response['data'] = $this->data;
					echo json_encode($response);
					exit();
				}else{
					$this->Session->setFlash(__('The grade component could not be saved. Please, try again.', true));
				}
			}
		}
		$recordbooks = $this->GradeComponent->Recordbook->find('list');
		$generalComponents = $this->GradeComponent->GeneralComponent->find('list');
		$this->set(compact('recordbooks', 'generalComponents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid grade component', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->GradeComponent->save($this->data)) {
				$this->Session->setFlash(__('The grade component has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grade component could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GradeComponent->read(null, $id);
		}
		$recordbooks = $this->GradeComponent->Recordbook->find('list');
		$generalComponents = $this->GradeComponent->GeneralComponent->find('list');
		$this->set(compact('recordbooks', 'generalComponents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for grade component', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GradeComponent->delete($id)) {
			$this->Session->setFlash(__('Grade component deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Grade component was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	protected function api($params){
		$schema = $this->GradeComponent->schema();
		//pr($schema);
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'GradeComponent.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'GradeComponent.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'GradeComponent.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(GradeComponent.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(GradeComponent.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['GradeComponent.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->GradeComponent->recursive = 1;
		return $this->GradeComponent->find('all',array('conditions'=>$conditions,'group'=>$group));
	}
}
