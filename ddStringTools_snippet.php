<?php
/**
 * ddStringTools
 * @version 1.1.1 (2017-08-30)
 * 
 * @desc Tools for modifying strings.
 * 
 * @uses PHP >= 5.4.
 * @uses MODXEvo.library.ddTools >= 0.16.2.
 * 
 * @param $inputString {string} — The input string. Default: ''.
 * @param $toLowercase {0|1} — Make a string lowercase. Default: 0.
 * @param $toUppercase {0|1} — Make a string uppercase. Default: 0.
 * @param $stripTags {0|1} — Strip HTML and PHP tags from a string. Default: 0.
 * @param $stripTags_allowed {string} — Use the parameter to specify tags which should not be stripped. E. g.: '<p><div>'. Default: ''.
 * @param $specialCharsToHTMLEntities {0|1} — Convert special characters to HTML entities. Default: 0.
 * @param $URLEncode {0|1} — URL-encode according to RFC 3986. Default: 0.
 * @param $escapeForJS {0|1} — Escape special characters for JS. Default: 0.
 * @parem $parseMarkdown {'text'|'line'} — Parse Markdown use Parsedown library. Default: —.
 * 
 * @link http://code.divandesign.biz/modx/ddstringtools/1.1.1
 * 
 * @copyright 2016–2017 DivanDesign {@link http://www.DivanDesign.biz }
 */

//Include MODXEvo.library.ddTools
require_once $modx->getConfig('base_path').'assets/libs/ddTools/modx.ddtools.class.php';
//Inclide Parsedown 
require_once $modx->getConfig('base_path').'assets/snippets/ddStringTools/Parsedown.php';

if (!isset($inputString)){
	$inputString = '';
}

//Make a string lowercase
if (
	isset($toLowercase) &&
	$toLowercase == '1'
){
	$inputString = mb_strtolower($inputString, $modx->config['modx_charset']);
}

//Make a string uppercase
if (
	isset($toUppercase) &&
	$toUppercase == '1'
){
	$inputString = mb_strtoupper($inputString, $modx->config['modx_charset']);
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
		$inputString = strip_tags($inputString, $stripTags_allowed);
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

//Parse Markdown
if (isset($parseMarkdown)){
	$Parsedown = new Parsedown();
	if ($parseMarkdown == 'text'){
		$inputString = $Parsedown->text($inputString);
	} elseif ($parseMarkdown == 'line') {
		$inputString = $Parsedown->line($inputString);
	}
}

return $inputString;
?>