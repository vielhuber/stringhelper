## installation
```
composer require vielhuber/stringhelper
```

hotload the functions in your composer.json:
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
// if you want to check if an existing variable is not empty:
if( __x($var) ) { ... }
// if you want to even have the case that if the variable does not exist, use @
if( @__x($var) ) { ... }
```