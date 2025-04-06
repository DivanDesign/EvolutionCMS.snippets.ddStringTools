<?php
/**
 * ddStringTools
 * @version 2.3 (2025-04-06)
 * 
 * @see README.md
 * 
 * @link https://code.divandesign.ru/modx/ddstringtools
 * 
 * @copyright 2016–2025 Ronef {@link https://Ronef.me }
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