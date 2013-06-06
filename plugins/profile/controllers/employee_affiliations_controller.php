<?php
class EmployeeAffiliationsController extends AppController {

	var $name = 'EmployeeAffiliations';

	function index() {
		$this->EmployeeAffiliation->recursive = 0;
		$this->set('employeeAffiliations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid employee affiliation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('employeeAffiliation', $this->EmployeeAffiliation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EmployeeAffiliation->create();
			if ($this->EmployeeAffiliation->save($this->data)) {
				$this->Session->setFlash(__('The employee affiliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee affiliation could not be saved. Please, try again.', true));
			}
		}
		$employees = $this->EmployeeAffiliation->Employee->find('list');
		$this->set(compact('employees'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid employee affiliation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EmployeeAffiliation->save($this->data)) {
				$this->Session->setFlash(__('The employee affiliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee affiliation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EmployeeAffiliation->read(null, $id);
		}
		$employees = $this->EmployeeAffiliation->Employee->find('list');
		$this->set(compact('employees'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for employee affiliation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EmployeeAffiliation->delete($id)) {
			$this->Session->setFlash(__('Employee affiliation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Employee affiliation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
