<?php
class RawScoresController extends AppController {

	var $name = 'RawScores';

	function index() {
		$this->RawScore->recursive = 0;
		$this->set('rawScores', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid raw score', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rawScore', $this->RawScore->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RawScore->create();
			if ($this->RawScore->save($this->data)) {
				$this->Session->setFlash(__('The raw score has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The raw score could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid raw score', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RawScore->save($this->data)) {
				$this->Session->setFlash(__('The raw score has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The raw score could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RawScore->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for raw score', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RawScore->delete($id)) {
			$this->Session->setFlash(__('Raw score deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Raw score was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
