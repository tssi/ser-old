<?php
class MeasurablesController extends AppController {

	var $name = 'Measurables';

	function index() {
		$this->Measurable->recursive = 0;
		$this->set('measurables', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid measurable', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('measurable', $this->Measurable->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Measurable->create();
			if ($this->Measurable->save($this->data)) {
				$this->Session->setFlash(__('The measurable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measurable could not be saved. Please, try again.', true));
			}
		}
		$recordbooks = $this->Measurable->Recordbook->find('list');
		$generalComponents = $this->Measurable->GeneralComponent->find('list');
		$this->set(compact('recordbooks', 'generalComponents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid measurable', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Measurable->save($this->data)) {
				$this->Session->setFlash(__('The measurable has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measurable could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Measurable->read(null, $id);
		}
		$recordbooks = $this->Measurable->Recordbook->find('list');
		$generalComponents = $this->Measurable->GeneralComponent->find('list');
		$this->set(compact('recordbooks', 'generalComponents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for measurable', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Measurable->delete($id)) {
			$this->Session->setFlash(__('Measurable deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Measurable was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
