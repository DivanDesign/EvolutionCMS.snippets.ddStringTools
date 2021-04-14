<?php
/**
 * ddStringTools
 * @version 2.0 (2021-04-15)
 * 
 * @see README.md
 * 
 * @copyright 2016–2021 DD Group {@link https://DivanDesign.biz }
 */

//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

return \DDTools\Snippet::runSnippet([
	'name' => 'ddStringTools',
	'params' => $params
]);
?>