# (MODX)EvolutionCMS.snippets.ddStringTools changelog


## Version 1.6 (2020-06-03)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.38.1 is required.
* \+ Parameters → `inputString`: Can also be set as a PHP object or array (e. g. for calls through `$modx->runSnippet`). In this case, it will be converted to JSON first.
* \* Small refactoring.
* \+ README:
	* \+ Documentation → Examples → Call through `$modx->runSnippet`.
	* \- Home page.
	* \+ Links.
* \+ CHANGELOG: Style and text improvements.
* \+ CHANGELOG_ru.
* \* Composer.json:
	* \+ `homepage`.
	* \+ `authors`.
	* \* `require`:
		* \* `dd/evolutioncms-libraries-ddtools`: Renamed from `dd/modxevo-library-ddtools`.
		* \* `dd/evolutioncms-snippets-ddtypograph`: Renamed from `dd/modxevo-snippet-ddtypograph`.


## Version 1.5.2 (2020-05-07)
* \* Parameters → `tools->charEscaper->lineBreaks`: Line breaks will be replaced to `\r\n` instead of space.
* \* Small refactoring.


## Version 1.5.1 (2020-05-07)
* \* Snippet: A tool will not be applied to an empty string.


## Version 1.5 (2020-05-07)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.35 is required.
* \* The new snippet structure (see README):
	* \+ Added the ability to use multiple tools together with the required order.
	* \- The following parameters were removed (with backward compatibility):
		* \- `toLowercase`.
		* \- `toUppercase`.
		* \- `parseMarkdown`.
		* \- `typography`.
		* \- `typography_params`.
		* \- `stripTags`.
		* \- `stripTags_allowed`.
		* \- `specialCharsToHTMLEntities`.
		* \- `removePlaceholders`.
		* \- `escapeForJS`.
		* \- `URLEncode`.
	* \+ The following parameters were added:
		* \+ `tools`.
		* \+ `tools->caseConverter`.
		* \+ `tools->caseConverter->toLower`.
		* \+ `tools->caseConverter->toUpper`.
		* \+ `tools->markdownParser`.
		* \+ `tools->markdownParser->parseInline`.
		* \+ `tools->typographer`.
		* \+ `tools->typographer->optAlign`.
		* \+ `tools->typographer->text_paragraphs`.
		* \+ `tools->typographer->text_autoLinks`.
		* \+ `tools->typographer->etc_unicodeConvert`.
		* \+ `tools->typographer->noTags`.
		* \+ `tools->typographer->excludeTags`.
		* \+ `tools->tagRemover`.
		* \+ `tools->tagRemover->allowed`.
		* \+ `tools->specialCharConverter`.
		* \+ `tools->charEscaper`.
		* \+ `tools->urlEncoder`.
		* \+ `tools->placeholderRemover`.
* \+ Snippet: The following parameters added (see README):
	* \+ `tools->charEscaper->backslashes`.
	* \+ `tools->charEscaper->lineBreaks`.
	* \+ `tools->charEscaper->tabs`.
	* \+ `tools->charEscaper->modxPlaceholders`.
	* \+ `tools->charEscaper->quotes`.
	* \+ `tools->tplParser`.
	* \+ `tools->tplParser->tpl`.
	* \+ `tools->tplParser->placeholders`.
* \* Composer.json: Fixed versions format.


## Version 1.4 (2020-04-19)
* \+ Added the ability to remove placeholders like `[+placeholder+]`.
* \* Refactoring, the `$modx->getConfig` method is used instead of the `$modx->config` field.
* \* README:
	* \* Style changes.
	* \* Documentation → Parameters description: Small order changes.
* \+ Composer.json → `require`.


## Version 1.3 (2019-10-20)
* \* Attention! (MODX)EvolutionCMS.libraries.ddTools >= 0.27 is required (because not tested in older versions).
* \* Attention! (MODX)EvolutionCMS.snippets.ddTypograph >= 2.4 is required if the `typography` parameter is used.
* \+ Added the ability to text typography (see the `typography` parameter).
* \+ README → Documentation:
	* \+ Installation instructions.
	* \+ Parameters description.
	* \+ Examples.
* \+ Composer.json.


## Version 1.2 (2019-08-09)
* \+ Added the ability to parse Markdown (see the `parseMarkdown` parameter).


## Version 1.1.1 (2017-08-30)
* \* Snippet now compatible with UTF-8 character encoding.


## Version 1.1 (2017-02-25)
* \+ Added the ability to convert characters to lowercase or to uppercase (see the `toLowercase` and `toUppercase` parameters).


## Version 1.0 (2016-12-30)
* \+ The first release.


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />
<style>ul{list-style:none;}</style>