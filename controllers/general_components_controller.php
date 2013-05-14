<?php
class GeneralComponentsController extends AppController {

	var $name = 'GeneralComponents';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$this->set('data',$this->api($_GET));
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->GeneralComponent->recursive = 1;
			$components = $this->GeneralComponent->find('all');
			foreach($components as $index=>$data){
				$gradecomp = array();
				foreach($data['GradeComponent'] as $course){
					$gradeCompObj = array();
					foreach( $course as $field => $value){
						if(is_array($value)){
							$gradeCompObj[$field] = $value;
						}else{
							$gradeCompObj['GradeComponent'][$field] = $value;
							
						}
					}
					array_push($gradecomp,$gradeCompObj);
				}
			$components[$index]['GradeComponent'] = $gradecomp;
			}
			echo json_encode($components);
			exit;
		}else{
			$this->GeneralComponent->recursive = 0;
			$this->set('generalComponents', $this->paginate());
		}
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
	protected function api($params){
		$schema = $this->Subject->schema();
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'deptcode':
					$conditions['Subject.limit']=$val;
					$conditions['Subject.scope']='D';
				break;
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'Subject.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'Subject.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'Subject.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(Subject.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(Subject.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['Subject.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->Subject->recursive = 0;
		return $this->Subject->find('all',array('conditions'=>$conditions,'fields'=>$fields,'group'=>$group));
	}
}
