<?php
/**
 * ddStringTools
 * @version 1.7 (2020-06-22)
 * 
 * @see README.md
 * 
 * @copyright 2016–2020 DD Group {@link http://DivanDesign.biz }
 */

$snippetPath =
	$modx->getConfig('base_path') .
	implode(
		DIRECTORY_SEPARATOR,
		[
			'assets',
			'snippets',
			'ddStringTools',
			''
		]
	)
;

$snippetPath_src_tool =
	$snippetPath .
	implode(
		DIRECTORY_SEPARATOR,
		[
			'src',
			'Tool',
			''
		]
	)
;

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	implode(
		DIRECTORY_SEPARATOR,
		[
			'assets',
			'libs',
			'ddTools',
			'modx.ddtools.class.php'
		]
	)
);

if(!class_exists('\ddStringTools\Tool\Tool')){
	require_once(
		$snippetPath .
		'require.php'
	);
}


$params = \DDTools\ObjectTools::extend([
	'objects' => [
		//Defaults
		(object) [
			'inputString' => '',
			'tools' => []
		],
		$params
	]
]);

//If the input string is passed as an object (e. g. through `$modx->runSnippet`)
if (
	is_object($params->inputString) ||
	is_array($params->inputString)
){
	//Convert it to JSON
	$params->inputString = \DDTools\ObjectTools::convertType([
		'object' => $params->inputString,
		'type' => 'stringJsonAuto'
	]);
}

$params->tools = \DDTools\ObjectTools::convertType([
	'object' => $params->tools,
	'type' => 'objectStdClass'
]);


foreach (
	$params->tools as
	$toolName =>
	$toolParams
){
	//Senselessly to process empty strings. We need to check this on each cycle iteration because string can become empty after one of iterations.
	if ($params->inputString != ''){
		$toolObject = \ddStringTools\Tool\Tool::createChildInstance([
			'name' => $toolName,
			'parentDir' => $snippetPath_src_tool,
			//Passing parameters into constructor
			'params' => $toolParams
		]);
		
		$params->inputString = $toolObject->modify($params->inputString);
	}
}

return $params->inputString;
?>