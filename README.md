## motivation
despite is not recommened to use the @-operator in php,
in some cases (where you know what you do and expect) it can be very helpful.

## installation
```
composer require vielhuber/stringhelper
```

hotload the functions in your composer.json:
```
...
"autoload": {
	...
    "files": [
        "vendor/vielhuber/stringhelper/StringHelper.php"
    ]
},
...
```

## usage
```php
// if you want to check if variable "exists" in a natural way:
if( @__x($var) ) { ... }

// with the help of @__empty you can chain methods and check for final existence
@__f( House::find(1337)->getRooms()->getBooks()->getToc(), 'default' )

echo @__extract('<a href="#foo">bar</a>','href="','">'); // #foo

echo @__extract('<a href="#foo">bar</a>','">','</a'); // bar

echo @__strip('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.', 12); // Lorem ipsum...

echo @__is_integer(8372468764378627868742367883268); // true (in comparison to is_int())

// run the loop only if $input can be looped
foreach(@__i($input) as $input__key=>$input__value) { }

// get all occurences
var_dump(@__strposx('foo', 'bar foo baz foobar')); // [4,13]
```

## overview of __x

### php

| | !== null | != null | !is_null | isset | !empty | if/else | ternary | count > 0 | != '' | !== '' | @__x |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| $a | false | false | false | false | false | false | false | false | false | true | false |
| null | false | false | false | false | false | false | false | false | false | true | false |
| [] | true | false | true | true | true | true | false | false | true | true | false |
| [''] | true | true | true | true | false | false | true | true | true | true | false |
| 0 | true | false | true | true | true | true | false | true | false | true | true |
| 1 | true | true | true | true | false | false | true | true | true | true | true |
| -1 | true | true | true | true | false | false | true | true | true | true | true |
| '' | true | false | true | true | true | true | false | true | false | false | false |
| ' ' | true | true | true | true | false | false | true | true | true | true | false |
| str | true | true | true | true | false | false | true | true | true | true | true |
| [0,1] | true | true | true | true | false | false | true | true | true | true | true |
| [0] | true | true | true | true | false | false | true | true | true | true | true |
| new stdClass() | false | false | false | false | false | true | true | true | true | true | false |

### js

| | !== null | != null | typeof input !== 'undefined' | if/else | ternary | length > 0 | != '' | !== '' | __x |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| $a | false | true | true | false | false | type error | false | false | false |
| null | true | true | false | false | false | type error | false | false | false |
| [] | false | false | false | true | true | false | true | false | false |
| [''] | false | false | false | true | true | true | true | false | false |
| 0 | false | false | false | false | false | false | true | false | true |
| 1 | false | false | false | true | true | false | false | false | true |
| -1 | false | false | false | true | true | false | false | false | true |
| '' | false | false | false | false | false | false | true | true | false |
| ' ' | false | false | false | true | true | true | false | false | false |
| str | false | false | false | true | true | true | false | false | true |
| [0,1] | false | false | false | true | true | true | false | false | true |
| [0] | false | false | false | true | true | true | false | false | true |
| new Object() | false | false | false | true | true | false | false | false | false |