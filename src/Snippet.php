<?php
namespace ddStringTools;

class Snippet extends \DDTools\Snippet {
	protected
		$version = '2.1.0',
		
		$params = [
			// Defaults
			'inputString' => '',
			'tools' => [],
		],
		
		$paramsTypes = [
			'tools' => 'objectStdClass',
		]
	;
	
	/**
	 * prepareParams
	 * @version 1.0.2 (2024-11-05)
	 * 
	 * @param $this->params {stdClass|arrayAssociative|stringJsonObject|stringQueryFormatted}
	 * 
	 * @return {void}
	 */
	protected function prepareParams($params = []){
		// Call base method
		parent::prepareParams($params);
		
		// If the input string is passed as an object (e. g. through `$modx->runSnippet`)
		if (
			is_object($this->params->inputString)
			|| is_array($this->params->inputString)
		){
			// Convert it to JSON
			$this->params->inputString = \DDTools\ObjectTools::convertType([
				'object' => $this->params->inputString,
				'type' => 'stringJsonAuto',
			]);
		}
	}
	
	/**
	 * run
	 * @version 1.0.3 (2024-11-05)
	 * 
	 * @return {string}
	 */
	public function run(){
		$result = $this->params->inputString;
		
		foreach (
			$this->params->tools
			as $toolName
			=> $toolParams
		){
			// Senselessly to process empty strings. We need to check this on each cycle iteration because string can become empty after one of iterations.
			if ($result != ''){
				$toolObject = \ddStringTools\Tool\Tool::createChildInstance([
					'name' => $toolName,
					// Passing parameters into constructor
					'params' => $toolParams,
				]);
				
				$result = $toolObject->modify($result);
			}
		}
		
		return $result;
	}
}