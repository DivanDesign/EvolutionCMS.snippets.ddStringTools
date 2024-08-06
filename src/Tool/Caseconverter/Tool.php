<?php
namespace ddStringTools\Tool\Caseconverter;


class Tool extends \ddStringTools\Tool\Tool {
	private
		$toLower = false,
		$toUpper = false
	;
	
	/**
	 * modify_exec
	 * @version 1.0.1 (2024-08-06)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected function modify_exec($inputString){
		// Make a string lowercase
		if ($this->toLower){
			$inputString = mb_strtolower(
				$inputString,
				\ddTools::$modx->getConfig('modx_charset')
			);
		}
		
		// Make a string uppercase
		if ($this->toUpper){
			$inputString = mb_strtoupper(
				$inputString,
				\ddTools::$modx->getConfig('modx_charset')
			);
		}
		
		return $inputString;
	}
}