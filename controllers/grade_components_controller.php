<?php
class GradeComponentsController extends AppController {

	var $name = 'GradeComponents';

	function index() {
		$this->GradeComponent->recursive = 0;
		$this->set('gradeComponents', $this->paginate());
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
			$this->GradeComponent->create();
			if ($this->GradeComponent->save($this->data)) {
				$this->Session->setFlash(__('The grade component has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The grade component could not be saved. Please, try again.', true));
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
}
