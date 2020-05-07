<?php
namespace ddStringTools\Tool\Charescaper;


class Tool extends \ddStringTools\Tool\Tool {
	private
		$backslashes = true,
		$lineBreaks = true,
		$tabs = true,
		$quotes = true,
		$modxPlaceholders = true
	;
	
	/**
	 * modify_exec
	 * @version 1.1.2 (2020-05-07)
	 * 
	 * @param $inputString {string}
	 * 
	 * @return {string}
	 */
	protected function modify_exec($inputString){
		//Backslaches
		if ($this->backslashes){
			$inputString = str_replace(
				'\\',
				'\\\\',
				$inputString
			);
		}
		
		//Line breaks
		if ($this->lineBreaks){
			$inputString = str_replace(
				[
					"\r\n",
					"\n",
					"\r"
				],
				'\r\n',
				$inputString
			);
		}
		
		//Tabs
		if ($this->tabs){
			$inputString = str_replace(
				[
					chr(9),
					'  ',
				],
				' ',
				$inputString
			);
		}
		
		//MODX placeholders
		if ($this->modxPlaceholders){
			$inputString = str_replace(
				'[+',
				'\[\+',
				$inputString
			);
			$inputString = str_replace(
				'+]',
				'\+\]',
				$inputString
			);
		}
		
		//Quotes
		if ($this->quotes){
			$inputString = str_replace(
				"'",
				"\'",
				$inputString
			);
			$inputString = str_replace(
				'"',
				'\"',
				$inputString
			);
		}
		
		return $inputString;
	}
}