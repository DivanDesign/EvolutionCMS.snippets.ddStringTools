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
	 * @version 1.0.2 (2021-04-14)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected function modify_exec($inputString){
		$inputString = \DDTools\Snippet::runSnippet([
			'name' => 'ddTypograph',
			'params' => \DDTools\ObjectTools::extend([
				'objects' => [
					[
						'text' => $inputString
					],
					$this->toArray()
				]
			])
		]);
		
		return $inputString;
	}
}