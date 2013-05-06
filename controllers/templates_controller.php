<?php
class TemplatesController extends AppController {

	var $name = 'Templates';

	function index() {
		if($this->Rest->isActive()){
			$this->set('data', $this->paginate());
		}
		
		if($this->RequestHandler->isAjax()){	
			$this->Template->recursive = 1;
			$templates = $this->Template->find('all');
			//pr($templates);exit();
			//Sanitize data
			foreach($templates as $index=>$data){
				$components = array();
				foreach($data['TemplateDetail'] as $component){
					$componentObj = array();
					foreach( $component as $field => $value){
						if(is_array($value)){
							$component[$field] = $value;
						}else{
							$componentObj['TemplateDetail'][$field] = $value;
							
						}
					}
					array_push($components,$componentObj);
				}
			$templates[$index]['TemplateDetail'] = $components;
			}
			echo json_encode($templates);
			exit;
		}else{
			$this->Template->recursive = 0;
			$this->set('templates', $this->paginate());
		}
	}
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid template', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('template', $this->Template->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Template->create();
			if ($this->Template->save($this->data)) {
				$this->Session->setFlash(__('The template has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The template could not be saved. Please, try again.', true));
			}
		}
		$subjects = $this->Template->Subject->find('list');
		$levels = $this->Template->Level->find('list');
		$this->set(compact('subjects', 'levels'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid template', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Template->save($this->data)) {
				$this->Session->setFlash(__('The template has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The template could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Template->read(null, $id);
		}
		$subjects = $this->Template->Subject->find('list');
		$levels = $this->Template->Level->find('list');
		$this->set(compact('subjects', 'levels'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for template', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Template->delete($id)) {
			$this->Session->setFlash(__('Template deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Template was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
