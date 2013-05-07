<?php
class SubjectsController extends AppController {

	var $name = 'Subjects';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$this->set('data',$this->api($_GET));
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->Subject->recursive = 1;
			$subjects = $this->Subject->find('all');
			//Sanitize data
			foreach($subjects as $index=>$data){
				$courses = array();
				foreach($data['Course'] as $course){
					$courseObj = array();
					foreach( $course as $field => $value){
						if(is_array($value)){
							$courseObj[$field] = $value;
						}else{
							$courseObj['Course'][$field] = $value;
							
						}
					}
					array_push($courses,$courseObj);
				}
			$subjects[$index]['Course'] = $courses;
			}
			echo json_encode($subjects);
			exit;
		}else{
			$this->Subject->recursive = 0;
			$this->set('Subject', $this->paginate());
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid subject', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('subject', $this->Subject->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Subject->create();
			if ($this->Subject->save($this->data)) {
				$this->Session->setFlash(__('The subject has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid subject', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Subject->save($this->data)) {
				$this->Session->setFlash(__('The subject has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Subject->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for subject', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Subject->delete($id)) {
			$this->Session->setFlash(__('Subject deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Subject was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	protected function api($params){
		$schema = $this->Subject->schema();
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'deptcode':
					$conditions['Subject.limit']=$val;
					$conditions['Subject.scope']='D';
				break;
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'Subject.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'Subject.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'Subject.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(Subject.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(Subject.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['Subject.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->Subject->recursive = 0;
		return $this->Subject->find('all',array('conditions'=>$conditions,'fields'=>$fields,'group'=>$group));
	}
}
