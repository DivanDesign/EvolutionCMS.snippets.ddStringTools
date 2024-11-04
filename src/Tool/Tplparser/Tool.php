<?php
namespace ddStringTools\Tool\Tplparser;


class Tool extends \ddStringTools\Tool\Tool {
	private
		$tpl = '',
		$placeholders = []
	;
		
	/**
	 * __construct
	 * @version 1.0.2 (2024-08-06)
	 *
	 * @param $params {stdClass|arrayAssociative}
	 */
	public function __construct($params){
		// Call base constructor
		parent::__construct($params);
		
		$this->tpl = \ddTools::getTpl($this->tpl);
	}
	
	/**
	 * modify_exec
	 * @version 1.2.1 (2024-11-05)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected function modify_exec($inputString){
		$inputString = \ddTools::parseText([
			'text' => $this->tpl,
			'data' => \DDTools\ObjectTools::extend([
				'objects' => [
					[
						'snippetResult' => $inputString,
					],
					$this->placeholders,
				],
			]),
		]);
		
		return $inputString;
	}
}