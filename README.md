# (MODX)EvolutionCMS.snippets.ddStringTools

Tools for modifying strings.


## Requires

* PHP >= 5.4
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](https://code.divandesign.biz/modx/ddtools) >= 0.35
* [(MODX)EvolutionCMS.snippets.ddtypograph](https://code.divandesign.biz/modx/ddtypograph) >= 2.4  (if the `tools->typographer` parameter is used)
* [PHP.libraries.Parsedown](https://github.com/erusev/parsedown) >= 1.8.0-beta-7 (contains in archive)


## Documentation


### Installation


#### 1. Elements → Snippets: Create a new snippet with the following data

1. Snippet name: `ddStringTools`.
2. Description: `<b>1.4</b> Tools for modifying strings.`.
3. Category: `Core`.
4. Parse DocBlock: `no`.
5. Snippet code (php): Insert content of the `ddStringTools_snippet.php` file from the archive.

#### 2. Elements → Manage Files:

1. Create a new folder `assets/snippets/ddStringTools/`.
2. Extract the archive to the folder (except `ddStringTools_snippet.php`).


### Parameters description

* `inputString`
	* Desctription: The input string.
	* Valid values: `string`
	* Default value: `''`
	
* `tools`
	* Desctription: List of string tools to be applied to `inputString`. Tools are called in accordance with the specified order.
	* Valid values:
		* `stirngJsonObject` — as [JSON](https://en.wikipedia.org/wiki/JSON)
		* `stringQueryFormated` — as [Query string](https://en.wikipedia.org/wiki/Query_string)
	* Default value: `'{}'`
	
* `tools->{$toolName}`
	* Desctription: A tool, when the key is the tool name and the value is the tool parameters.  
		Tool names are case insensitive (the following names are equal: `caseConverter`, `Caseconverter`, `caseconverter`, etc).
	* Valid values:
		* `object` — an object with tool parameters (see below)
		* `boolean` — for simple tools without parameters or if you need to use default parameters (if possible), you can just pass `true`
	* Default value: —.


#### Case converter

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


#### Markdown parser

* `tools->markdownParser`
	* Desctription: Parse Markdown using Parsedown library.
	* Valid values:
		* `boolean` — if you need to parse with default params, you can just pass `true`
		* `object` — or an object with parameters (see below)
	* Default value: `false`
	
* `tools->markdownParser->parseInline`
	* Desctription: Parse Markdown using Parsedown library.
	* Valid values: `boolean`
	* Default value: `false`


#### Typographer

* `tools->typographer`
	* Desctription: Typography text using EvolutionCMS.snippets.ddtypograph.  
		Parameters have to be passed to EvolutionCMS.snippets.ddtypograph.
		More info in its [documentation](https://code.divandesign.biz/modx/ddtypograph).
	* Valid values:
		* `boolean` — if you need to typography with default params, you can just pass `true`
		* `object` — or an object with parameters (see below)
	* Default value: `false`
	
* `tools->typographer->optAlign`
	* Desctription: Optical alignment (hanging punctuation).
	* Valid values: `boolean`
	* Default value: `false`
	
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


#### Tag remover

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


#### Special char converter

* `tools->specialCharConverter`
	* Desctription: Convert special characters to HTML entities.
	* Valid values: `boolean`
	* Default value: `false`


#### Chars escaper (e. g. for JS)

* `tools->charEscaper`
	* Desctription: Escape special characters for JS.
	* Valid values: `boolean`
	* Default value: `false`


#### URL encoder

* `tools->urlEncoder`
	* Desctription: URL-encode according to RFC 3986.
	* Valid values: `boolean`
	* Default value: `false`


#### Placeholder remover

* `tools->placeholderRemover`
	* Desctription: Remove placeholders like `[+placeholder+]`.
	* Valid values: `boolean`
	* Default value: `false`


### Examples


#### Convert characters to lowercase (`tools->caseConverter->toLower`)

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


#### Strip HTML and PHP tags from a string (`tools->tagRemover`)


##### Remove all tags completely

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


##### Remove all tags except `<p>` and `<a>` (`tools->tagRemover->allowed`)

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


#### Convert special characters to HTML entities (`tools->specialCharConverter`)

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


#### URL-encode according to RFC 3986 (`tools->urlEncoder`)

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


#### Escape special characters for JavaScript (`tools->charEscaper`)

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
	$('body').append('  <p class=\"test\">Some <a href=\"#\">sample</a> text.</p>  <p>New line.</p> ');
<script>
```


#### Convert Markdown to HTML (`tools->markdownParser`)

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


##### You can also parse inline markdown only (`tools->markdownParser->parseInline`)

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


#### Typography text (`tools->typographer`)


##### With optical alignment (`tools->typographer->optAlign`)

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


##### Simple call with default parameters

```html
[[ddStringTools?
	&inputString=`Some text for typography.`
	&tools=`{
		"typographer": true
	}`
]]
```


#### Remove placeholders like `[+placeholder+]` (`tools->placeholderRemover`)

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


#### Use multiple tools together

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


## [Home page →](http://code.divandesign.biz/modx/ddstringtools)


<link rel="stylesheet" type="text/css" href="https://DivanDesign.ru/assets/files/ddMarkdown.css" />