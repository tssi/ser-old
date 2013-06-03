<?php
class EmployeesController extends AppController {

	var $name = 'Employees';
	var $uses =  array('Profile.Employee','Profile.SystemCounter');
	var $components = array(
		'Session',
		'RequestHandler',
		'Rest.Rest' => array(
			'catchredir' => true,
			'debug' => 1,
			'index' => array(
				'extract' => array('data'),
			),
			'view' => array(
				'extract' => array('data'),
			),
			'getEmployeeDetails' => array(
				'extract' => array('data'),
			),
			'version'=>'1.0.0'
		),
	);
	function beforeFilter(){
			$this->Auth->allowedActions = array('*');
	}
	function index() {
		if ($this->Rest->isActive()) {

			$data = $this->Employee->find('all');
		
			$this->set('data',$data);
			
		}else{
			if($this->RequestHandler->isAjax()){	
				$this->Employee->recursive = 2;
				$curr_data = $this->Employee->find('all');
				
				
				//Sanitize data
				foreach($curr_data as $index=>$data){
					$empAffs = array();
					foreach($data['EmployeeAffiliation'] as $empAff){
						$empAffObj = array();
						foreach( $empAff as $field => $value){
							if(is_array($value)){
								$empAffObj[$field] = $value;
							}else{
								$empAffObj['EmployeeAffiliation'][$field] = $value;
								
							}
						}
						array_push($empAffs,$empAffObj);
					}
				$curr_data[$index]['EmployeeAffiliation'] = $empAffs;
				}
				echo json_encode($curr_data);
				exit;
			}else{
				$this->Employee->recursive = 0;
				$this->set('employees', $this->paginate());
			}
			
		}
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid employee', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('employee', $this->Employee->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Employee->create();
			$emp_id = $this->SystemCounter->find('first',array('fields'=>array('SystemCounter.value'),'conditions'=>array('SystemCounter.id'=>'PRFLEEMPLY')));
			$this->data['Employee']['id'] = $emp_id['SystemCounter']['value'];
			if ($this->Employee->save($this->data)) {
				$this->Session->write('Actor',$this->Employee->id);
				$this->SystemCounter->doIncrement('PRFLEEMPLY',1,'value');
				$this->Session->setFlash(__('The employee has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid employee', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Employee->save($this->data)) {
				$this->Session->setFlash(__('The employee has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Employee->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for employee', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Employee->delete($id)) {
			$this->Session->setFlash(__('Employee deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Employee was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function confirm(){
	
		if(!empty($this->data)){
			$response = array();
			$response['actor'] = $actor  = $this->Session->read('Actor');
			$this->data['Employee']['id'] = $actor;
			if($this->Employee->save($this->data)){
				$response['status'] ="OK";
				$response['message'] ="Employee account confirmed.";
			}else{
				$response['status'] ="ERROR";
				$response['message'] ="Unable to confirm account!";
			}
			if ($this->RequestHandler->isAjax()) {
				echo json_encode($response);
				Configure::write('debug', 0);
				exit;
			}
		}
	}
	function getEmployeeDetails() {
		if ($this->Rest->isActive()) {
			$full_name = '%'.$this->data['Employee']['full_name'].'%';
			
		
			$data = $this->Employee->find('first',array('recursive'=>2,'conditions'=>array('Employee.full_name LIKE'=>$full_name)));
		
			$this->set('data',$data);
			
		}
	}
	
}
