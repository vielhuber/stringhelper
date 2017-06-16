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
```
// if you want to check if variable "exists" in a natural way:
if( @__x($var) ) { ... }

// with the help of @__empty you can chain methods and check for final existence
@__f( House::find(1337)->getRooms()->getBooks()->getToc(), 'default' )

echo @__extract('<a href="#foo">bar</a>','href="','">'); // #foo

echo @__extract('<a href="#foo">bar</a>','">','</a'); // bar
```

## overview of __x

### php

| | === null | == null | is_null | isset | empty | if/else | ternary | count > 0 | == '' | === '' | @__x |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| $a | true | true | true | false | true | false | false | false | true | false | false |
| null | true | true | true | false | true | false | false | false | true | false | false |
| [] | false | true | false | true | true | false | false | false | false | false | false |
| 0 | false | true | false | true | true | false | false | true | true | false | true |
| 1 | false | false | false | true | false | true | true | true | false | false | true |
| -1 | false | false | false | true | false | true | true | true | false | false | true |
| '' | false | true | false | true | true | false | false | true | true | true | false |
| ' ' | false | false | false | true | false | true | true | true | false | false | false |
| str | false | false | false | true | false | true | true | true | false | false | true |
| [0,1] | false | false | false | true | false | true | true | true | false | false | true |
| [0] | false | false | false | true | false | true | true | true | false | false | true |
| new stdClass() | false | false | false | true | false | true | true | true | false | false | false |

### js

| | === null | == null | typeof input === 'undefined' | if/else | ternary | length > 0 | == '' | === '' | __x |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| $a | false | true | true | false | false | type error | false | false | false |
| null | true | true | false | false | false | type error | false | false | false |
| [] | false | false | false | true | true | false | true | false | false |
| 0 | false | false | false | false | false | false | true | false | true |
| 1 | false | false | false | true | true | false | false | false | true |
| -1 | false | false | false | true | true | false | false | false | true |
| '' | false | false | false | false | false | false | true | true | false |
| ' ' | false | false | false | true | true | true | false | false | false |
| str | false | false | false | true | true | true | false | false | true |
| [0,1] | false | false | false | true | true | true | false | false | true |
| [0] | false | false | false | true | true | true | false | false | true |
| new Object() | false | false | false | true | true | false | false | false | false |