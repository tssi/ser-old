<?php
class ComponentsController extends AppController {

	var $name = 'Components';

	function index() {
		$this->Component->recursive = 0;
		$this->set('components', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid component', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('component', $this->Component->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Component->create();
			if ($this->Component->save($this->data)) {
				$this->Session->setFlash(__('The component has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The component could not be saved. Please, try again.', true));
			}
		}

Notice: Undefined property: Component::$belongsTo in C:\cake\console\templates\default\actions\controller_actions.ctp on line 58

Warning: Invalid argument supplied for foreach() in C:\cake\console\templates\default\actions\controller_actions.ctp on line 58

Notice: Undefined property: Component::$hasAndBelongsToMany in C:\cake\console\templates\default\actions\controller_actions.ctp on line 58

Warning: Invalid argument supplied for foreach() in C:\cake\console\templates\default\actions\controller_actions.ctp on line 58
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid component', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Component->save($this->data)) {
				$this->Session->setFlash(__('The component has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The component could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Component->read(null, $id);
		}

Notice: Undefined property: Component::$belongsTo in C:\cake\console\templates\default\actions\controller_actions.ctp on line 102

Warning: Invalid argument supplied for foreach() in C:\cake\console\templates\default\actions\controller_actions.ctp on line 102

Notice: Undefined property: Component::$hasAndBelongsToMany in C:\cake\console\templates\default\actions\controller_actions.ctp on line 102

Warning: Invalid argument supplied for foreach() in C:\cake\console\templates\default\actions\controller_actions.ctp on line 102
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for component', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Component->delete($id)) {
			$this->Session->setFlash(__('Component deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Component was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
