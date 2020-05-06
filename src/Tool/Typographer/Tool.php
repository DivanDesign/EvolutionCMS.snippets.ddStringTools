<?php
namespace ddStringTools\Tool\Typographer;


class Tool extends \ddStringTools\Tool\Tool {
	private
		$optAlign = false,
		$text_paragraphs = false,
		$text_autoLinks = false,
		$etc_unicodeConvert = true,
		$noTags = false,
		$excludeTags = 'notg,code'
	;
	
	/**
	 * modify_exec
	 * @version 1.0 (2020-05-06)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected function modify_exec($inputString){
		$inputString = \ddTools::$modx->runSnippet(
			'ddTypograph',
			array_merge(
				$this->toArray(),
				[
					'text' => $inputString
				]
			)
		);
		
		return $inputString;
	}
}