<?php
class TemplateDetailsController extends AppController {

	var $name = 'TemplateDetails';

	function index() {
		$this->TemplateDetail->recursive = 0;
		$this->set('templateDetails', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid template detail', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('templateDetail', $this->TemplateDetail->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TemplateDetail->create();
			if ($this->TemplateDetail->save($this->data)) {
				$this->Session->setFlash(__('The template detail has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The template detail could not be saved. Please, try again.', true));
			}
		}
		$templates = $this->TemplateDetail->Template->find('list');
		$generalComponents = $this->TemplateDetail->GeneralComponent->find('list');
		$this->set(compact('templates', 'generalComponents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid template detail', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->TemplateDetail->save($this->data)) {
				$this->Session->setFlash(__('The template detail has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The template detail could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TemplateDetail->read(null, $id);
		}
		$templates = $this->TemplateDetail->Template->find('list');
		$generalComponents = $this->TemplateDetail->GeneralComponent->find('list');
		$this->set(compact('templates', 'generalComponents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for template detail', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TemplateDetail->delete($id)) {
			$this->Session->setFlash(__('Template detail deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Template detail was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
