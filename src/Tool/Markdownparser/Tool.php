<?php
namespace ddStringTools\Tool\Markdownparser;


class Tool extends \ddStringTools\Tool\Tool {
	private
		$parseInline = false
	;
	
	private static
		$parsedown = NULL
	;
	
	/**
	 * __construct
	 * @version 1.0.2 (2024-11-05)
	 * 
	 * @param $params {stdClass|arrayAssociative}
	 */
	public function __construct($params){
		// Call base constructor
		parent::__construct($params);
		
		// Include PHP.libraries.Parsedown
		require_once(
			'Parsedown'
			. DIRECTORY_SEPARATOR
			. 'Parsedown.php'
		);
		
		// Init Parsedown object
		if (is_null(self::$parsedown)){
			self::$parsedown = new \Parsedown();
		}
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
		if ($this->parseInline){
			$inputString = self::$parsedown->line($inputString);
		}else{
			$inputString = self::$parsedown->text($inputString);
		}
		
		return $inputString;
	}
}