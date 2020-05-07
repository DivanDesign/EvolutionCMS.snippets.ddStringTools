<?php
/**
 * ddStringTools
 * @version 1.5 (2020-05-07)
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

if (!isset($inputString)){
	$inputString = '';
}

//Backward compatibility
if (!isset($tools)){
	//Simple boolean params
	$tools = \ddTools::verifyRenamedParams([
		'params' => $params,
		'compliance' => [
			'specialCharConverter' => 'specialCharsToHTMLEntities',
			'placeholderRemover' => 'removePlaceholders',
			'charEscaper' => 'escapeForJS',
			'urlEncoder' => 'URLEncode'
		],
		'writeToLog' => false
	]);
	
	//caseConverter
	if (isset($toUppercase)){
		$tools['caseConverter'] = [
			'toUpper' => boolval($toUppercase)
		];
	}else if (isset($toLowercase)){
		$tools['caseConverter'] = [
			'toLower' => boolval($toLowercase)
		];
	}
	
	//markdownParser
	if (isset($parseMarkdown)){
		if ($parseMarkdown == 'line'){
			$tools['markdownParser'] = [
				'parseInline' => true
			];
		}else{
			$tools['markdownParser'] = true;
		}
	}
	
	//typographer
	if (
		isset($typography) &&
		$typography == '1'
	){
		if (isset($typography_params)){
			$tools['typographer'] = \ddTools::encodedStringToArray($typography_params);
		}else{
			$tools['typographer'] = true;
		}
	}
	
	//tagRemover
	if (
		isset($stripTags) &&
		$stripTags == '1'
	){
		if (isset($stripTags_allowed)){
			$tools['tagRemover'] = [
				'allowed' => $stripTags_allowed
			];
		}else{
			$tools['tagRemover'] = true;
		}
	}
	
	if (!empty($tools)){
		\ddTools::logEvent([
			'message' => '<p>The snippet parameters were changed, please see the documentation and correct your calls.</p>'
		]);
	}
}else{
	$tools = \ddTools::encodedStringToArray($tools);
}

foreach (
	$tools as
	$toolName =>
	$toolParams
){
	$toolObject = \ddStringTools\Tool\Tool::createChildInstance([
		'name' => $toolName,
		'parentDir' => $snippetPath_src_tool,
		//Passing parameters into constructor
		'params' => $toolParams
	]);
	
	$inputString = $toolObject->modify($inputString);
}

return $inputString;
?>