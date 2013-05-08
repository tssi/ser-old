<?php
class TemplatesController extends AppController {

	var $name = 'Templates';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$this->set('data',$this->api($_GET));
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->Template->recursive = 1;
			$templates = $this->Template->find('all');
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
		$Templates = $this->Template->Template->find('list');
		$levels = $this->Template->Level->find('list');
		$this->set(compact('Templates', 'levels'));
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
		$Templates = $this->Template->Template->find('list');
		$levels = $this->Template->Level->find('list');
		$this->set(compact('Templates', 'levels'));
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
	protected function api($params){
		$schema = $this->Template->schema();
		//pr($schema);
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'deptcode':
					$conditions['Template.limit']=$val;
					$conditions['Template.scope']='D';
				break;
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'Template.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'Template.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'Template.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(Template.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(Template.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['Template.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->Template->recursive = 0;
		return $this->Template->find('all',array('conditions'=>$conditions,'fields'=>$fields,'group'=>$group));
	}
}
