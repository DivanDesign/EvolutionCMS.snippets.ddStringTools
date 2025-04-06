# (MODX)EvolutionCMS.snippets.ddStringTools

Инструменты модификации строк.


## Использует

* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.ru/modx/ddtools) >= 0.60
* [(MODX)EvolutionCMS.snippets.ddtypograph](https://code.divandesign.ru/modx/ddtypograph) >= 2.6 (если используется параметр `tools->typographer`)
* [PHP.libraries.Parsedown](https://github.com/erusev/parsedown) >= 1.8.0-beta-7 (содержится в архиве)


## Установка


### Используя [(MODX)EvolutionCMS.libraries.ddInstaller](https://github.com/DivanDesign/EvolutionCMS.libraries.ddInstaller)

Просто вызовите следующий код в своих исходинках или модуле [Console](https://github.com/vanchelo/MODX-Evolution-Ajax-Console):

```php
// Подключение (MODX)EvolutionCMS.libraries.ddInstaller
require_once(
	$modx->getConfig('base_path')
	. 'assets/libs/ddInstaller/require.php'
);

// Установка (MODX)EvolutionCMS.snippets.ddStringTools
\DDInstaller::install([
	'url' => 'https://github.com/DivanDesign/EvolutionCMS.snippets.ddStringTools',
]);
```

* Если `ddStringTools` отсутствует на вашем сайте, `ddInstaller` просто установит его.
* Если `ddStringTools` уже есть на вашем сайте, `ddInstaller` проверит его версию и обновит, если нужно. 


### Вручную


#### 1. Элементы → Сниппеты: Создайте новый сниппет со следующими параметрами

1. Название сниппета: `ddStringTools`.
2. Описание: `<b>2.3</b> Инструменты модификации строк.`.
3. Категория: `Core`.
4. Анализировать DocBlock: `no`.
5. Код сниппета (php): Вставьте содержимое файла `ddStringTools_snippet.php` из архива.


#### 2. Элементы → Управление файлами

1. Создайте новую папку `assets/snippets/ddStringTools/`.
2. Извлеките содержимое архива в неё (кроме файла `ddStringTools_snippet.php`).


## Описание параметров

* `inputString`
	* Описание: Исходная строка.
	* Допустимые значения:
		* `string`
		* Исходная строка также может быть задана, как нативный PHP объект или массив (например, для вызовов через `$modx->runSnippet`). В этом случае она сначала будет преобразована в JSON.
			* `object`
			* `array`
	* Значение по умолчанию: `''`
	
* `tools`
	* Описание: Список инструментов, которые будут применены к `inputString`. Инструменты будут вызваны в соответствии с указанным порядком.
	* Допустимые значения:
		* `stringJsonObject` — в виде [JSON](https://ru.wikipedia.org/wiki/JSON)
		* `stringHjsonObject` — в виде [HJSON](https://hjson.github.io/)
		* `stringQueryFormatted` — в виде [Query string](https://en.wikipedia.org/wiki/Query_string)
		* Также может быть задан, как нативный PHP объект или массив (например, для вызовов через `$modx->runSnippet`).
			* `arrayAssociative`
			* `object`
	* Значение по умолчанию: `'{}'`
	
* `tools->{$toolName}`
	* Описание: Инструмент, где ключ — имя инструмента, а значение — параметры инструмента.
		* Имена инструментов регистронезависимы (следующие имена равны: `caseConverter`, `Caseconverter`, `caseconverter` и т. п.).
	* Допустимые значения:
		* `object` — объект с параметрами инстумента (см. ниже)
		* `boolean` — для простых инструментов без параметров или если вам подходят параметры по умолчанию (если это возможно), просто передайте `true`
	* Значение по умолчанию: —.


### Case converter

* `tools->caseConverter`
	* Описание: Изменяет регистр символов в строке. Юникод поддерживается.
	* Допустимые значения: `object`
	* Значение по умолчанию: —.
	
* `tools->caseConverter->toLower`
	* Описание: Преобразовать строку к нижнему регистру.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`
	
* `tools->caseConverter->toUpper`
	* Описание: Преобразовать строку к верхнему регистру.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`


### Markdown parser

* `tools->markdownParser`
	* Описание: Преобразует Markdown в HTML используя библиотеку Parsedown.
	* Допустимые значения:
		* `boolean` — если нужно преобразование с параметрами по умолчанию, просто передайте `true`
		* `object` — или объект с параметрами (см. ниже)
	* Значение по умолчанию: `false`
	
* `tools->markdownParser->parseInline`
	* Описание: Парсить только встроенные элементы.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`


### Typographer

* `tools->typographer`
	* Описание: Типографирование текста при помощи EvolutionCMS.snippets.ddTypograph.
		* Параметры передаются в EvolutionCMS.snippets.ddTypograph.
		* Больше информации в его [документации](https://code.divandesign.ru/modx/ddtypograph).
	* Допустимые значения:
		* `boolean` — если нужно типографирование с параметрами по умолчанию, просто передайте `true`
		* `object` — или объект с параметрами (см. ниже)
	* Значение по умолчанию: `false`
	
* `tools->typographer->optAlign`
	* Описание: Оптическое выравнивание (висячая пунктуация).
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`
	
* `tools->typographer->optAlign_useClasses`
	* Описание: Использовать CSS-классы вместо inline-стилей для оптического выравнивания (`<span class="oa_comma_b">` вместо `<span style="margin-right:-0.2em;">`).
		* Если параметр включен, не забудьте прописать на своём сайте следующие правила CSS:  
			```css
			.oa_obracket_sp_s {margin-right:0.3em;}
			.oa_obracket_sp_b {margin-left:-0.3em;}
			.oa_obracket_nl_b {margin-left:-0.3em;}
			.oa_comma_b {margin-right:-0.2em;}
			.oa_comma_e {margin-left:0.2em;}
			.oa_oquote_nl {margin-left:-0.44em;}
			.oa_oqoute_sp_s {margin-right:0.44em;}
			.oa_oqoute_sp_q {margin-left:-0.44em;}
			```
	* Допустимые значения:
		* `0`
		* `1`
	* Значение по умолчанию: `0`
	
* `tools->typographer->text_paragraphs`
	* Описание: Простановка параграфов и переносов строк.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`
	
* `tools->typographer->text_autoLinks`
	* Описание: Выделение ссылок из текста (в том числе email).
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`
	
* `tools->typographer->etc_unicodeConvert`
	* Описание: Преобразовывать HTML-сущности в юникод (`—` вместо `&mdash;` и т. п.).
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
* `tools->typographer->noTags`
	* Описание: Не добавлять HTML-теги.
		* Бывают ситуации, когда использование HTML-тегов в тексте недопустимо (например, когда текст выводится в значение атрибута тега), для таких случаев и предназначен этот параметр.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`
	
* `tools->typographer->excludeTags`
	* Описание: HTML-теги, содержимое которых не будет типографироваться.
	* Допустимые значения: `stringCommaSeparated`
	* Значение по умолчанию: `'notg,code'`


### Tag remover

* `tools->tagRemover`
	* Описание: Удаляет HTML и PHP-теги из строки.
	* Допустимые значения:
		* `boolean` — если нужно удалить все теги, просто передайте `true`
		* `object` — или объект с параметрами (см. ниже)
	* Значение по умолчанию: `false`
	
* `tools->tagRemover->allowed`
	* Описание: Теги, которые не нужно удалять (например, `<p><div>`).
	* Допустимые значения: `string`
	* Значение по умолчанию: `''`


### Special char converter

* `tools->specialCharConverter`
	* Описание: Преобразовать специальные символы в HTML-сущности.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`


### Chars escaper (например, for JS)

* `tools->charEscaper`
	* Описание: Экранировать специальные символы для JS.
	* Допустимые значения:
		* `boolean` — если нужно экранировать с параметрами по умолчанию, просто передайте `true`
		* `object` — или объект с параметрами (см. ниже)
	* Значение по умолчанию: `false`
	
* `tools->charEscaper->backslashes`
	* Описание: Экранировать обратные слэши (`'\\'` будут заменены на `'\\\\'`).
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
* `tools->charEscaper->lineBreaks`
	* Описание: Экранировать переносы строк (`"\r\n"`, `"\r"`, `"\n"` будут заменены на `'\r\n'`).
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
* `tools->charEscaper->tabs`
	* Описание: Экранировать табуляторы (`'	'` (табуляторы) будут заменены на `' '` (пробелы)).
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
* `tools->charEscaper->modxPlaceholders`
	* Описание: Экранировать плейсхолдеры (MODX)EvolutionCMS (`'[+'` и `'+]'` будут заменены на `'\[\+'` и `'\+\]'`).
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
* `tools->charEscaper->quotes`
	* Описание: Экранировать кавычки (`"'"` и `'"'` будут заменены на `"\'"` и `'\"'`).
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`


### URL encoder

* `tools->urlEncoder`
	* Описание: URL-кодирование строки согласно RFC 3986.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`


### Placeholder remover

* `tools->placeholderRemover`
	* Описание: Удаляет плейсхолдеры вида `[+placeholder+]`.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`


### Preg replacer

* `tools->pregReplacer`
	* Описание: Выполняет поиск и замену по регулярному выражению.
	* Допустимые значения: `object`
	* Значение по умолчанию: —
	
* `tools->pregReplacer->pattern`
	* Описание: Искомый шаблон.
	* Допустимые значения: `string`
	* **Обязателен**
	
* `tools->pregReplacer->replacement`
	* Описание: Строка для замены
	* Допустимые значения: `string`
	* Значение по умолчанию: `''`


### Numberer

* `tools->numberer`
	* Описание: Преобразование и форматирование чисел.
	* Допустимые значения: `object`
	* Значение по умолчанию: —
	
* `tools->numberer->isFloatAllowed`
	* Описание: Разрешено ли число с плавающей точкой.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `true`
	
* `tools->numberer->decimalsNumber`
	* Описание: Количество знаков после запятой.
	* Допустимые значения:
		* `integer`
		* `0` — any
	* Значение по умолчанию: `0`
	
* `tools->numberer->isDecimalsFixed`
	* Описание: Позволяет форматировать число с использованием фиксированного количества знаков после запятой (например `10.00`) в соответствии с `tools->numberer->decimalsNumber`.
	* Допустимые значения: `boolean`
	* Значение по умолчанию: `false`
	
* `tools->numberer->thousandsSeparator`
	* Описание: Символ, используемый для разделения разрядов (например, `' '` для `1 234 567` или `','` для `1,234,567`).
	* Допустимые значения: `string`
	* Значение по умолчанию: `''`


### Tpl parser

* `tools->tplParser`
	* Описание: Сниппет получает содержимое чанка по имени и парсит его.
		* Если строка `inputString` пуста, вернётся не содержимое чанка, а просто пустая строка. 
	* Допустимые значения: `object`
	* Значение по умолчанию: —
	
* `tools->tplParser->tpl`
	* Описание: Имя чанка, либо код напрямую, начиная с `@CODE:`.
		* Доступные плейсхолдеры:
			* `[+snippetResult+]` — строка `inputString`, изменённая предыдущими инструментами
	* Допустимые значения:
		* `stringChunkName`
		* `string` — передавать код напрямую без чанка можно начиная значение с `@CODE:`
	* **Обязателен**
	
* `tools->tplParser->placeholders`
	* Описание: Дополнительные данные, которые будут переданы в шаблон `tools->tplParser->tpl`.  
		* Вложенные объекты и массивы также поддерживаются:
			* `{"someOne": "1", "someTwo": "test" }` => `[+someOne+], [+someTwo+]`.
			* `{"some": {"a": "one", "b": "two"} }` => `[+some.a+]`, `[+some.b+]`.
			* `{"some": ["one", "two"] }` => `[+some.0+]`, `[+some.1+]`.
	* Допустимые значения: `object`
	* Значение по умолчанию: —


## Примеры

Все примеры написаны с использованием [HJSON](https://hjson.github.io/), но вместо него можно также использвоать обычный JSON.


### Преобразовать строку к нижнему регистру (`tools->caseConverter->toLower`)

```
[[ddStringTools?
	&inputString=`Какая-то СТРОКА в РаЗнОМ регистре`
	&tools=`{
		caseConverter: {
			toLower: true
		}
	}`
]]
```

Вернёт:

```
какая-то строка в разном регистре
```


### Удалить HTML и PHP теги из строки (`tools->tagRemover`)


#### Удалить все теги полностью

```html
[[ddStringTools?
	&inputString=`<div class="someTrash"></div><p><b>Какой-то</b> <a href="#">там</a> <i>текст</i>.</p>`
	&tools=`{
		tagRemover: true
	}`
]]
```

Вернёт:

```html
какой-то там текст
```


#### Удалить все теги за исключением `<p>` и `<a>` (`tools->tagRemover->allowed`)

Если вы хотите сохранить какие-то теги, передайте объект со свойством `allowed` вместо `true`.

```html
[[ddStringTools?
	&inputString=`<div class="someTrash"></div><p><b>Какой-то</b> <a href="#">там</a> <i>текст</i>.</p>`
	&tools=`{
		tagRemover: {
			allowed: "<p><a>"
		}
	}`
]]
```

Вернёт:

```html
<p>Какой-то <a href="#">там</a> текст.</p>
```


### Преобразовать специальные символы в HTML-сущности (`tools->specialCharConverter`)

```html
[[ddStringTools?
	&inputString=`<p>Какой-то <a href="#">там</a> текст.</p>`
	&tools=`{
		specialCharConverter: true
	}`
]]
```

Вернёт:

```html
&lt;p&gt;Какой-то &lt;a href="#"&gt;там&lt;/a&gt; текст.&lt;/p&gt;
```


### URL-кодировать строку согласно RFC 3986 (`tools->urlEncoder`)

```
[[ddStringTools?
	&inputString=`tags[]=Maps&tags[]=URLs`
	&tools=`{
		urlEncoder: true
	}`
]]
```

Вернёт:

```
tags%5B%5D%3DMaps%26tags%5B%5D%3DURLs
```


### Экранировать специальные символы для JavaScript (`tools->charEscaper`)

```html
<script>
	$('body').append('[[ddStringTools?
		&inputString=`
			<p class="test">Какой-то <a href="#">там</a> текст.</p>
			<p>Новая строка.</p>
		`
		&tools=`{
			charEscaper: true
		}`
	]]');
<script>
```

Вернёт:

```html
<script>
	$('body').append('\r\n <p class=\"test\">Какой-то <a href=\"#\">там</a> текст.</p>\r\n <p>Новая строка.</p>\r\n ');
<script>
```


### Преобразовать Markdown в HTML (`tools->markdownParser`)

```
[[ddStringTools?
	&inputString=`
# Пример Markdown

Какой-то текст в _Markdown_.
	`
	&tools=`{
		markdownParser: true
	}`
]]
```

Вернёт:

```html
<h1>Пример Markdown</h1>
<p>Какой-то текст в <em>Markdown</em>.</p>
```


#### Парсить только встроенные элементы (`tools->markdownParser->parseInline`)

```
[[ddStringTools?
	&inputString=`Какой-то текст в _Markdown_.`
	&tools=`{
		"markdownParser": {
			"parseInline": true
		}
	}`
]]
```

Вернёт:

```html
Какой-то текст в <em>Markdown</em>.
```


### Типографировать текст (`tools->typographer`)


#### С оптическим выравниванием (`tools->typographer->optAlign`)

```html
[[ddStringTools?
	&inputString=`<p>Какой-то текст, содержащий "текст в кавычках".</p>`
	&tools=`{
		typographer: {
			optAlign: true
		}
	}`
]]
```

Вернёт:

```html
<p>Какой-то текст, содержащий<span style="margin-right:0.44em;"> </span><span style="margin-left:-0.44em;">«</span>текст в кавычках».</p>
```


#### Простой вызов с параметрами по умолчанию

```html
[[ddStringTools?
	&inputString=`Какой-то текст для типографирования.`
	&tools=`{
		typographer: true
	}`
]]
```


### Удалить плейсхолдеры вида `[+placeholder+]` (`tools->placeholderRemover`)

```html
[[ddStringTools?
	&inputString=`Какой-то [+thing+] с [+placeholder1+] и [+placeholder2+].`
	&tools=`{
		placeholderRemover: true
	}`
]]
```

Вернёт:

```html
Какой-то  с  и .
```


### Добавить суффикс в имя файла миниатюрки изображения (`tools->pregReplacer`)

```
[[ddStringTools?
	&inputString=`assets/images/someImage.png`
	&tools=`{
		pregReplacer: {
			pattern: (.*)(\.\D*)
			replacement: $1_50x50$2
		}
	}`
]]
```

Вернёт:

```
assets/images/someImage_50x50.png
```


### Numberer (`tools->numberer`)


#### Преобразование строки в целое число

```
[[ddStringTools?
	&inputString=`42.75`
	&tools=`{
		numberer: {
			isFloatAllowed: false
		}
	}`
]]
```

Возвращает: `42`


#### Преобразование строки в число с плавающей точкой с максимум 2 знаками после запятой

```
[[ddStringTools?
	&inputString=`42.7589`
	&tools=`{
		numberer: {
			decimalsNumber: 2
		}
	}`
]]
```

Возвращает: `'42.76'`


#### Форматирование цены товара с фиксированным количеством знаков после запятой

```
[[ddStringTools?
	&inputString=`1999`
	&tools=`{
		numberer: {
			decimalsNumber: 2
			isDecimalsFixed: true
		}
	}`
]]
```

Возвращает: `'1999.00'`


#### Форматирование большого числа с пробелом в качестве разделителя разрядов

```
[[ddStringTools?
	&inputString=`1234567`
	&tools=`{
		numberer: {
			thousandsSeparator: ' '
		}
	}`
]]
```

Возвращает: `'1 234 567'`


#### Форматирование цены с запятой в качестве разделителя разрядов и фиксированным количеством знаков после запятой

```
[[ddStringTools?
	&inputString=`1234567.891`
	&tools=`{
		numberer: {
			decimalsNumber: 2
			isDecimalsFixed: true
			thousandsSeparator: ','
		}
	}`
]]
```

Возвращает: `'1,234,567.89'`


#### Обработка строки с ценой, содержащей символ валюты, пробелы и другие недопустимые символы

```
[[ddStringTools?
	&inputString=`$1 234 000.56 lorem ipsum`
	&tools=`{
		numberer: true
	}`
]]
```

Возвращает: `'1234000.56'`


### Отпарсить чанк, передав плейсхолдеры (`tools->tplParser`)

```html
[[ddStringTools?
	&inputString=`Какой-то исходный текст.`
	&tools=`{
		"tplParser": {
			tpl:
				'''
				@CODE:[+before+]<p>[+snippetResult+]</p>[+after+]
				'''
			placeholders: {
				before:
					'''
					<p>Какое-то вступление.</p>
					'''
				after:
					'''
					<p>Какая-то концовка.</p>
					'''
			}
		}
	}`
]]
```

Вернёт:

```
<p>Какое-то вступление.</p><p>Какой-то исходный текст.</p><p>Какая-то концовка.</p>
```


### Использовать несколько инструментов вместе

```html
[[ddStringTools?
	&inputString=`<div class="someTrash"></div><p><b>Какой-то</b> <a href="#">там</a> <i>текст</i>. [+somePlaceholder+]</p>.`
	&tools=`{
		placeholderRemover: true
		typographer: true
		tagRemover: {
			allowed: "<p><a>"
		}
		caseConverter: {
			toLower: true
		}
		charEscaper: true
	}`
]]
```

Инструменты будут вызваны в соответствии с указанным порядком:

1. Сначала плейсхолдеры вида `[+somePlaceholder+]` будут удалены, затем
2. Текст будет типографирован,
3. Все HTML-теги за исключением `<p>` и `<a>` будут удалены, 
4. Текст будет преобразован к нижнему регистру,
5. И экранирован для JS.


### Передать `inputString` как массив через `$modx->runSnippet`

Исходная строка также может быть задана, как нативный PHP объект или массив (например, для вызовов через `$modx->runSnippet`).
В этом случае она сначала будет преобразована в JSON.

```php
$modx->runSnippet(
	'ddStringTools',
	[
		// Это массив, не строка
		'inputString' => [
			'someObjectField' => '[+somePlaceholder+], который должен быть удалён.',
			// И это тоже массив
			'otherObjectField' => [
				'deepField' => '[+плейсхолдеры+] будут удалены на любой глубине.',
			],
		],
		'tools' => [
			'placeholderRemover' => true,
		],
	]
);
```

Вернёт:

```json
{
	"someObjectField": ", который должен быть удалён.",
	"otherObjectField": {
		"deepField": " будут удалены на любой глубине."
	}
}
```


### Запустить сниппет через `\DDTools\Snippet::runSnippet` без DB и eval

```php
// Подключение (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path')
	. 'assets/libs/ddTools/modx.ddtools.class.php'
);

// Запуск (MODX)EvolutionCMS.snippets.ddStringTools
\DDTools\Snippet::runSnippet([
	'name' => 'ddStringTools',
	'params' => [
		'inputString' => '<div class="someTrash"></div><p><b>Какой-то</b> <a href="#">там</a> <i>текст</i>. [+somePlaceholder+]</p>.',
		// Параметр `tools` в этом случае может быть задан, как нативный PHP массив или объект
		'tools' => [
			'placeholderRemover' => true,
			'typographer' => true,
			'tagRemover' => [
				'allowed' => '<p><a>',
			],
			'caseConverter' => [
				'toLower' => true,
			],
			'charEscaper' => true,
		],
	],
]);
```


## Ссылки

* [Home page](https://code.divandesign.ru/modx/ddstringtools)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-snippets-ddstringtools)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.snippets.ddStringTools)


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />