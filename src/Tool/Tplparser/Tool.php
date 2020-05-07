<?php
namespace ddStringTools\Tool\Tplparser;


class Tool extends \ddStringTools\Tool\Tool {
	private
		$tpl = '',
		$placeholders = []
	;
		
	/**
	 * __construct
	 * @version 1.0 (2020-05-07)
	 *
	 * @param $params {stdClass|arrayAssociative}
	 */
	public function __construct($params){
		//Call base constructor
		parent::__construct($params);
		
		$this->tpl = \ddTools::$modx->getTpl($this->tpl);
	}
	
	/**
	 * modify_exec
	 * @version 1.1 (2020-05-07)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected function modify_exec($inputString){
		$data = $this->placeholders;
		
		$data['snippetResult'] = $inputString;
		
		$inputString = \ddTools::parseText([
			'text' => $this->tpl,
			'data' => $data
		]);
		
		return $inputString;
	}
}