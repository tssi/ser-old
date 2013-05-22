<?php
class RawscoresController extends AppController {

	var $name = 'Rawscores';

	function index() {
		$this->Rawscore->recursive = 0;
		$this->set('rawscores', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rawscore', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rawscore', $this->Rawscore->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Rawscore->create();
			if ($this->Rawscore->save($this->data)) {
				$this->Session->setFlash(__('The rawscore has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rawscore could not be saved. Please, try again.', true));
			}
		}
		$students = $this->Rawscore->Student->find('list');
		$measurables = $this->Rawscore->Measurable->find('list');
		$this->set(compact('students', 'measurables'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rawscore', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Rawscore->save($this->data)) {
				$this->Session->setFlash(__('The rawscore has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rawscore could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Rawscore->read(null, $id);
		}
		$students = $this->Rawscore->Student->find('list');
		$measurables = $this->Rawscore->Measurable->find('list');
		$this->set(compact('students', 'measurables'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rawscore', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Rawscore->delete($id)) {
			$this->Session->setFlash(__('Rawscore deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rawscore was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
