<?php
class ClasslistsController extends AppController {

	var $name = 'Classlists';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$Classlists = $this->api($_GET);
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->Classlist->recursive = 2;
			$cond = array();
			if(!empty($this->data)){
				foreach($this->data['Classlist'] as $field=>$value){
					$cond['Classlist.'.$field]=$value;
				}
				
			}
			$Classlists  = $this->Classlist->find('all',array('conditions'=>$cond,'limit'=>20));
		}else{
			$this->Classlist->recursive = 0;
			$this->set('Classlists', $this->paginate());
		}
		if($this->Rest->isActive()||$this->RequestHandler->isAjax()){
			//Sanitize data
			echo json_encode($Classlists);
			exit;
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid classlist', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('classlist', $this->Classlist->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Classlist->create();
			if ($this->Classlist->save($this->data)) {
				$this->Session->setFlash(__('The classlist has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classlist could not be saved. Please, try again.', true));
			}
		}
		$students = $this->Classlist->Student->find('list');
		$sections = $this->Classlist->Section->find('list');
		$this->set(compact('students', 'sections'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid classlist', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Classlist->save($this->data)) {
				$this->Session->setFlash(__('The classlist has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classlist could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Classlist->read(null, $id);
		}
		$students = $this->Classlist->Student->find('list');
		$sections = $this->Classlist->Section->find('list');
		$this->set(compact('students', 'sections'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for classlist', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Classlist->delete($id)) {
			$this->Session->setFlash(__('Classlist deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Classlist was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	protected function api($params){
		$schema = $this->Classlist->schema();
		//pr($schema);
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'Classlist.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'Classlist.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'Classlist.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(Classlist.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(Classlist.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['Classlist.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->Classlist->recursive = 1;
		return $this->Classlist->find('all',array('conditions'=>$conditions,'group'=>$group,'fields'=>$fields,'order'=>array('Student.gender'=>'DESC')));
	}
}
