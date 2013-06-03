<?php
class EmployeeContactsController extends AppController {

	var $name = 'EmployeeContacts';

	function index() {
		$this->EmployeeContact->recursive = 0;
		$this->set('employeeContacts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid employee contact', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('employeeContact', $this->EmployeeContact->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EmployeeContact->create();
			if ($this->EmployeeContact->save($this->data)) {
				$this->Session->setFlash(__('The employee contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee contact could not be saved. Please, try again.', true));
			}
		}
		$employees = $this->EmployeeContact->Employee->find('list');
		$this->set(compact('employees'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid employee contact', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EmployeeContact->save($this->data)) {
				$this->Session->setFlash(__('The employee contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee contact could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EmployeeContact->read(null, $id);
		}
		$employees = $this->EmployeeContact->Employee->find('list');
		$this->set(compact('employees'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for employee contact', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EmployeeContact->delete($id)) {
			$this->Session->setFlash(__('Employee contact deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Employee contact was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
