# (MODX)EvolutionCMS.snippets.ddStringTools changelog


## Версия 2.3 (2025-04-06)

* \+ Tools → Numberer: Новый инструмент для преобразования и форматирования чисел (см. README → Примеры).
* \* README → Примеры: Для всех примеров используется HJSON.


## Версия 2.2 (2024-11-05)

* \+ Tools → Preg replacer → Параметры → `tools->pregReplacer->pattern`: По умолчанию используется `/` + `/u`, но сейчас можно использовать свои кастомные модификаторы.


## Версия 2.1 (2023-08-22)

* \+ Параметры → `tools->typographer->optAlign_useClasses`: Новый параметр. Позволяет использовать CSS-классы вместо inline-стилей для оптического выравнивания (`<span class="oa_comma_b">` вместо `<span style="margin-right:-0.2em;">`).
* \* `\ddTools::getTpl` используется вместо `$modx->getTpl` (стало чуть меньше багов).
* \+ Composer.json → `autoload`.
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.60.
* \* Внимание! Требуется (MODX)EvolutionCMS.snippets.ddTypograph >= 2.6 (если используется параметр `tools->typographer`).


## Версия 2.0 (2021-04-15)

* \* Внимание! Нарушена обратная совместимость.
* \* Внимание! Требуется PHP >= 5.6.
* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.48.2.
* \* Внимание! Требуется (MODX)EvolutionCMS.snippets.ddTypograph >= 2.5.
* \- Следующие устаревшие параметры больше не поддерживаются (используйте параметр `tools` вместо них):
	* \- `specialCharsToHTMLEntities`.
	* \- `removePlaceholders`.
	* \- `escapeForJS`.
	* \- `URLEncode`.
	* \- `toUppercase`.
	* \- `toLowercase`.
	* \- `parseMarkdown`.
	* \- `typography`.
	* \- `typography_params`.
	* \- `stripTags`.
	* \- `stripTags_allowed`.
* \+ Параметры → `tools`: Также может быть задан, как HJSON.
* \+ Запустить сниппет без DB и eval можно через `\DDTools\Snippet::runSnippet` (см. примеры в README).
* \+ `\ddStringTools\Snippet`: Новый класс. Весь код сниппета перенесён туда.
* \+ `\ddStringTools\Tool\Tplparser\Tool::modify_exec`: Менее хрупкий код, теперь плейсхолдеры могут быть как массивом, так и объектом.
* \* `\ddStringTools\Tool\Typographer\Tool::modify_exec`:
	* \* `\DDTools\Snippet::runSnippet` используется вместо  `$modx->runSnippet` для запуска сниппета `ddTypograph` без DB и eval.
	* \* Менее хрупкий код, `\DDTools\ObjectTools::extend` используется вместо `array_merge`.
* \* README:
	* \+ Ссылки → Packagist.
	* \* Документация:
		* \+ Установка → Используя (MODX)EvolutionCMS.libraries.ddInstaller.
		* \* Описание параметров: Улучшения текста.
* \+ README_ru.
* \+ Composer.json → `support`.


## Версия 1.7 (2020-06-22)

* \+ Добавлена возможность замены по регулярному выражению (см. README):
	* \+ `ddStringTools\Tool\Pregreplacer\Tool`.
	* \+ Сниппет → Параметры:
		* \+ `tools->pregReplacer`: Новый параметр.
		* \+ `tools->pregReplacer->pattern`: Новый параметр.
		* \+ `tools->pregReplacer->replacement`: Новый параметр.


## Версия 1.6 (2020-06-03)

* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.38.1.
* \+ Параметры → `inputString`: Также может быть задан как PHP объект или массив (например, при вызовах через `$modx->runSnippet`). В этом случае, сначала будет преобразован в JSON.
* \* Небольшой рефакторинг.
* \+ README:
	* \+ Документация → Примеры → Вызов через `$modx->runSnippet`.
	* \- Home page.
	* \+ Ссыдки.
* \+ CHANGELOG: Улучшения стиля и текста.
* \+ CHANGELOG_ru.
* \* Composer.json:
	* \+ `homepage`.
	* \+ `authors`.
	* \* `require`:
		* \* `dd/evolutioncms-libraries-ddtools`: Переименовано из `dd/modxevo-library-ddtools`.
		* \* `dd/evolutioncms-snippets-ddtypograph`: Переименовано из `dd/modxevo-snippet-ddtypograph`.


## Версия 1.5.2 (2020-05-07)

* \* Параметры → `tools->charEscaper->lineBreaks`: Переносы строку будут заменены на `\r\n` вместо пробела.
* \* Небольшой рефакторинг.


## Версия 1.5.1 (2020-05-07)

* \* Сниппет: Инструмент не будет применяться к пустой строке.


## Версия 1.5 (2020-05-07)

* \* Внимание! Требуется (MODX)EvolutionCMS.libraries.ddTools >= 0.35.
* \* Новая структура сниппета (см. README):
	* \+ Добавлена возможность использования нескольких инструментов одновременно в нужном порядке.
	* \- Следующие параметры удалены (с сохранением обратной совместимости):
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
	* \+ Следующие параметры добавлены:
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
* \+ Сниппет: Добавлены следующие параметры (см. README):
	* \+ `tools->charEscaper->backslashes`.
	* \+ `tools->charEscaper->lineBreaks`.
	* \+ `tools->charEscaper->tabs`.
	* \+ `tools->charEscaper->modxPlaceholders`.
	* \+ `tools->charEscaper->quotes`.
	* \+ `tools->tplParser`.
	* \+ `tools->tplParser->tpl`.
	* \+ `tools->tplParser->placeholders`.
* \* Composer.json: Исправлен формат версий.


## Версия 1.4 (2020-04-19)

* \+ Добавлена возможность удалять плейсхолдеры вида `[+placeholder+]`.
* \* Рефакторинг, метод `$modx->getConfig` используется вместо прямого обращения к свойству `$modx->config`.
* \* README:
	* \* Изменения стиля.
	* \* Документация → Описание параметров: Небольшое изменения порядка.
* \+ Composer.json → `require`.


## Версия 1.3 (2019-10-20)

* \* Внимание! Требуется EvolutionCMS.libraries.ddTools >= 0.27 (потому что не тестировался с более ранними версиями).
* \* Внимание! Требуется EvolutionCMS.snippets.ddTypograph >= 2.4 (если используется параметр `typography`).
* \+ Добавлена возможность типографирования текста (см. параметр `typography`).
* \+ README → Документация:
	* \+ Установка.
	* \+ Описание параметров.
	* \+ Примеры.
* \+ Composer.json.


## Версия 1.2 (2019-08-09)

* \+ Добавлена возможность парсинга Markdown в HTML. (см. параметр `parseMarkdown`).


## Версия 1.1.1 (2017-08-30)

* \* Сниппет теперь совместим с кодировкой UTF-8.


## Версия 1.1 (2017-02-25)

* \+ Добавлена возможность преобразовывать символы в нижний или верхний регистр (см. параметры `toLowercase` и `toUppercase`).


## Версия 1.0 (2016-12-30)

* \+ Первый релиз.


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />
<style>ul{list-style:none;}</style>