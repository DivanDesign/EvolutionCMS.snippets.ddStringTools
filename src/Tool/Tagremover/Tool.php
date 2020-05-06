<?php
namespace ddStringTools\Tool\Tagremover;


class Tool extends \ddStringTools\Tool\Tool {
	private
		$allowed = ''
	;
	
	/**
	 * __construct
	 * @version 1.0 (2020-05-05)
	 *
	 * @param $params {stdClass|arrayAssociative}
	 */
	public function __construct($params){
		//Call base constructor
		parent::__construct($params);
		
		$this->allowed = trim($this->allowed);
	}
	
	/**
	 * modify_exec
	 * @version 1.0 (2020-05-05)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected function modify_exec($inputString){
		if ($this->allowed != ''){
			$inputString = strip_tags(
				$inputString,
				$this->allowed
			);
		}else{
			$inputString = strip_tags($inputString);
		}
		
		return $inputString;
	}
}