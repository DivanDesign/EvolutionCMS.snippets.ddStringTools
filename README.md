# (MODX)EvolutionCMS.snippets.ddStringTools

Tools for modifying strings.


## Requires

* PHP >= 5.6
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.ru/modx/ddtools) >= 0.60
* [(MODX)EvolutionCMS.snippets.ddtypograph](https://code.divandesign.ru/modx/ddtypograph) >= 2.6 (if the `tools->typographer` parameter is used)
* [PHP.libraries.Parsedown](https://github.com/erusev/parsedown) >= 1.8.0-beta-7 (contains in archive)


## Installation


### Manually


#### 1. Elements → Snippets: Create a new snippet with the following data

1. Snippet name: `ddStringTools`.
2. Description: `<b>2.0</b> Tools for modifying strings.`.
3. Category: `Core`.
4. Parse DocBlock: `no`.
5. Snippet code (php): Insert content of the `ddStringTools_snippet.php` file from the archive.


#### 2. Elements → Manage Files:

1. Create a new folder `assets/snippets/ddStringTools/`.
2. Extract the archive to the folder (except `ddStringTools_snippet.php`).


### Using [(MODX)EvolutionCMS.libraries.ddInstaller](https://github.com/DivanDesign/EvolutionCMS.libraries.ddInstaller)

Just run the following PHP code in your sources or [Console](https://github.com/vanchelo/MODX-Evolution-Ajax-Console):

```php
//Include (MODX)EvolutionCMS.libraries.ddInstaller
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddInstaller/require.php'
);

//Install (MODX)EvolutionCMS.snippets.ddStringTools
\DDInstaller::install([
	'url' => 'https://github.com/DivanDesign/EvolutionCMS.snippets.ddStringTools',
	'type' => 'snippet'
]);
```

* If `ddStringTools` is not exist on your site, `ddInstaller` will just install it.
* If `ddStringTools` is already exist on your site, `ddInstaller` will check it version and update it if needed.


## Parameters description

* `inputString`
	* Desctription: The input string.
	* Valid values:
		* `string`
		* The input string can also be set as a PHP object or array (e. g. for calls through `$modx->runSnippet`). In this case, it will be converted to JSON first.
			* `object`
			* `array`
	* Default value: `''`
	
* `tools`
	* Desctription: List of string tools to be applied to `inputString`. Tools are called in accordance with the specified order.
	* Valid values:
		* `stirngJsonObject` — as [JSON](https://en.wikipedia.org/wiki/JSON)
		* `stringHjsonObject` — as [HJSON](https://hjson.github.io/)
		* `stringQueryFormated` — as [Query string](https://en.wikipedia.org/wiki/Query_string)
		* It can also be set as a PHP object or array (e. g. for calls through `$modx->runSnippet`).
			* `arrayAssociative`
			* `object`
	* Default value: `'{}'`
	
* `tools->{$toolName}`
	* Desctription: A tool, when the key is the tool name and the value is the tool parameters.  
		Tool names are case insensitive (the following names are equal: `caseConverter`, `Caseconverter`, `caseconverter`, etc).
	* Valid values:
		* `object` — an object with tool parameters (see below)
		* `boolean` — for simple tools without parameters or if you need to use default parameters (if possible), just pass `true`
	* Default value: —.


### Case converter

* `tools->caseConverter`
	* Desctription: Perform case folding on a string. Unicode is supported.
	* Valid values: `object`
	* Default value: —.
	
* `tools->caseConverter->toLower`
	* Desctription: Make a string lowercase.
	* Valid values: `boolean`
	* Default value: `false`
	
* `tools->caseConverter->toUpper`
	* Desctription: Make a string uppercase.
	* Valid values: `boolean`
	* Default value: `false`


### Markdown parser

* `tools->markdownParser`
	* Desctription: Parse Markdown using Parsedown library.
	* Valid values:
		* `boolean` — if you need to parse with default params, just pass `true`
		* `object` — or an object with parameters (see below)
	* Default value: `false`
	
* `tools->markdownParser->parseInline`
	* Desctription: Parse only inline elements.
	* Valid values: `boolean`
	* Default value: `false`


### Typographer

* `tools->typographer`
	* Desctription: Typography text using EvolutionCMS.snippets.ddTypograph.  
		Parameters have to be passed to EvolutionCMS.snippets.ddTypograph.
		More info in its [documentation](https://code.divandesign.ru/modx/ddtypograph).
	* Valid values:
		* `boolean` — if you need to typography with default params, just pass `true`
		* `object` — or an object with parameters (see below)
	* Default value: `false`
	
* `tools->typographer->optAlign`
	* Desctription: Optical alignment (hanging punctuation).
	* Valid values: `boolean`
	* Default value: `false`
	
* `tools->typographer->optAlign_useClasses`
	* Desctription: Use CSS classes instead of inline styles for optical alignment (`<span class="oa_comma_b">` instead of `<span style="margin-right:-0.2em;">`).  
		If the parameter is enabled, don't forget to specify the following CSS rules on your site:
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
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `tools->typographer->text_paragraphs`
	* Desctription: Section signs and line breaks insertion.
	* Valid values: `boolean`
	* Default value: `false`
	
* `tools->typographer->text_autoLinks`
	* Desctription: Marking links (including email ones).
	* Valid values: `boolean`
	* Default value: `false`
	
* `tools->typographer->etc_unicodeConvert`
	* Desctription: Convert HTML entities into Unicode (`—` instead of `&mdash;`, etc).
	* Valid values: `boolean`
	* Default value: `true`
	
* `tools->typographer->noTags`
	* Desctription: Whether HTML element insertion is allowed or not.  
		There are cases when using tags causes the text to be invalid, for example, using the snippet inside of an HTML attribute.
	* Valid values: `boolean`
	* Default value: `false`
	
* `tools->typographer->excludeTags`
	* Desctription: HTML tags which content will be ignored by snippet.
	* Valid values: `stringCommaSeparated`
	* Default value: `'notg,code'`


### Tag remover

* `tools->tagRemover`
	* Desctription: Strip HTML and PHP tags from a string.
	* Valid values:
		* `boolean` — if you need to remove all tags, just pass `true`
		* `object` — or an object with parameters (see below)
	* Default value: `false`
	
* `tools->tagRemover->allowed`
	* Desctription: Use the parameter to specify tags which should not be stripped (e. g. `<p><div>`).
	* Valid values: `string`
	* Default value: `''`


### Special char converter

* `tools->specialCharConverter`
	* Desctription: Convert special characters to HTML entities.
	* Valid values: `boolean`
	* Default value: `false`


### Chars escaper (e. g. for JS)

* `tools->charEscaper`
	* Desctription: Escape special characters for JS.
	* Valid values:
		* `boolean` — if you need to escape with default params, just pass `true`
		* `object` — or an object with parameters (see below)
	* Default value: `false`
	
* `tools->charEscaper->backslashes`
	* Desctription: Escape backslashes (`'\\'` will be replaced to `'\\\\'`).
	* Valid values: `boolean`
	* Default value: `true`
	
* `tools->charEscaper->lineBreaks`
	* Desctription: Escape line breaks (`"\r\n"`, `"\r"`, `"\n"` will be replaced to `'\r\n'`).
	* Valid values: `boolean`
	* Default value: `true`
	
* `tools->charEscaper->tabs`
	* Desctription: Escape tabs (`'	'` (tab)  will be replaced to `' '` (space)).
	* Valid values: `boolean`
	* Default value: `true`
	
* `tools->charEscaper->modxPlaceholders`
	* Desctription: Escape (MODX)EvolutionCMS placeholders (`'[+'` and `'+]'` will be replaced to `'\[\+'` and `'\+\]'`).
	* Valid values: `boolean`
	* Default value: `true`
	
* `tools->charEscaper->quotes`
	* Desctription: Escape quotes (`"'"` and `'"'` will be replaced to `"\'"` and `'\"'`).
	* Valid values: `boolean`
	* Default value: `true`


### URL encoder

* `tools->urlEncoder`
	* Desctription: URL-encode according to RFC 3986.
	* Valid values: `boolean`
	* Default value: `false`


### Placeholder remover

* `tools->placeholderRemover`
	* Desctription: Remove placeholders like `[+placeholder+]`.
	* Valid values: `boolean`
	* Default value: `false`


### Preg replacer

* `tools->pregReplacer`
	* Desctription: Perform a regular expression search and replace.
	* Valid values: `object`
	* Default value: —
	
* `tools->pregReplacer->pattern`
	* Desctription: The pattern to search for.
	* Valid values: `string`
	* **Required**
	
* `tools->pregReplacer->replacement`
	* Desctription: The string to replace.
	* Valid values: `string`
	* Default value: `''`


### Tpl parser

* `tools->tplParser`
	* Desctription: Gets the chunk contents by its name and parse it.  
		If `inputString` is empty, the chunk content will not be returned, just an empty string.
	* Valid values: `object`
	* Default value: —
	
* `tools->tplParser->tpl`
	* Desctription: Chunk name or code via `@CODE:` prefix.  
		Available placeholders:
		* `[+snippetResult+]` — the `inputString` modified by previous tools
	* Valid values:
		* `stringChunkName`
		* `string` — use inline templates starting with `@CODE:`
	* **Required**
	
* `tools->tplParser->placeholders`
	* Desctription:
		Additional data has to be passed into the `tools->tplParser->tpl`.  
		Nested objects and arrays are supported too:
		* `{"someOne": "1", "someTwo": "test" }` => `[+someOne+], [+someTwo+]`.
		* `{"some": {"a": "one", "b": "two"} }` => `[+some.a+]`, `[+some.b+]`.
		* `{"some": ["one", "two"] }` => `[+some.0+]`, `[+some.1+]`.
	* Valid values: `object`
	* Default value: —


## Examples


### Convert characters to lowercase (`tools->caseConverter->toLower`)

```
[[ddStringTools?
	&inputString=`Some STRING with DiFFerEnt case`
	&tools=`{
		"caseConverter": {
			"toLower": true
		}
	}`
]]
```

Returns:

```
some string with different case
```


### Strip HTML and PHP tags from a string (`tools->tagRemover`)


#### Remove all tags completely

```html
[[ddStringTools?
	&inputString=`<div class="someTrash"></div><p><b>Some</b> <a href="#">sample</a> <i>text</i>.</p>`
	&tools=`{
		"tagRemover": true
	}`
]]
```

Returns:

```html
Some sample text.
```


#### Remove all tags except `<p>` and `<a>` (`tools->tagRemover->allowed`)

If you want to preserve some tags, pass an object with property `allowed` instead of `true`.

```html
[[ddStringTools?
	&inputString=`<div class="someTrash"></div><p><b>Some</b> <a href="#">sample</a> <i>text</i>.</p>`
	&tools=`{
		"tagRemover": {
			"allowed": "<p><a>"
		}
	}`
]]
```

Returns:

```html
<p>Some <a href="#">sample</a> text.</p>
```


### Convert special characters to HTML entities (`tools->specialCharConverter`)

```html
[[ddStringTools?
	&inputString=`<p>Some <a href="#">sample</a> text.</p>`
	&tools=`{
		"specialCharConverter": true
	}`
]]
```

Returns:

```html
&lt;p&gt;Some &lt;a href="#"&gt;sample&lt;/a&gt; text.&lt;/p&gt;
```


### URL-encode according to RFC 3986 (`tools->urlEncoder`)

```
[[ddStringTools?
	&inputString=`tags[]=Maps&tags[]=URLs`
	&tools=`{
		"urlEncoder": true
	}`
]]
```

Returns:

```
tags%5B%5D%3DMaps%26tags%5B%5D%3DURLs
```


### Escape special characters for JavaScript (`tools->charEscaper`)

```html
<script>
	$('body').append('[[ddStringTools?
		&inputString=`
			<p class="test">Some <a href="#">sample</a> text.</p>
			<p>New line.</p>
		`
		&tools=`{
			"charEscaper": true
		}`
	]]');
<script>
```

Returns:

```html
<script>
	$('body').append('\r\n <p class=\"test\">Some <a href=\"#\">sample</a> text.</p>\r\n <p>New line.</p>\r\n ');
<script>
```


### Convert Markdown to HTML (`tools->markdownParser`)

```
[[ddStringTools?
	&inputString=`
# Markdown example

Some text in _Markdown_.
	`
	&tools=`{
		"markdownParser": true
	}`
]]
```

Returns:

```html
<h1>Markdown example</h1>
<p>Some text in <em>Markdown</em>.</p>
```


#### You can also parse inline markdown only (`tools->markdownParser->parseInline`)

```
[[ddStringTools?
	&inputString=`Some text in _Markdown_.`
	&tools=`{
		"markdownParser": {
			"parseInline": true
		}
	}`
]]
```

Returns:

```html
Some text in <em>Markdown</em>.
```


### Typography text (`tools->typographer`)


#### With optical alignment (`tools->typographer->optAlign`)

```html
[[ddStringTools?
	&inputString=`<p>Some text containing "quoted" text.</p>`
	&tools=`{
		"typographer": {
			"optAlign": true
		}
	}`
]]
```

Returns:

```html
<p>Some text containing<span style="margin-right:0.44em;"> </span><span style="margin-left:-0.44em;">“</span>quoted” text.</p>
```


#### Simple call with default parameters

```html
[[ddStringTools?
	&inputString=`Some text for typography.`
	&tools=`{
		"typographer": true
	}`
]]
```


### Remove placeholders like `[+placeholder+]` (`tools->placeholderRemover`)

```html
[[ddStringTools?
	&inputString=`Some [+thing+] with [+placeholder1+] and [+placeholder2+].`
	&tools=`{
		"placeholderRemover": true
	}`
]]
```

Returns:

```html
Some  with  and .
```


### Thumbnail suffix (`tools->pregReplacer`)

```
[[ddStringTools?
	&inputString=`assets/images/someImage.png`
	&tools=`{
		"pregReplacer": {
			"pattern": "(.*)(\.\D*)",
			"replacement": "$1_50x50$2"
		}
	}`
]]
```

Returns:

```
assets/images/someImage_50x50.png
```


### Get the chunk content and pass some placeholders (`tools->tplParser`)

```html
[[ddStringTools?
	&inputString=`Some input string text.`
	&tools=`{
		"tplParser": {
			"tpl": "@CODE:[+before+]<p>[+snippetResult+]</p>[+after+]",
			"placeholders": {
				"before": "<p>Some start text.</p>",
				"after": "<p>Some end text.</p>"
			}
		}
	}`
]]
```

Returns:

```
<p>Some start text.</p><p>Some input string text.</p><p>Some end text.</p>
```


### Use multiple tools together

```html
[[ddStringTools?
	&inputString=`<div class="someTrash"></div><p><b>Some</b> <a href="#">sample</a> <i>text</i>. [+somePlaceholder+]</p>.`
	&tools=`{
		"placeholderRemover": true,
		"typographer": true,
		"tagRemover": {
			"allowed": "<p><a>"
		},
		"caseConverter": {
			"toLower": true
		},
		"charEscaper": true
	}`
]]
```

Tools are called in accordance with the specified order:

1. First placeholders like `[+somePlaceholder+]` will removed, then
2. Text will typographied,
3. All HTML tags except `<p>` and `<a>` will removed, 
4. Text will converted to lowercase,
5. And escaped for JS.


### Pass `inputString` as an array through `$modx->runSnippet`

The input string can also be set as a PHP object or array (e. g. for calls through `$modx->runSnippet`).
In this case, it will be converted to JSON first.

```php
$modx->runSnippet(
	'ddStringTools',
	[
		//This is an array, not string
		'inputString' => [
			'someObjectField' => '[+somePlaceholder+] need to be removed.',
			//And this is an array too
			'otherObjectField' => [
				'deepField' => '[+placeholders+] will be removed in any depth.'
			]
		],
		'tools' => [
			'placeholderRemover' => true
		]
	]
);
```

Returns:

```json
{
	"someObjectField": " need to be removed.",
	"otherObjectField": {
		"deepField": " will be removed in any depth."
	}
}
```


### Run the snippet through `\DDTools\Snippet::runSnippet` without DB and eval

```php
//Include (MODX)EvolutionCMS.libraries.ddTools
require_once(
	$modx->getConfig('base_path') .
	'assets/libs/ddTools/modx.ddtools.class.php'
);

//Run (MODX)EvolutionCMS.snippets.ddStringTools
\DDTools\Snippet::runSnippet([
	'name' => 'ddStringTools',
	'params' => [
		'inputString' => '<div class="someTrash"></div><p><b>Some</b> <a href="#">sample</a> <i>text</i>. [+somePlaceholder+]</p>.',
		//`tools` in this case can be set as a native PHP array or object
		'tools' => [
			'placeholderRemover' => true,
			'typographer' => true,
			'tagRemover' => [
				'allowed' => '<p><a>'
			],
			'caseConverter' => [
				'toLower' => true
			],
			'charEscaper' => true
		]
	]
]);
```


## Links

* [Home page](https://code.divandesign.ru/modx/ddstringtools)
* [Telegram chat](https://t.me/dd_code)
* [Packagist](https://packagist.org/packages/dd/evolutioncms-snippets-ddstringtools)
* [GitHub](https://github.com/DivanDesign/EvolutionCMS.snippets.ddStringTools)


<link rel="stylesheet" type="text/css" href="https://raw.githack.com/DivanDesign/CSS.ddMarkdown/master/style.min.css" />