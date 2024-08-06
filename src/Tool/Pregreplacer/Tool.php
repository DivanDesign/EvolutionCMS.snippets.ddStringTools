<?php
namespace ddStringTools\Tool\Pregreplacer;


class Tool extends \ddStringTools\Tool\Tool {
	private
		$pattern,
		$replacement = ''
	;
	
	/**
	 * __construct
	 * @version 1.0.1 (2024-08-06)
	 *
	 * @param $params {stdClass|arrayAssociative}
	 */
	public function __construct($params){
		// Call base constructor
		parent::__construct($params);
		
		// If pattern is invalid
		if (
			!is_string($this->pattern) ||
			$this->pattern == ''
		){
			// Prevent modifying
			$this->canModify = false;
		}
	}
	
	/**
	 * modify_exec
	 * @version 1.0 (2020-06-22)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected function modify_exec($inputString){
		$inputString = preg_replace(
			(
				'/' .
				$this->pattern .
				'/u'
			),
			$this->replacement,
			$inputString
		);
		
		return $inputString;
	}
}