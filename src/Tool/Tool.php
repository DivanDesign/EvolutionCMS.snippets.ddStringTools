<?php
namespace ddStringTools\Tool;


abstract class Tool extends \DDTools\Base\Base {
	use \DDTools\Base\AncestorTrait;
	
	protected
		$canModify = true
	;
	
	/**
	 * __construct
	 * @version 1.0.1 (2024-08-06)
	 * 
	 * @param $params {stdClass|arrayAssociative}
	 */
	public function __construct($params){
		// Without parameters
		if (is_bool($params)){
			$this->canModify = $params;
		}else{
			// All parameters set object properties
			$this->setExistingProps($params);
		}
	}
	
	/**
	 * modify
	 * @version 1.0 (2020-05-05)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	public function modify($inputString){
		if ($this->canModify){
			$inputString = $this->modify_exec($inputString);
		}
		
		return $inputString;
	}
	
	/**
	 * modify_exec
	 * @version 1.0 (2020-05-05)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected abstract function modify_exec($inputString);
}