<?php
class LevelsController extends AppController {

	var $name = 'Levels';

	function index() {
		$this->Level->recursive = 0;
		$this->set('levels', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid level', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('level', $this->Level->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Level->create();
			if ($this->Level->save($this->data)) {
				$this->Session->setFlash(__('The level has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The level could not be saved. Please, try again.', true));
			}
		}
		$departments = $this->Level->Department->find('list');
		$this->set(compact('departments'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid level', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Level->save($this->data)) {
				$this->Session->setFlash(__('The level has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The level could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Level->read(null, $id);
		}
		$departments = $this->Level->Department->find('list');
		$this->set(compact('departments'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for level', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Level->delete($id)) {
			$this->Session->setFlash(__('Level deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Level was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
