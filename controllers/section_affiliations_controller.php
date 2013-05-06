<?php
class SectionAffiliationsController extends AppController {

	var $name = 'SectionAffiliations';

	function index() {
		$this->SectionAffiliation->recursive = 0;
		$this->set('sectionAffiliations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid section affiliation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('sectionAffiliation', $this->SectionAffiliation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SectionAffiliation->create();
			if ($this->SectionAffiliation->save($this->data)) {
				$this->Session->setFlash(__('The section affiliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The section affiliation could not be saved. Please, try again.', true));
			}
		}
		$sections = $this->SectionAffiliation->Section->find('list');
		$curriculums = $this->SectionAffiliation->Curriculum->find('list');
		$this->set(compact('sections', 'curriculums'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid section affiliation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SectionAffiliation->save($this->data)) {
				$this->Session->setFlash(__('The section affiliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The section affiliation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SectionAffiliation->read(null, $id);
		}
		$sections = $this->SectionAffiliation->Section->find('list');
		$curriculums = $this->SectionAffiliation->Curriculum->find('list');
		$this->set(compact('sections', 'curriculums'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for section affiliation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SectionAffiliation->delete($id)) {
			$this->Session->setFlash(__('Section affiliation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Section affiliation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
