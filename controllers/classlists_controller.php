<?php
class ClasslistsController extends AppController {

	var $name = 'Classlists';

	function index() {
		$this->Classlist->recursive = 0;
		$this->set('classlists', $this->paginate());
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
}
