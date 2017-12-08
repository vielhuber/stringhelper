## motivation
tired of writing
```php
if( isset($_GET['foo']) && $_GET['foo'] === '1' )
{

}
```
or
```php
if( !empty($a) || (isset($a) && $a === 0) )
{

}
```
or 
```php
if( !empty($a) )
{
    foreach( $a as $value )
    {

    }
}
```
?

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

### existence
```php
// check existence
if( __x(@$var) )
{

}

// check non existence
if( __nx(@$var) )
{

}
```

### equality
```php
// check equality (strict)
if( @$var === '1' )
{

}
```

### value
```php
// get variable if exists, otherwise null
__v( @$var )

// get variable if exists, otherwise 'default'
__v( @$var, 'default' )

// get first variable that exists, otherwise null
__v( @$var1, @$var2, @$var3 )
```

### loop
```php
// loop only if exists
foreach( __i(@$var) as $key=>$value )
{

}
```

### classes
```php
// consider the following laravelish code
class Person
{
    public $id;
    
    function __construct($id)
    {
        $this->id = $id;
    }
    
    static function find($id)
    {
        // mock example (normally lookup in database)
        if( $id === 1 || $id === 2 )
        {
            return new Person($id);
        }
        else
        {
            return null;
        }
    }
    function getAddress()
    {
        if( $this->id === 1 )
        {
            return new Address();
        }
        else
        {
            return null;
        }
    }
}
class Address
{
    function getCountry()
    {
        return new Country();
    }
}
class Country
{
    function getName()
    {
        return 'Germany';
    }
}
echo Person::find(1)->getAddress()->getCountry()->getName(); // 'Germany'
echo Person::find(2)->getAddress()->getCountry()->getName(); // fails because person with id 2 has no address
echo Person::find(3)->getAddress()->getCountry()->getName(); // fails because person with id 3 does not even exist
// to be sure we instead have to write
if( Person::find($id) !== null && Person::find(1)->getAddress() !== null && Person::find($id)->getAddress()->getCountry() !== null && Person::find($id)->getAddress()->getCountry()->getName() !== null )
{
    echo Person::find($id)->getAddress()->getCountry()->getName();
}

// due to the fact that the [null propagating method call operator](https://wiki.php.net/rfc/nullsafe_calls) is still a rfc, we cannot write
echo Person::find(3)?->getAddress()?->getCountry()?->getName(); // null

// we therefore return a null model object __empty()
class Person
{
    public $id;
    
    function __construct($id)
    {
        $this->id = $id;
    }
    
    static function find($id)
    {
        if( $id === 1 || $id === 2 )
        {
            return new Person($id);
        }
        else
        {
            return __empty();
        }
    }
    function getAddress()
    {
        if( $this->id === 1 )
        {
            return new Address();
        }
        else
        {
            return __empty();
        }
    }
}
class Address
{
    function getCountry()
    {
        return new Country();
    }
}
class Country
{
    function getName()
    {
        return 'Germany';
    }
}

// we can no conveniently call those chains...
//echo Person::find(1)->getAddress()->getCountry()->getName(); // 'Germany'
//echo Person::find(2)->getAddress()->getCountry()->getName(); // ''
//echo Person::find(3)->getAddress()->getCountry()->getName(); // ''

// ...check for existence...
if( __x(Person::find(1)->getAddress()->getCountry()->getName()) )
{
    
}

// ...check for equality...
if( Person::find(1)->getAddress()->getCountry()->getName() == 'Germany' )
{
    
}

// ...get a value...
echo __v( Person::find(1)->getAddress()->getCountry()->getName(), 'default' );

// ...and loop whenever we want
foreach( Person::find(1)->getAddress()->getCountry() as $value )
{
    
}



### helpers
```
// there are some other neat little helpers available

// ...
```

### @

A short note on the usage of @: In this concept we use the "stfu" operator @ that hides errors. We are aware of its potential misuse and also of its benefits. When using @$a['undefined'], there can be 2 possible errors: a missing variable or a missing index. In both cases, we intentionally prevent the parser from stopping and catch the resulting null value. But be aware: Don't use it before function calls (@__x($a['undefined']).


###

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

| | <sub>!== null</sub> | <sub>!= null</sub> | <sub>!== false</sub> | <sub>!= false</sub> | <sub>=== true</sub> | <sub>== true</sub> | <sub>!is_null()</sub> | <sub>isset()</sub> | <sub>!empty()</sub> | <sub>if/else</sub> | <sub>ternary</sub> | <sub>count() > 0</sub> | <sub>!= ''</sub> | <sub>!== ''</sub> | <sub>__x()</sub> | <sub>__x(@)</sub> |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| <sub>null</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> |
| <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> |
| <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>[]</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> |
| <sub>['']</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> |
| <sub>0</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>1</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>-1</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>''</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> |
| <sub>' '</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> |
| <sub>str</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>[0,1]</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>[0]</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>new stdClass</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> |
| <sub>$_GET['not_set']</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>false</sub> | <sub>false</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>false</sub> |

### js

| | <sub>!== null</sub> | <sub>!= null</sub> | <sub>!== false</sub> | <sub>!= false</sub> | <sub>=== true</sub> | <sub>== true</sub> | <sub>typeof input !== 'undefined'</sub> | <sub>if/else</sub> | <sub>ternary</sub> | <sub>length > 0</sub> | <sub>!= ''</sub> | <sub>!== ''</sub> | <sub>__x</sub> |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| <sub>$a</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>type error</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> |
| <sub>null</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>type error</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> |
| <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>[]</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> |
| <sub>['']</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> |
| <sub>0</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>1</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>-1</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>''</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> |
| <sub>' '</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> |
| <sub>str</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>[0,1]</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>[0]</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>new Object()</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false |

