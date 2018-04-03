## motivation
tired of writing
```php
if( isset($_POST['foo']) && $_POST['foo'] === '1' )
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
if( __x($var) )
{

}

// check non-existence
if( __nx($var) )
{

}
```

### equality
```php
// php has a lot of pitfalls, when comparing loosely
if( 0 == 'true' ) // true
if( 0 == 'str' ) // true
if( 'null' == null ) // false
if( '0' == null ) // false
if( '0' == true ) // false
if( '0' == false ) // true
if( 'false' == true ) // true
if( 'false' == false ) // false
if( new stdClass == true ) // true
if( [] == false ) // true
if( [] == null ) // true
if( [''] == [] ) // false
if( [''] == [0] ) // true
if( 0 == '' ) // true
if( 0 == ' ' ) // true
if( -1 == true ) // true
if( '-1' == true ) // true

// this non-strict equality is symmetric, but not transitive
$a = ''; $b = 0; $c = 'oh';
$a == $b; // true
$b == $c; // true
$c == $a; // false

// to overcome this issue, we...

// ...use strict comparison when possible
if( $var === 'foo' )
{

}

// ...use loose comparison when appropriate
if( $_GET['number'] == 1337 )
{

}

// ...check for truthness / falsiness with these helper methods
if( __true($var) )
{

}

if( __false($var) )
{

}

// be aware, that __true is not always the logic negation of __false
__true(null) // false
__false(null) // false
```

### value
```php
// get variable if exists, otherwise null
__v( $var )

// get variable if exists, otherwise 'default'
__v( $var, 'default' )

// get first variable that exists, otherwise null
__v( $var1, $var2, $var3 )
```

### loop
```php
// loop only if exists
foreach( __i($array) as $array__key=>$array__value )
{

}
```


### @

```php
// if you are unsure, if a variable is even set before checking its existence,
// simply prefix it with the stfu-operator @
if( __x(@$var) )
if( __nx(@$var) )
if( __true(@$var) )
if( __false(@$var) )
if( @$var === 'foo' )
if( @$_GET['number'] == 1337 )
echo __v(@$var)
foreach( __i(@$array) as $array__key=>$array__value)

```
A short note on the usage of @: In this concept we use @-operator that hides errors. We are aware of its potential misuse and also of its benefits. When using @$a['undefined'], there can be 2 possible errors: a missing variable or a missing index. In both cases, we intentionally prevent the parser from stopping and catch the resulting null value. But be aware: Don't use it before function calls (@__x($a['undefined']).



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
__cookie_set('cookie_name2', ['can also', 'store', 'arrays'], 7);

// existence
__cookie_exists('cookie_name') // true

// get
__cookie_get('cookie_name') // 'cookie_value'
__cookie_get('cookie_name2') // ['can also', 'store', 'arrays']

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
if( __nx_all('foo', 'bar', null) ) // true
if( __nx_all('foo', 'bar', 'baz') ) // false

// check if one variable exists
if( __x_one('foo', 'bar') ) // true
if( __x_one('', null) ) // false
if( __x_one(['foo', 'bar']) ) // true
if( __x_one(['', null]) ) // false
if( __nx_one('foo', 'bar') ) // false
if( __nx_one('', null) ) // true

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
__random_string() // edPhi34d
__random_string(10) // abCa321aC6
__random_string(16, 'idkfa') // idifafafifaifafk

// strip string
__strip('Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.', 12) // Lorem ipsum...

// strip numeric (0-9.,)
__strip_numeric('the answer is 42.00') // the answer is 

// strip non-numeric (all except 0-9.,)
__strip_nonnumeric('the answer is 42.00') // 42.00

// strip digit (0-9)
__strip_numeric('the answer is 42.00') // the answer is 

// strip non-digit (all except 0-9)
__strip_nondigit('the answer is 42') // 42

// strip whitespace
__strip_whitespace('the answer is 42') // theansweris42
__strip_whitespace('the     answeris42') // theansweris42

