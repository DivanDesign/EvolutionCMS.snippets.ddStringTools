<?php
/**
 * ddStringTools
 * @version 1.3 (2019-10-20)
 * 
 * @see README.md
 * 
 * @copyright 2016–2019 DivanDesign {@link http://www.DivanDesign.biz }
 */

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once($modx->getConfig('base_path') . 'assets/libs/ddTools/modx.ddtools.class.php');

//Inclide Parsedown lib
require_once($modx->getConfig('base_path') . 'assets/snippets/ddStringTools/src/Parsedown/Parsedown.php');

if (!isset($inputString)){
	$inputString = '';
}

//Make a string lowercase
if (
	isset($toLowercase) &&
	$toLowercase == '1'
){
	$inputString = mb_strtolower(
		$inputString,
		$modx->config['modx_charset']
	);
}

//Make a string uppercase
if (
	isset($toUppercase) &&
	$toUppercase == '1'
){
	$inputString = mb_strtoupper(
		$inputString,
		$modx->config['modx_charset']
	);
}

//Parse Markdown
if (isset($parseMarkdown)){
	$parsedown = new Parsedown();
	
	if ($parseMarkdown == 'line'){
		$inputString = $parsedown->line($inputString);
	}else{
		$inputString = $parsedown->text($inputString);
	}
}


//Typography
if (
	isset($typography) &&
	$typography == '1'
){
	$inputString = $modx->runSnippet(
		'ddTypograph',
		array_merge(
			(
				isset($typography_params) ?
				ddTools::encodedStringToArray($typography_params) :
				[]
			),
			[
				'text' => $inputString
			]
		)
	);
}

//Strip HTML and PHP tags from a string
if (
	isset($stripTags) &&
	$stripTags == '1'
){
	if (
		isset($stripTags_allowed) &&
		strlen(trim($stripTags_allowed)) > 0
	){
		$inputString = strip_tags(
			$inputString,
			$stripTags_allowed
		);
	}else{
		$inputString = strip_tags($inputString);
	}
}

//Convert special characters to HTML entities
if (
	isset($specialCharsToHTMLEntities) &&
	$specialCharsToHTMLEntities == '1'
){
	$inputString = htmlspecialchars($inputString);
}

//Escape special characters for JS
if (
	isset($escapeForJS) &&
	$escapeForJS == '1'
){
	$inputString = ddTools::escapeForJS($inputString);
}

//URL-encode according to RFC 3986
if (
	isset($URLEncode) &&
	$URLEncode == '1'
){
	$inputString = rawurlencode($inputString);
}

return $inputString;
?>