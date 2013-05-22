<?php
class RawscoresController extends AppController {

	var $name = 'Rawscores';

	function index() {
		if($this->Rest->isActive()){
			if(isset($_GET)){
				$rawscores = $this->api($_GET);
			}
		}else if($this->RequestHandler->isAjax()){	
			$this->Rawscore->recursive = 2;
			$cond = array();
			if(!empty($this->data)){
				foreach($this->data['Rawscore'] as $field=>$value){
					$cond['Rawscore.'.$field]=$value;
				}
			}
			$rawscores  = $this->Rawscore->find('all',array('conditions'=>$cond));
		}
		if($this->Rest->isActive()||$this->RequestHandler->isAjax()){
				$this->set('data',$rawscores);
		}else{
			$this->Rawscore->recursive = 0;
			$this->set('rawscores', $this->paginate());
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rawscore', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rawscore', $this->Rawscore->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Rawscore->create();
			if ($this->Rawscore->save($this->data)) {
				if($this->RequestHandler->isAjax()){
					$response['status'] = 1;
					$response['msg'] = '<img src="../img/icons/tick.png" />&nbsp; Saving successful';
					$this->data['Rawscore']['id'] = $this->Rawscore->id;
					$response['data'] = $this->data;
					echo json_encode($response);
					exit();
				}else{ 
					$this->Session->setFlash(__('The rawscore has been saved', true));
					$this->redirect(array('action' => 'index'));
				}
			} else {
				if($this->RequestHandler->isAjax()){
					$response['status'] = -1;
					$response['msg'] = '<img src="../img/icons/exclamation.png" />&nbsp; The checklist could not be saved. Please, try again.';
					$response['data'] = $this->data;
					echo json_encode($response);
					exit();
				}else{
					$this->Session->setFlash(__('The rawscore could not be saved. Please, try again.', true));
				}
			}
		}
		$students = $this->Rawscore->Student->find('list');
		$measurables = $this->Rawscore->Measurable->find('list');
		$this->set(compact('students', 'measurables'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rawscore', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Rawscore->save($this->data)) {
				$this->Session->setFlash(__('The rawscore has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rawscore could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Rawscore->read(null, $id);
		}
		$students = $this->Rawscore->Student->find('list');
		$measurables = $this->Rawscore->Measurable->find('list');
		$this->set(compact('students', 'measurables'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rawscore', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Rawscore->delete($id)) {
			$this->Session->setFlash(__('Rawscore deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rawscore was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	protected function api($params){
		$schema = $this->Rawscore->schema();
		$conditions = array();
		$fields = array();
		$group = array();
		foreach($params as $key => $val){
			switch($key){
				case 'rawscores':
					//section,subject,esp
					$filter=array();
					foreach(explode(',',$val) as $key=>$f){
						$filter[$key]= $f;
					}
					return $this->Rawscore->get_rawscores($filter[0],$filter[1],$filter[2]);
				break;
				case 'fields':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($fields,'Rawscore.'.$f);
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
				break;
				case 'group':
					foreach(explode(',',$val) as $f){
						if(isset($schema[$f])){
							array_push($group,'Rawscore.'.$f);
							if(count($fields)==0){
								foreach($schema as $sk=>$sv){
									array_push($fields,'Rawscore.'.$sk);									
								}
							}
							if(!in_array('GROUP_CONCAT(Rawscore.id) as ids',$fields)){
								array_push($fields,'GROUP_CONCAT(Rawscore.id) as ids');
							}
						}else{
							return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid field '.$f.' supplied'));
						}
					}
					
				break;
				default:
					if(isset($schema[$key])){
						$conditions['Rawscore.'.$key]=$val;
					}else if($key!='url'){
						return $this->Rest->abort(array('status' => '404', 'error' => 'Invalid keyword '.$key.' supplied'));
					}	
				break;
			}
		}
		$this->Rawscore->recursive = 2;
		return $this->Rawscore->find('all',array('conditions'=>$conditions,'group'=>$group));
	}
}