// split string by new line
__split_newline('foo
bar
baz') // ['foo','bar','baz']

// check if string is serialized
__is_serialized('a:1:{s:3:"foo";s:3:"bar";}') // true
__is_serialized('idkfa') // false
__is_serialized('b:0;') // true

// extract part from string
__extract('<a href="#foo">bar</a>','href="','">') // #foo
__extract('<a href="#foo">bar</a>','">','</a') // bar

// find all occurences of substring in string
__strposx('bar foo baz foobar', 'foo') // [4,12]

// find nth occurence of substring in string
__strposnth('bar foo baz foobar', 'foo', 2) // 12

// check if key is first/last key in foreach loop
$array = ['foo','bar'];
foreach($array as $array__key=>$array__value)
{
    if( __fkey($array__key, $array) ) { }
    if( __lkey($array__key, $array) ) { }
}

// get last item of array
__last(['foo', 'bar', 'baz']) // 'baz'

// get first item of array
__first(['foo', 'bar', 'baz']) // 'foo'

// get random element from array
__rand(['foo', 'bar', 'baz']) // 'bar'

// check if item can be looped (is a non empty array, object or collection)
__can_be_looped([1,2]) // true
__can_be_looped((object)[1,2]) // true
__can_be_looped([]) // false

// removes recursively all items from array or object or collection that are considered empty
__remove_empty([0 => ['foo',null,''], null, 2 => [['',''],[null]]]) // [0 => ['foo']]

// remove item from array or object and fill up gaps (if numeric keys are available)
__remove([0 => 'foo', 1 => 'bar', 2 => 'baz'], 1) // [0 => 'foo', 1 => 'baz']
__remove(['foo' => 1, 'bar' => 2, 'baz' => 3], 'foo') // ['bar' => 2, 'baz' => 3]
__remove((object)[0 => 'foo', 1 => 'bar', 2 => 'baz'], 1) // (object)[0 => 'foo', 1 => 'baz']

// turn values of array "inside out"
// this is useful when working with html forms
/*
<li><input type="text" name="data[option1][]" /><input type="text" name="data[option2][]" /></li>
<li><input type="text" name="data[option1][]" /><input type="text" name="data[option2][]" /></li>
<li><input type="text" name="data[option1][]" /><input type="text" name="data[option2][]" /></li>
<li><input type="text" name="data[option1][]" /><input type="text" name="data[option2][]" /></li>
*/
__inside_out_values([
    'option1' => [0 => 'foo', 1 => 'bar', 2 => 'baz', 3 => ''],
    'option2' => [0 => 'bar', 1 => 'baz', 2 => 'foo', 3 => null]
])
/*
[
    0 => ['option1' => 'foo','option2' => 'bar'],
    1 => ['option1' => 'bar','option2' => 'baz'],
    2 => ['option1' => 'baz','option2' => 'foo']
]
*/

// highlight strings
__highlight('that is a search string', 'is') // that <strong class="highlight">is</strong> a search string

// checks if variable is an integer (works also for big integers)
__is_integer(8372468764378627868742367883268) // true (in comparison to is_int())

// output arguments in a reader friendly way
__o($var)
__o($var1, $var2, $var3)
__o('<strong>foo</strong>') // html codes are not parsed: array(1) { [0]=> string(32) "<strong>foo</strong>" }

// same as __o but die afterwards
__d($var)

// flatten multidimensional array (keys)
__flatten_keys(['foo' => ['bar' => 'baz']]) // ['foo','bar']

// flatten multidimensional array (values)
__flatten_values(['foo' => 'bar', 'bar' => ['baz', 'foo']]) // ['bar','baz','foo']

// get nth element of concatenized array
__expl(' ', 'foo bar baz', 1) // bar

// redirect via php (following post/redirect/get-pattern)
__prg() // to current url without get arguments
__prg('https://test.de')

// redirect via html
__redirect() // to current url without get arguments
__redirect('https://test.de')

// throw exceptions (of type Exception)
try { __exception('foo'); }
catch(Exception $e) { $e->getMessage() // 'foo' }

// success/error return values
__success() // { success: true, message: '' }
__error('missing data') // { success: false, message: 'missing data' }

// get current os
__os() // ['windows','mac','linux']

// get current url
__url() // https://github.com/vielhuber/stringhelper

$_GET = ['page_id' => '13', 'code' => '<h1>Hello World!</h1>'];
$_POST = ['foo' => 'bar', 42 => "\0"];

// fetch post/get variables if they exist
__get('foo') // null (because not set)
__get('page_id') // '13'
__post('foo') // bar

// clean up post/get from malicious content using filter_var_array
clean_up_get() // $_GET = ['page_id' => '13', 'code' => 'Hello World!']
clean_up_post() // $_POST = ['foo' => 'bar', 42 => '']
clean_up() // same as clean_up_get() and clean_up_post()

// do curl requests (get/post)
__curl('https://httpbin.org/anything'); // { "method": "GET", ... }
__curl('https://httpbin.org/anything', ['foo' => 'bar'], 'POST'); // { "method": "POST", "data": {"foo": "bar"}, ... }
__curl('https://httpbin.org/anything', ['foo' => 'bar'], 'POST', ['Bar' => 'baz']); // { "method": "POST", "headers" = { "Bar": "baz", ... }, ... }

// char helpers
__char_to_int('D') // 4
__int_to_char(4) // 'D'
__inc_char('D') // 'E'
__inc_char('Z') // 'AA'
__inc_char('A',2) // 'C'
__dec_char('U') // 'T'

// measure performance
__log_begin('task');
for($i = 0; $i < 10000; $i++)
{
  __log_begin('childtask');
  for($y = 0; $y < 100; $y++) { }
  __log__end();
}
__log__end();
```



### js implementation

there is also a javascript implemenation [hlp](https://github.com/vielhuber/hlp) with similiar functions available.


### existence matrix

| | <sub>__x()</sub> | <sub>__true()</sub> | <sub>__false()</sub> | <sub>!== null</sub> | <sub>!= null</sub> | <sub>!== false</sub> | <sub>!= false</sub> | <sub>=== true</sub> | <sub>== true</sub> | <sub>!is_null()</sub> | <sub>isset()</sub> | <sub>!empty()</sub> | <sub>if/else</sub> | <sub>ternary</sub> | <sub>count() > 0</sub> | <sub>!= ''</sub> | <sub>!== ''</sub> |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| <sub>null</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> |
| <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> |
| <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>[]</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>['']</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>0</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> |
| <sub>1</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>-1</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>'0'</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>'1'</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>'-1'</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>''</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> |
| <sub>' '</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>'null'</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>'false'</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>'true'</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>'str'</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>[0,1]</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>[0]</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>new stdClass</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>false</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> | <sub>true</sub> |
| <sub>$_GET['undefined']</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>false</sub> | <sub>false</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> | <sub>error</sub> |
| <sub>@$_GET['undefined']</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>false</sub> | <sub>true</sub> |


### loose comparison matrix

| <sub>==</sub> | <sub>null</sub> | <sub>false</sub> | <sub>true</sub> | <sub>[]</sub> | <sub>['']</sub> | <sub>0</sub> | <sub>1</sub> | <sub>-1</sub> | <sub>'0'</sub> | <sub>'1'</sub> | <sub>'-1'</sub> | <sub>''</sub> | <sub>' '</sub> | <sub>'null'</sub> | <sub>'false'</sub> | <sub>'true'</sub> | <sub>'str'</sub> | <sub>[0,1]</sub> | <sub>[0]</sub> | <sub>new stdClass</sub> | <sub>$_GET['undefined']</sub> | <sub>@$_GET['undefined']</sub> |
| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |
| <sub>null</sub>| <sub>true</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>true</sub> |
| <sub>false</sub>| <sub>true</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>true</sub> |
| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>[]</sub>| <sub>true</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>true</sub> |
| <sub>['']</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>0</sub>| <sub>true</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>true</sub> |
| <sub>1</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>-1</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'0'</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'1'</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'-1'</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>''</sub>| <sub>true</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>true</sub> |
| <sub>' '</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'null'</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'false'</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'true'</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>'str'</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>[0,1]</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>[0]</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>new stdClass</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>error</sub>| <sub>false</sub> |
| <sub>$_GET['undefined']</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub>| <sub>error</sub> |
| <sub>@$_GET['undefined']</sub>| <sub>true</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>true</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>false</sub>| <sub>error</sub>| <sub>true</sub> |