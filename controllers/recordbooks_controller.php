<?php
class RecordbooksController extends AppController {

	var $name = 'Recordbooks';

	function index() {
		$this->Recordbook->recursive = 0;
		$this->set('recordbooks', $this->paginate());
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
}
