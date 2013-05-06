<?php
class CurriculumsController extends AppController {

	var $name = 'Curriculums';

	function index() {
		if($this->Rest->isActive()){
			$this->set('data', $this->paginate());
		}
		
		if($this->RequestHandler->isAjax()){		
		//if(1){		
			$this->Curriculum->recursive = 1;
			$curriculums = $this->Curriculum->find('all');
			//pr($curriculums);exit();
			//Sanitize data
			foreach($curriculums as $index=>$data){
				
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
			$curriculums[$index]['Course'] = $courses;
			}
			echo json_encode($curriculums);
			exit;
		}else{
			$this->Curriculum->recursive = 0;
			$this->set('curriculums', $this->paginate());
		}
	}

	function view($id = null) {
		
		if($this->Rest->isActive()){
			$this->set('data', $this->Curriculum->read(null, $id));
		}
		if (!$id) {
			$this->Session->setFlash(__('Invalid curriculum', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('curriculum', $this->Curriculum->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Curriculum->create();
			if ($this->Curriculum->save($this->data)) {
				$this->Session->setFlash(__('The curriculum has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The curriculum could not be saved. Please, try again.', true));
			}
		}
		$departments = $this->Curriculum->Department->find('list');
		$this->set(compact('departments'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid curriculum', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Curriculum->save($this->data)) {
				$this->Session->setFlash(__('The curriculum has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The curriculum could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Curriculum->read(null, $id);
		}
		$departments = $this->Curriculum->Department->find('list');
		$this->set(compact('departments'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for curriculum', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Curriculum->delete($id)) {
			$this->Session->setFlash(__('Curriculum deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Curriculum was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
