<?php
namespace ddStringTools\Tool\Urlencoder;


class Tool extends \ddStringTools\Tool\Tool {
	/**
	 * modify_exec
	 * @version 1.0 (2020-05-06)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected function modify_exec($inputString){
		$inputString = rawurlencode($inputString);
		
		return $inputString;
	}
}