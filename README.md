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
or
```php
if( Person::find(1) !== null && Person::find(1)->getAddress() !== null && Person::find(1)->getAddress()->getCountry() !== null && Person::find(1)->getAddress()->getCountry()->getName() !== null )
{
    echo Person::find(1)->getAddress()->getCountry()->getName();
}
```
?

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
        "vendor/vielhuber/stringhelper/stringhelper.php"
    ]
},
...
```
```
composer dump-autoload
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
if( @$var === 'foo' )
{

}

// COMPARISON TABLE FROM BELOW


// be careful when comparing loosely
if( -1 == true ) // true
if( '-1' == true ) // true
if( 'false' == true ) // true
if( -1 == false ) // false
if( '-1' == false ) // false
if( null == false ) // false
if( [] == false ) // true
if( 0 == 'true' ) // true
// TODO, COMPARISON TABLE

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

// due to the fact that the null propagating method call operator
// (https://wiki.php.net/rfc/nullsafe_calls) is still a rfc, we cannot write
echo Person::find(3)?->getAddress()?->getCountry()?->getName(); // null

// we therefore return a null model object
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
echo Person::find(1)->getAddress()->getCountry()->getName(); // 'Germany'
echo Person::find(2)->getAddress()->getCountry()->getName(); // ''
echo Person::find(3)->getAddress()->getCountry()->getName(); // ''

// ...check for existence...
if( __x(Person::find(1)->getAddress()->getCountry()->getName()) )
{
    
}

// ...check for strict equality...
if( Person::find(1)->getAddress()->getCountry()->getName() === 'Germany' )
{
    
}

// ...get a value...
echo __v( Person::find(1)->getAddress()->getCountry()->getName(), 'default' );

// ...and loop when possible
foreach( Person::find(1)->getAddress()->getCountry() as $value )
{
    
}
```

### cookies
```php
// set
__cookie_set('cookie_name', 'cookie_value', 7) // set cookie for 7 days

// existence
__cookie_exists('cookie_name') // true

// get
__cookie_get('cookie_name') // 'cookie_value'

// delete
__cookie_delete('cookie_name')
```

### helpers
there are also some other neat little helpers available.
```php
// check if all variables exist
if( __x_all('foo', 'bar', null) ) // false
if( __x_all(['foo', 'bar', null]) ) // false
if( __x_all('foo', 'bar', 'baz') ) // true
if( __x_all(['foo', 'bar', 'baz']) ) // true
if( __nx_all(['foo', 'bar', null]) ) // true
if( __nx_all(['foo', 'bar', 'baz']) ) // false

// check if one variable exists
if( __x_one('foo', 'bar') ) // true
if( __x_one('', null) ) // false
if( __x_one(['foo', 'bar']) ) // true
if( __x_one(['', null]) ) // false
if( __nx_one(['foo', 'bar']) ) // false
if( __nx_one(['', null]) ) // true

// checks if string is a valid url (also works with umlauts and without external lib like idna)
__validate_url('https://vielhuber.de') // true

// check if string is a valid email (also works with umlauts and without external lib like idna)
__validate_email('david@vielhuber.de') // true

// checks if a date is valid (in english and german format)
__validate_date('29.02.2001') // false

// returns null if date is invalid, otherwise formatted date
__date('2000-01-01', 'd.m.Y') // 01.01.2000
__date('2001-02-29', 'd.m.Y') // null

// outputs a valid formatted value for input datetime-local
__datetime('01.01.2000') // 2000-01-01T00:00
__datetime('01.01.2000 18:00') // 2000-01-01T18:00

// string to slug (sanitize string)
__slug('This string will be sanitized!') // this-string-will-be-sanitized

// generate a random string
__random_string(8) // edPhi34d

// strip string
__strip('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.', 12) // Lorem ipsum...

// strip non numeric (all except 0-9.,)
__strip_nonnumeric('the answer is 42.00') // 42.00

// strip non digit (all except 0-9)
__strip_nondigit('the answer is 42') // 42

// check if string is serialized
__is_serialized('a:1:{s:3:"foo";s:3:"bar";}') // true
__is_serialized('idkfa') // false
__is_serialized('b:0;') // true

// extract part from string
__extract('<a href="#foo">bar</a>','href="','">') // #foo
__extract('<a href="#foo">bar</a>','">','</a') // bar

// find all occurences of substring in string
__strposx('foo', 'bar foo baz foobar')) // [4,13]

// find nth occurence of substring in string
__strposnth('foo', 'bar foo baz foobar', 2)) // 13

