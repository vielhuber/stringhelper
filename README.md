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