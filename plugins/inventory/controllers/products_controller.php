<?php
class ProductsController extends inventoryAppController {
	var $name = 'Products';
    var $uses = array('Inventory.Product','Inventory.Perishable', 'Inventory.ProductType','Inventory.Counter', 'Inventory.MenuItem','Inventory.Unit');
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
				'getUnits' => array(
                    'extract' => array('data'),
                ),
				'getUnitsAlias' => array(
                    'extract' => array('data'),
                ),
				'item_code_details' => array(
                    'extract' => array('data'),
                ),
				'desc_details' => array(
                    'extract' => array('data'),
                ),
				'itemcode' => array(
                    'extract' => array('data'),
                ),
				'version'=>'1.0.0'
            ),
        );
	
	function index() {
		if ($this->Rest->isActive()) {	
			$data = $this->Product->find('all');
			$this->set('data',$data);
		}
		else if($this->RequestHandler->isAjax()){	
			$curr_data = $this->Product->find('all');
			echo json_encode($curr_data);
			exit;
		}else{
			$units = $this->Unit->find('list');
			$products = $this->Product->find('all',array('recursive'=>0));
			$this->set(compact('products','units'));	
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('product', $this->Product->read(null, $id));
	}

	function add() {
		if (!empty($this->data)){
			if(isset($this->data['Product'][0])){ //if many products 
				for($i=0;$i<count($this->data['Product']); $i++){
					$name = $this->data['Product'][$i]['name']; //to Prope rCase
					$cast = ucwords(strtolower($name));   //         |
					$this->data['Product'][$i]['name'] = $cast; //   |
											
					if($this->data['Product'][$i]['item_code']=='(Auto)'){
						$prefixInHouse = $this->Counter->find('first',array('conditions'=>array('Counter.id'=>'PRFXINH')));
						$prefixInProduct = $this->Counter->find('first',array('conditions'=>array('Counter.id'=>'PRFXPRD')));
						$productType = $this->data['Product'][$i]['product_type_id'];
						
								
						if($productType== 'PI'){
							$counter = $this->Counter->find('first',array('conditions'=>array('Counter.id'=>'PRSHBLE')));
							$this->Counter->doIncrement('PRSHBLE',1);
						}else{
							$counter = $this->Counter->find('first',array('conditions'=>array('Counter.id'=>'SHLFITM')));
							$this->Counter->doIncrement('SHLFITM',1);
						}
						$assignee_code = $prefixInHouse['Counter']['value'].$prefixInProduct['Counter']['value'].$counter['Counter']['value'];
						
						$findMatch=$this->Product->findByItemCode($assignee_code);
						
						$this->data['Product'][$i]['item_code'] = $assigned_code;
						
						$typeIs = '';
							switch($productType){
								case 'SI':
									$this->data['Product'][$i]['is_consumable'] =1;
								break;
								case 'AX':
									$this->data['Product'][$i]['is_consumable'] =0;
								break;
								case 'PP':
									$this->data['Product'][$i]['is_consumable'] =0;
								break;
								case 'PI':
									$this->data['Product'][$i]['is_consumable'] =1;
								break;
								case 'SP':
									$this->data['Product'][$i]['is_consumable'] =1;
								break;
								case 'UT':
									$this->data['Product'][$i]['is_consumable'] =0;
								break;
							}
						$this->data['Product'][$i]['status']=1;
					}
					elseif (empty($this->data['Product'][$i]['item_code'])){
						unset($this->data['Product'][$i]);
					}
				}
			}else{
					if($this->data['Product']['item_code']=='(Auto)'){  //single product
								$name = $this->data['Product']['name'];
								$cast = ucwords(strtolower($name));
								$this->data['Product']['name'] = $cast;
								$prefixInHouse = $this->Counter->find('first',array('conditions'=>array('Counter.id'=>'PRFXINH')));
								$prefixInProduct = $this->Counter->find('first',array('conditions'=>array('Counter.id'=>'PRFXPRD')));
								$productType = $this->data['Product']['product_type_id'];
						
								if($this->data['Product']['product_type_id']== 'PI'){
									$counter = $this->Counter->find('first',array('conditions'=>array('Counter.id'=>'PRSHBLE')));
									$this->Counter->doIncrement('PRSHBLE',1);
								}else{
									$counter = $this->Counter->find('first',array('conditions'=>array('Counter.id'=>'SHLFITM')));
									$this->Counter->doIncrement('SHLFITM',1);
								}
								$this->data['Product']['item_code']=$prefixInHouse['Counter']['value'].$prefixInProduct['Counter']['value'].$counter['Counter']['value'];
								
								$typeIs = '';
									switch($productType){
										case 'SI':
											$this->data['Product']['is_consumable'] =1;
										break;
										case 'AX':
											$this->data['Product']['is_consumable'] =0;
										break;
										case 'PP':
											$this->data['Product']['is_consumable'] =0;
										break;
										case 'PI':
											$this->data['Product']['is_consumable'] =1;
										break;
										case 'SP':
											$this->data['Product']['is_consumable'] =1;
										break;
										case 'UT':
											$this->data['Product']['is_consumable'] =0;
										break;
									}
								$this->data['Product']['status']=0;
					}elseif (empty($this->data['Product']['item_code'])){
								unset($this->data['Product']);
								exit();
							}
				}
			
			
			if ($this->Product->saveAll($this->data['Product'])) {
				if($this->RequestHandler->isAjax()){
					$response['status'] = 1;
					$response['msg'] = '<img src="/canteen/img/icons/tick.png" />&nbsp; Saving successful';
					$response['data'] = $this->data;
					echo json_encode($response);
					exit();
				}else{ 
					$this->Session->setFlash(__('Saving successful...', true));
				}
			} else {
				if($this->RequestHandler->isAjax()){
					$response['status'] = -1;
					$response['msg'] = '<img src="/canteen/img/icons/exclamation.png" />&nbsp; The product could not be saved. Please, try again.';
					$response['data'] = $this->data;
					echo json_encode($response);
					exit();
				}else{
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
				}
			}
		}
		$productTypes = $this->Product->ProductType->find('list');
		$units = $this->Product->Unit->find('list');
		$this->set(compact('productTypes', 'units'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
			$this->Session->setFlash(__('Product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function findItem($id=null, $orderBy=null){
        if(!empty($id)){
			if($id!='PI'){ // if not perishable
				if(empty($orderBy)){
					$orderBy = 'Product.item_code';
				}
				
				$order = array($orderBy);
				
				if ($id=="ALL"){
					$sItems = $this->Product->find('all', array('conditions'=>array('Product.status'=>1),'order'=>$order));
					
					$orderByP = 'Perishable'.strstr($orderBy , '.');
					$pItems = $this->Perishable->find('all', array('conditions'=>array('Perishable.status'=>1),'order'=>$orderByP));
					
					$items = array_merge($sItems, $pItems);
					echo json_encode($items);
					exit();
				}else{
					$conditions = array('Product.product_type_id'=>$id);
					$items = $this->Product->find('all', array('conditions'=>$conditions ,'order'=>$order));
					echo json_encode($items);
					exit();
				}
				
			}
			elseif($id =='PI'){
				if(empty($orderBy)){
					$orderBy = 'Perishable.item_code';
				}else{
					$orderBy = 'Perishable'.strstr($orderBy , '.');
				}
				$order = array($orderBy);
				$perishables = $this->Perishable->find('all', array('order'=>$order));
				echo json_encode($perishables);
				exit();
			}
			
      }
	}
    
    function check(){
        if ($this->RequestHandler->isAjax()) {
			$itemcode= $this->data['Product']['item_code'];
			if(!empty($this->data)){
				$menuResult = $this->MenuItem->find('first', array('conditions'=>array('MenuItem.item_code'=>$itemcode)));
				$result = $this->Product->find('first',array('conditions'=>array('Product.item_code'=>$itemcode)));
				
				$response['result']=$result;
				if($result || $menuResult){
					if(isset($result['Product']['name'])){
						$response['status']="ERROR";
						$response['message']="ItemCode  found! ";
						$response['message'].="<ul>";
						$response['message'].='<li><strong>Description:<strong>'.$result['Product']['name'].'</li>';
						$response['message'].='<li><strong>Price:<strong>'.$result['Product']['selling_price'].'</li>';
						$response['message'].='<li><strong>Unit:<strong>'.$result['Unit']['name'].'</li>';
						
						$response['message'].="</ul>";
					}else{
						$response['status']="ERROR";
						$response['message']="ItemCode  found! ";
						$response['message'].="<ul>";
						$response['message'].='<li><strong>Description:<strong>'.$menuResult['MenuItem']['name'].'</li>';
						$response['message'].='<li><strong>Price:<strong>'.$menuResult['MenuItem']['selling_price'].'</li>';
						$response['message'].='<li><strong>Unit:<strong>'.$menuResult['Unit']['name'].'</li>';
						
						$response['message'].="</ul>";
					
					}
				}else{
					$response['status']="OK";
					$response['message']="ItemCode available.";
				}
			}else{
				$response['status']="ERROR";
				$response['message']="Empty data.";
			}
		}
		echo json_encode($response);
		Configure::write('debug', 0);
		exit;
    }
	
	function search(){
		$key = '%'.$this->data['Product']['key'].'%';
		$product = $this->Product->find('all', array('conditions'=>array('Product.name LIKE'=>$key)));
		echo json_encode($product);
		exit();
	}

	function checkDesc(){
        if ($this->RequestHandler->isAjax()) {
			//$name = 'pwerty 500g');
			$name = trim($this->data['Product']['name']);
			$name = ucwords(strtolower($name));
			
			//echo $name;
			//exit();
			$result = $this->Product->find('first',array('conditions'=>array('Product.name'=>$name)));
			
			$response['result']=$result;
			
			if($result){
				if(isset($result['Product']['name'])){
					$response['status']="ERROR";
					$response['message']="<str>".$name."<str/> is already used, name it differently!";
				}
			}else{
				$response['status']="OK";
				$response['message']="Name available.";
			}
			
		}
		echo json_encode($response);
		exit();
    }
	
	function product_new() {
		$this->Product->recursive = 0;
		$productTypes = $this->Product->ProductType->find('all');
		$units = $this->Product->Unit->find('list',array('fields'=>array('Unit.id','Unit.alias')));

		$this->set(compact('productTypes', 'units'));
	}
	
	function getByProductName(){
		$name = $this->data['Product']['name'];
		$cast = ucwords(strtolower($name));
		$this->data['Product']['name'] = $cast;
		$product = $this->Product->find('first', array('conditions'=>array('Product.name'=>$cast)));
		//$product['search-key']= $cast;
		if ($this->RequestHandler->isAjax()) {
			echo json_encode($product);
			exit();
		}
		exit();
	}
	
	function getByProductCode(){
		$code = $this->data['Product']['item_code'];
		$product = $this->Product->find('all', array('conditions'=>array('Product.item_code'=>$code)));
		echo json_encode($product);
		exit();
	}
	
	function getByType(){
		 if ($this->RequestHandler->isAjax()){
			if(!empty($this->data)){
				$kind  = $this->data['Product']['kind'];
				$field = $this->data['Product']['field'];
				$type = $this->data['Product']['type'];
				
				if($kind=='PI'){		
					if ($type=='within'){
						$type='LIKE';
						$key = '%'.$this->data['Product']['key'].'%';
					}else{
						$type='';
						$key = $this->data['Product']['key'];
					}
					$field = 'Perishable'.strstr($field, '.');
					$product = $this->Perishable->find('all', array('conditions'=>array(''.$field.' '.$type.''=>$key)));
					echo json_encode($product);
					exit();
				}else{
					if ($type=='within'){
						$type='LIKE';
						$key = '%'.$this->data['Product']['key'].'%';
					}else{
						$type='';
						$key = $this->data['Product']['key'];
					}
					$product = $this->Product->find('all', array('conditions'=>array(''.$field.' '.$type.''=>$key)));
					echo json_encode($product);
					exit();
				}
			}
		}
	}
	/* function getUnits(){
		if ($this->RequestHandler->isAjax()) {
			$units = $this->Unit->find('all',array('recursive'=>0));
		}
		echo json_encode(array($units));
		exit;
	} */
	function getUnits(){
		if ($this->Rest->isActive()) {	
			$data = $this->Unit->find('all',array('recursive'=>0));
			$this->set('data',$data);
		}
	
	}
	function getUnitsAlias(){
		if ($this->Rest->isActive()) {	
			$d = $this->data;
			$unit = $d['Product']['unit'];
			
			$data = $this->Unit->find('first',array('recursive'=>0,'conditions'=>array('Unit.name'=>$unit)));
			$this->set('data',$data);
		}
	
	}
			
	function desc_details() {
		if ($this->Rest->isActive()) {	
			$data = $this->data;
			$fields = $data['Product']['name'];
			$data = $this->Product->find('first',array('conditions'=>array('Product.name'=>$fields)));	
			$this->set('data',$data);
		}
		
	}
			
	function item_code_details() {
		if ($this->Rest->isActive()) {	
			$data = $this->data;
			$fields = $data['Product']['item_code'];
			$data = $this->Product->find('first',array('conditions'=>array('Product.item_code'=>$fields)));	
			$this->set('data',$data);
		}
	}
	
	
	function getAllproducts(){
		if($this->RequestHandler->isAjax()){	
			$products = $this->Product->find('all',array('recursive'=>0));
			echo json_encode($products);
			exit();
		}
	}
	
	function itemcode(){
		if ($this->Rest->isActive()) {
			$this->Counter->doIncrement('ITMCODE',1);
			$data = $this->Counter->find('first',array('conditions'=>array('Counter.id'=>'ITMCODE')));
		
			$this->set('data',$data);
		}
	}
	

	
	
}