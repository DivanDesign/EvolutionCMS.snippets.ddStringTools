# (MODX)EvolutionCMS.snippets.ddStringTools

Tools for modifying strings.


## # Requires
* PHP >= 5.4
* [(MODX)EvolutionCMS](https://github.com/evolution-cms/evolution) >= 1.1
* [(MODX)EvolutionCMS.libraries.ddTools](http://code.divandesign.biz/modx/ddtools) >= 0.16.2
* [PHP.libraries.Parsedown](https://github.com/erusev/parsedown) >= 1.8.0-beta-7 (contains in archive)


## # Documentation


### ## Installation
1. Elements → Snippets: Create a new snippet with the following data:
	1. Snippet name: `ddStringTools`.
	2. Description: `<b>1.2</b> Tools for modifying strings.`.
	3. Category: `Core`.
	4. Parse DocBlock: `no`.
	5. Snippet code (php): Insert content of the `ddStringTools_snippet.php` file from the archive.
2. Elements → Manage Files:
	1. Create a new folder `assets/snippets/ddStringTools/`.
	2. Extract the archive to the folder (except `ddStringTools_snippet.php`).


### ## Parameters description

* `inputString`
	* Desctription: The input string.
	* Valid values: `string`
	* Default value: `''`
	
* `toLowercase`
	* Desctription: Make a string lowercase.
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `toUppercase`
	* Desctription: Make a string uppercase.
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `stripTags`
	* Desctription: Strip HTML and PHP tags from a string.
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `stripTags_allowed`
	* Desctription: Use the parameter to specify tags which should not be stripped (e. g. `<p><div>`).
	* Valid values: `string`
	* Default value: `''`
	
* `specialCharsToHTMLEntities`
	* Desctription: Convert special characters to HTML entities.
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `URLEncode`
	* Desctription: URL-encode according to RFC 3986.
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `escapeForJS`
	* Desctription: Escape special characters for JS.
	* Valid values:
		* `0`
		* `1`
	* Default value: `0`
	
* `parseMarkdown`
	* Desctription: Parse Markdown using Parsedown library.
	* Valid values:
		* `'text'`
		* `'line'`
	* Default value: —


## # [Home page →](http://code.divandesign.biz/modx/ddstringtools)