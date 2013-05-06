<?php
class GeneralComponentsController extends AppController {

	var $name = 'GeneralComponents';

	function index() {
		$this->GeneralComponent->recursive = 0;
		$this->set('generalComponents', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid general component', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('generalComponent', $this->GeneralComponent->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->GeneralComponent->create();
			if ($this->GeneralComponent->save($this->data)) {
				$this->Session->setFlash(__('The general component has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The general component could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid general component', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->GeneralComponent->save($this->data)) {
				$this->Session->setFlash(__('The general component has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The general component could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GeneralComponent->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for general component', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GeneralComponent->delete($id)) {
			$this->Session->setFlash(__('General component deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('General component was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
