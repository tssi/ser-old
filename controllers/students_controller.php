<?php
class StudentsController extends AppController {

	var $name = 'Students';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$Students = $this->api($_GET);
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->Student->recursive = 2;
			$cond = array();
			if(!empty($this->data)){
				foreach($this->data['Student'] as $field=>$value){
					$cond['Student.'.$field]=$value;
				}
				
			}
			$Students  = $this->Student->find('all',array('conditions'=>$cond));
		}else{
			$this->Student->recursive = 0;
			$this->set('students', $this->paginate());
		}
		if($this->Rest->isActive()||$this->RequestHandler->isAjax()){
			//Sanitize data
			//pr($Students);exit();
			foreach($Students as $index=>$data){
				$classlists = array();
				foreach($data['Classlist'] as $component){
					$classlistObj = array();
					foreach( $component as $field => $value){
						if(is_array($value)){
							$classlistObj[$field] = $value;
						}else{
							$classlistObj['Classlist'][$field] = $value;
							
						}
					}
					array_push($classlists,$classlistObj);
				}
				$Students[$index]['Classlist'] = $classlists;
			}
			if($this->Rest->isActive()){
				$this->set('data',$Students);
			}else{				
				echo json_encode($Students);
				exit;
			}
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid student', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('student', $this->Student->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Student->create();
			if ($this->Student->save($this->data)) {
				$this->Session->setFlash(__('The student has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid student', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Student->save($this->data)) {
				$this->Session->setFlash(__('The student has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Student->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for student', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Student->delete($id)) {
			$this->Session->setFlash(__('Student deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Student was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
		protected function api($params){
		$schema = $this->Student->schema();
		//pr($schema);
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'deptcode':
					$conditions['Student.limit']=$val;
					$conditions['Student.scope']='D';
				break;
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'Student.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'Student.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'Student.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(Student.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(Student.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['Student.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->Student->recursive = 2;
		return $this->Student->find('all',array('conditions'=>$conditions,'group'=>$group,'fields'=>$fields));
	}
}
