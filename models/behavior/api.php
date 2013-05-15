<?php  
/** 
 * API Behavior Class file 
 *  
 * @author Dave Alaras
 * @version 1 
 * 
 */ 

/** 
 * API Behavior allow a model for easy data retrieval
 * 
 */ 
class ApiBehavior extends ModelBehavior { 

    var $__settings = array(); 
    
    /** 
     * Initiate behavior for the model using specified settings. Available settings: 
     * 
     * - incrementFieldName: (string) The name of the field which needs to be incremented 
     *  
     * 
     * @param object $Model Model using the behaviour 
     * @param array $settings Settings to override for model. 
     * @access public 
     */ 
    function setup(&$Model, $settings = array()) 
    { 
        $default = array(); 
        if (!isset($this->__settings[$Model->alias])) 
        { 
            $this->__settings[$Model->alias] = $default; 
        } 

        $this->__settings[$Model->alias] = am($this->__settings[$Model->alias], ife(is_array($settings), $settings, array())); 
    } 
     
    function beforeFind(&$model, $query) {} 

    function afterFind(&$model, $results, $primary)  {} 
     
    function beforeSave(&$model)  {} 

    function afterSave(&$model, $created) {} 

    function beforeDelete(&$model)  {} 

    function afterDelete(&$model)  {} 

    function onError(&$model, $error)  {} 
    /** 
     * apiFind method will find and sanitize
     * array format to match client rendering
	 *
     * @param ModelObject $model 
     * @param array $type - Type of find based on Cakephp
     * @param array $config - Filter configuration either condition or fields
	 * @access public 
	 * @return array 
     */ 
	function findAPI(&$model,$type='all',$config){
		//Model find based on condition and fields supplied
		$model->recursive = 2;
		$results = $model->find($type,$config);
		//Sanitize data
		foreach($results as $index=>$data){
			//Fix results based on the hasMany relationship 
			foreach($model->hasMany as $hasManyModel=>$hMM){
				$hMMArr = array();
				//Loop on hasManyModel contents
				foreach($data[$hasManyModel] as $dHMM){
					$hMMObj = array();
					foreach( $dHMM as $field => $value){
						if(is_array($value)){
							$hMMObj[$field] = $value;
						}else{
							$hMMObj[$hasManyModel][$field] = $value;
							
						}
					}
					array_push($hMMArr,$hMMObj);
				}
			//Assign new value to indexed hasManyModel
			$results[$index][$hasManyModel] = $hMMArr;
			}
		} 
		return $results;
	}	
} 
?>