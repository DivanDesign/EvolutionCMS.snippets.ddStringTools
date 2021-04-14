<?php
/**
 * ddStringTools
 * @version 1.7 (2020-06-22)
 * 
 * @see README.md
 * 
 * @copyright 2016–2020 DD Group {@link http://DivanDesign.biz }
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