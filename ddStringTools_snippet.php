<?php
/**
 * ddStringTools
 * @version 2.1 (2023-08-22)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.ru/modx/ddstringtools
 * 
 * @copyright 2016–2023 Ronef {@link https://Ronef.ru }
 */

// Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path')
	. 'assets/libs/ddTools/modx.ddtools.class.php'
);

return \DDTools\Snippet::runSnippet([
	'name' => 'ddStringTools',
	'params' => $params,
]);
?>