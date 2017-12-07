## motivation
despite is not recommened to use the @-operator in php,
in some cases (where you know what you do and expect) it can be very helpful.

## installation
```
composer require vielhuber/stringhelper
```

php: hotload the functions in your composer.json:
```
...
"autoload": {
	...
    "files": [
        "vendor/vielhuber/stringhelper/stringhelper.php"
    ]
},
...
```
```
composer dump-autoload
```

js: add this in your head-tag
```
<script type="text/javascript" src="/vendor/vielhuber/stringhelper/stringhelper.js"></script> 
```

## usage
```php
// the problem with all sorts of functions in php is that 
// there is no fast way to check if variable is set in a natural way
// all solutions (isset, empty, count, ...) have there caveats (see table below)
// this short helper method solves all sorts of problems
if( __x($var) ) { ... }
// if you are even unsure whether $var is set
// (that is often the case when working with $_GET or $_POST variables)
// use the stfu-operator @ to even suppress undefined variables (do not use @__x())
if( __x(@$_GET['not_set']) ) { ... }

// with the help of @__empty() you can chain methods and check for final existence
@__f( Class::find(1337)->getFirst()->getSecond()->getThird(), 'default' )

$a = 1; $b = 2;
@__swap($a,$b); // $a = 2; $b = 1

@__eq(@__empty(),true) // false
@__eq(@__empty(),false) // false

@__d(['arr']) // debug output of formatted array and die
@__o('arg1', 'arg2') // debug output all items

@__prg('https://tld.com') // redirect with prg pattern (via header)
@__redirect('https://tld.com') // redirect with plain html meta tag

echo @__extract('<a href="#foo">bar</a>','href="','">'); // #foo
echo @__extract('<a href="#foo">bar</a>','">','</a'); // bar

echo @__strip('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.', 12); // Lorem ipsum...

echo @__is_integer(8372468764378627868742367883268); // true (in comparison to is_int())

// run the loop only if $input can be looped
foreach(@__i($input) as $input__key=>$input__value) { }

// get all occurences
var_dump(@__strposx('foo', 'bar foo baz foobar')); // [4,13]

// highlight strings
@__highlight('that is a search string', 'is'); // that <strong class="highlight">is</strong> a search string

// check if string is serialized
@__is_serialized('a:1:{s:3:"foo";s:3:"bar";}'); // true
@__is_serialized('idkfa'); // false
@__is_serialized('b:0;'); // true

// cookies
__cookie_exists($cookie_name)
__cookie_get($cookie_name)
__cookie_set($cookie_name, $cookie_value, $days)
__cookie_delete($cookie_name)
```

## overview of __x

### php

| | !== null</sub> | <sub>!= null</sub> | <sub>!== false</sub> | <sub>!= false</sub> | <sub>=== true</sub> | <sub>== true</sub> | <sub>!is_null()</sub> | <sub>isset()</sub> | <sub>!empty()</sub> | <sub>if/else</sub> | <sub>ternary</sub> | <sub>count() > 0</sub> | <sub>!= ''</sub> | <sub>!== ''</sub> | <sub>__x()</sub> | <sub>__x(@)</sub> |
| <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> | <sub>---</sub> |
| null | false | false | true | false | false | false | false | false | false | false | false | false | false | true | false | false |
| false | true | false | false | false | false | false | true | true | false | false | false | true | false | true | false | false | 
| true | true | true | true | true | true | true | true | true | true | true | true | true | true | true | true | true |
| [] | true | false | true | false | false | false | true | true | false | false | false | false | true | true | false | false |
| [''] | true | true | true | true | false | true | true | true | true | true | true | true | true | true | false | false |
| 0 | true | false | true | false | false | false | true | true | false | false | false | true | false | true | true | true |
| 1 | true | true | true | true | false | true | true | true | true | true | true | true | true | true | true | true |
| -1 | true | true | true | true | false | true | true | true | true | true | true | true | true | true | true | true |
| '' | true | false | true | false | false | false | true | true | false | false | false | true | false | false | false | false |
| ' ' | true | true | true | true | false | true | true | true | true | true | true | true | true | true | false | false |
| str | true | true | true | true | false | true | true | true | true | true | true | true | true | true | true | true |
| [0,1] | true | true | true | true | false | true | true | true | true | true | true | true | true | true | true | true |
| [0] | true | true | true | true | false | true | true | true | true | true | true | true | true | true | true | true |
| new stdClass | true | true | true | true | false | true | true | true | true | true | true | true | true | true | false | false |
| $_GET['not_set'] | error | error | error | error | error | error | error | false | false | error | error | error | error | error | error | false |

### js

| | !== null | != null | !== false | != false | === true | == true | typeof input !== 'undefined' | if/else | ternary | length > 0 | != '' | !== '' | __x | 
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| $a | true | false | true | true | false | false | false | false | false | type error | true | true | false | 
| null | false | false | true | true | false | false | true | false | false | type error | true | true | false | 
| false | true | true | false | false | false | false | true | false | false | false | false | true | true | 
| true | true | true | true | true | true | true | true | true | true | false | true | true | true | 
| [] | true | true | true | false | false | false | true | true | true | false | false | true | false | 
| [''] | true | true | true | false | false | false | true | true | true | true | false | true | false | 
| 0 | true | true | true | false | false | false | true | false | false | false | false | true | true | 
| 1 | true | true | true | true | false | true | true | true | true | false | true | true | true | 
| -1 | true | true | true | true | false | false | true | true | true | false | true | true | true | 
| '' | true | true | true | false | false | false | true | false | false | false | false | false | false | 
| ' ' | true | true | true | false | false | false | true | true | true | true | true | true | false | 
| str | true | true | true | true | false | false | true | true | true | true | true | true | true | 
| [0,1] | true | true | true | true | false | false | true | true | true | true | true | true | true | 
| [0] | true | true | true | false | false | false | true | true | true | true | true | true | true | 
| new Object() | true | true | true | true | false | false | true | true | true | false | true | true | false |