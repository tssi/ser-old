<?php
class CoursesController extends AppController {

	var $name = 'Courses';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$this->set('data',$this->api($_GET));
			}
		}else if($this->RequestHandler->isAjax()){		
			$this->Course->recursive = 1;
			$courses = $this->Course->find('all');
			echo json_encode($courses);
			exit;
		}else{
			$this->Course->recursive = 0;
			$this->set('Course', $this->paginate());
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid course', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('course', $this->Course->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Course->create();
			if ($this->Course->save($this->data)) {
				$this->Session->setFlash(__('The course has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.', true));
			}
		}
		$curriculums = $this->Course->Curriculum->find('list');
		$Courses = $this->Course->Course->find('list');
		$levels = $this->Course->Level->find('list');
		$this->set(compact('curriculums', 'Courses', 'levels'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid course', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Course->save($this->data)) {
				$this->Session->setFlash(__('The course has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Course->read(null, $id);
		}
		$curriculums = $this->Course->Curriculum->find('list');
		$Courses = $this->Course->Course->find('list');
		$levels = $this->Course->Level->find('list');
		$this->set(compact('curriculums', 'Courses', 'levels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for course', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Course->delete($id)) {
			$this->Session->setFlash(__('Course deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Course was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	protected function api($params){
		$schema = $this->Course->Subject->schema();
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			//echo "eto".$key.' '.$val;
			switch($key){
				case 'deptcode':
					$conditions['Level.department_id']=$val;
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
				case 'subjects':
					//$schema = $this->Course->schema();
					$conditions['Course.level_id']=$val;
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
								array_push($fields,'GROUP_CONCAT( DISTINCT Subject.id) as ids');
								array_push($fields,'GROUP_CONCAT(DISTINCT Level.id) as levels');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				default:
					if(isset($schema[$key])){
						$conditions['Course.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->Course->recursive = 0;
		return $this->Course->find('all',array('conditions'=>$conditions,'fields'=>$fields,'group'=>$group));
	}
}