// clean up post/get
clean_up_get()
clean_up_post()
clean_up()

// check if key is first/last key in foreach loop
$arr = ['foo','bar'];
foreach($arr as $arr__key=>$arr__value)
{
    if( __fkey($arr__key, $arr) ) { }
    if( __lkey($arr__key, $arr) ) { }
}

// get last item of array
__last(['foo', 'bar', 'baz']) // 'baz'

// get first item of array
__first(['foo', 'bar', 'baz']) // 'foo'

// get random element from array
__first(['foo', 'bar', 'baz']) // 'bar'

// check if item can be looped (is a non empty array, object or collection)
__can_be_looped([1,2]) // true
__can_be_looped((object)[1,2]) // true
__can_be_looped([]) // false

// removes recursively all items from array or object or collection that are considered empty
__remove_empty([0 => ['foo',null,''], null) // [0 => ['foo']]

// highlight strings
__highlight('that is a search string', 'is') // that <strong class="highlight">is</strong> a search string

// checks if variable is an integer (works also for big integers)
__is_integer(8372468764378627868742367883268) // true (in comparison to is_int())

// output arguments in a reader friendly way
__o(@var)
__o(@var1, @var2, @var3)

// same as __o but die afterwards
__d(@var)
__d(@var1, @var2, @var3)

// flatten multidimensional array (keys)
__flatten_keys(['foo' => ['bar' => 'baz']]) // ['foo','bar']

// flatten multidimensional array (values)
__flatten_values(['foo' => 'bar', 'bar' => ['baz', 'foo']]) // ['bar','baz','foo']

// get nth element of concatenized array
__expl(' ', 'foo bar baz', 1) // bar

// redirect via php (following post/redirect/get-pattern)
__prg()
__prg('https://test.de')

// redirect via html
__redirect()
__redirect('https://test.de')
```

### @

A short note on the usage of @: In this concept we use the "stfu" operator @ that hides errors. We are aware of its potential misuse and also of its benefits. When using @$a['undefined'], there can be 2 possible errors: a missing variable or a missing index. In both cases, we intentionally prevent the parser from stopping and catch the resulting null value. But be aware: Don't use it before function calls (@__x($a['undefined']).



### js implementation

there is also a javascript implemenation [stringhelperjs](https://github.com/vielhuber/stringhelperjs) with similiar functions available.


### existence matrix

| | <sub>!== null</sub> | <sub>!= null</sub> | <sub>!== false</sub> | <sub>!= false</sub> | <sub>=== true</sub> | <sub>== true</sub> | <sub>!is_null()</sub> | <sub>isset()</sub> | <sub>!empty()</sub> | <sub>if/else</sub> | <sub>ternary</sub> | <sub>count() > 0</sub> | <sub>!= ''</sub> | <sub>!== ''</sub> | <sub>__x()</sub> | 
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| <sub>null</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | 


### loose comparison (==) matrix
| | <sub>null</sub>| <sub>false</sub>| <sub>true</sub>| <sub>[]</sub>| <sub>['']</sub>| <sub>0</sub>| <sub>1</sub>| <sub>-1</sub>| <sub>'0'</sub>| <sub>'1'</sub>| <sub>'-1'</sub>| <sub>''</sub>| <sub>' '</sub>| <sub>'str'</sub>| <sub>[0,1]</sub>| <sub>[0]</sub>| <sub>new stdClass</sub>| <sub>$_GET['not_set']</sub>| <sub>@$_GET['not_set']</sub>|
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| <sub>null</sub>| <sub>true</sub>| <sub>true</sub>| <sub>error</sub>| <sub>true</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>true</sub> |
| <sub>false</sub>| <sub>true</sub>| <sub>true</sub>| <sub>error</sub>| <sub>true</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>true</sub> |
| <sub>true</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub> |
| <sub>[]</sub>| <sub>true</sub>| <sub>true</sub>| <sub>error</sub>| <sub>true</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>true</sub> |
| <sub>['']</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>true</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>0</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub> |
| <sub>1</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>-1</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'0'</sub>| <sub>false</sub>| <sub>true</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'1'</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'-1'</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>''</sub>| <sub>true</sub>| <sub>true</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>true</sub> |
| <sub>' '</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'str'</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>[0,1]</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>[0]</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>true</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>new stdClass</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub> |
| <sub>$_GET['not_set']</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub> |
| <sub>@$_GET['not_set']</sub>| <sub>true</sub>| <sub>true</sub>| <sub>error</sub>| <sub>true</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>true</sub> |
