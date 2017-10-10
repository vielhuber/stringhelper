<?php
// allow iteration of any item
function __i($var)
{
    if(@__nx($var))
    {
        return [];
    }
    if(is_array($var) || $var instanceof Traversable)
    {
        return $var;
    }
    return [];    
}

// check if multiple variables exists
function __mx()
{
    for($i = 0 ; $i < func_num_args(); $i++)
    {
        $arg = func_get_arg($i);
        if( @__nx($arg) ) { return false; }
    }
    return true;
}

// check if at least one variable exists
function __ox()
{
    for($i = 0 ; $i < func_num_args(); $i++)
    {
        $arg = func_get_arg($i);
        if( @__x($arg) ) { return true; }
    }
    return false;
}

// return empty model
class __ignore_helper
{
    public function __call($name, $arguments)
    {
        return new __ignore_helper();
    }
    public function __toString()
    {
        return '';
    }
    public function count()
    {
        return 0;
    }
}
function __empty()
{
    return new __ignore_helper();
}

// check if string exists
function __x($input)
{
    if( $input === null || $input === '' || trim($input) === '' || (is_array($input) && empty($input)) || (is_object($input) && empty((array)$input)) ) { return false; }
    if( is_array($input) && count($input) === 1 && array_values($input)[0] === '' ) { return false; }
    if($input instanceof Illuminate\Database\Eloquent\Relations\BelongsTo && $input->count() === 0 ) { return false; }
    if($input instanceof Illuminate\Database\Eloquent\Collection && $input->count() === 0 ) { return false; }
    if($input instanceof Illuminate\Support\Collection && $input->count() === 0 ) { return false; }
    if($input instanceof __ignore_helper) { return false; }
    return true;
}

// check if string does not exist
function __nx($var)
{
    return !@__x($var);
}

// check if array has minimum one variable that exists
function __aox($var)
{
    if( !is_array($var) ) { return false; }
    foreach($var as $key=>$value)
    {
        if( @__x($value) )
        {
            return true;
        }
    }
    return false;
}

// check if every variable in array exists
function __amx($var)
{
    if( !is_array($var) ) { return false; }
    foreach($var as $key=>$value)
    {
        if( @__nx($value) )
        {
            return false;
        }
    }
    return true;
}


// return first existing value, otherwise null
function __f(...$args)
{
    foreach($args as $arg)
    {
        if( @__x($arg) ) { return trim($arg); }
    }
    return null;
}

// if first value exists, return second value, otherwise third
function __xe($var,$return,$fallback = null)
{
    if( @__x($var) ) { return $return; }
    return $fallback;
}

// check equality of two values (weak check)
function __eq($a, $b)
{
    if( @__nx($a) && @__nx($b) ) { return false; }
    if( @__nx($a) && @__x($b) ) { return false; }
    if( @__x($a) && @__nx($b) ) { return false; }
    if( $a == $b ) { return true; }
    return false;
}

// check inequality of two values (weak check)
function __neq($a, $b)
{
	return !@__eq($a, $b);
}

// debug output
function __d($data = [], $die = true)
{
    if( @__x($data) )
    {
        if( is_array($data) || is_object($data) || ($data instanceof Traversable) )
        {
            echo '<pre>';
        }
        print_r($data);
        if( is_array($data) || is_object($data) || ($data instanceof Traversable) )
        {
            echo '</pre>';
        }
    }
    if($die)
    {
        die();
    }
}

// get nth element of concatenized array
function __expl($separator = ' ', $array = [], $pos = 0)
{
    return current(array_slice(explode($separator,$array), $pos, 1));
}

// post/redirect/get-pattern
function __prg($url = null)
{
    if($url == null)
    {
        $url = (@$_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
        $url .= $_SERVER['HTTP_HOST'].strtok($_SERVER['REQUEST_URI'],'?');
        if(@__x($_GET['page_id'])) { $url .= '?page_id='.$_GET['page_id']; }
    }
    header('Location: '.$url);
    die();
}

// returns null if date is invalid, otherwise formatted date
function __date($date, $format = 'Y-m-d')
{
    if( !@__validate_date($date) ) { return null; }
    return date($format,strtotime($date));
}

// checks if a date is valid (in english and german format)
function __validate_date($date)
{
    if( @__nx($date) ) { return false; }
    $date = explode(' ',$date)[0];
    if( substr_count($date,'-') == 2 )
    {
        $date = explode('-', $date);
        if(checkdate($date[1], $date[2], $date[0]))
        {
            if( $date[0] >= 2037 ) { return false; } // prevent 32-bit problem
            return true;
        }
    }
    else if( substr_count($date,'.') == 2 )
    {
        $date = explode('.', $date);
        if(checkdate($date[1], $date[0], $date[2]))
        {
            if( $date[2] >= 2037 ) { return false; } // prevent 32-bit problem
            return true;
        }
    }
    return false;
}

// checks if string is a valid url (also works with umlauts and without external lib like idna)
function __validate_url($value)
{
    if( @__nx($value) ) { return false; }
    $value = mb_strtolower($value);
    $value = str_replace(['ä','ö','ü'], ['ae', 'oe', 'ue'], $value);
    if( filter_var($value, FILTER_VALIDATE_URL) === false )
    {
        return false;
    }
    return true;
}

// check if string is a valid email (also works with umlauts and without external lib like idna)
function __validate_email($value)
{
    if(@__nx($value)) { return false; }
    $value = mb_strtolower($value);
    $value = str_replace(['ä','ö','ü'], ['ae', 'oe', 'ue'], $value);
    if( filter_var($value, FILTER_VALIDATE_EMAIL) === false )
    {
        return false;
    }
    return true;
}

// outputs a valid formatted value for input datetime-local
function __datetime($datetime)
{
    if( @__nx($datetime) ) { return null; }
    return date('Y-m-d', strtotime($datetime)).'T'.date('H:i', strtotime($datetime));
}


// flatten multidimensional array (keys)
function __flatten_keys($array)
{
    $return = [];
    foreach($array as $key=>$value)
    {
        if(is_array($value))
        {
            $return = array_merge($return, __flatten_keys($value));
        }
        $return[] = $key;
    }
    return $return;
}

// flatten multidimensional array (values)
function __flatten_values($array)
{
    $return = [];
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}

// string to slug (sanitize string)
function __slug($string)
{
    // replace non letter or digits by -
    $string = preg_replace('~[^\pL\d]+~u', '-', $string);
    // transliterate
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
    // remove unwanted characters
    $string = preg_replace('~[^-\w]+~', '', $string);
    // trim
    $string = trim($string, '-');
    // remove duplicate -
    $string = preg_replace('~-+~', '-', $string);
    // lowercase
    $string = strtolower($string);
    if(empty($string)) { return 'n-a'; }
    return $string;
}

// check if key is first key in foreach loop
function __fkey($array__key,$array)
{
    if( array_keys($array)[0] === $array__key )
    {
        return true;
    }
    return false;
}

// check if key is last key in foreach loop
function __lkey($array__key,$array)
{
    if( array_keys($array)[count(array_keys($array))-1] === $array__key )
    {
        return true;
    }
    return false;
}

// get last item of array
function __last($array)
{
    return array_values(array_slice($array, -1))[0];
}

// get first item of array
function __first($array)
{
    return $array[0];
}

// get random element from array
function __rand($array)
{
    return $array[array_rand($array)];
}

// generate random string
function __random_string($length = 8, $chars = null)
{
    if( $chars === null ) { $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; }
    $chars_length = strlen($chars);
    $random_string = '';
    for($i = 0; $i < $length; $i++)
    {
        $random_string .= $chars[mt_rand(0, $chars_length-1)];
    }
    return $random_string;
}

// swap values
function __swap(&$x, &$y)
{
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}

// extract from string
function __extract($string, $begin, $end)
{
    $pos1 = strpos($string,$begin)+strlen($begin);
    if($pos1 === false) { return false; }
    $pos2 = strpos($string, $end, $pos1);
    if($pos2 === false) { return false; }
    return substr($string, $pos1, $pos2-$pos1);
}

// find all occurences of substring in string
function __strposx($haystack, $needle)
{
    $positions = [];
    $last_pos = 0;
    while(($last_pos = strpos($haystack, $needle, $last_pos)) !== false)
    {
        $positions[] = $last_pos;
        $last_pos += strlen($needle);
    }
    return $positions;
}

// strip string
function __strip($string, $length = 50, $dots = '...')
{
    if( mb_strlen($string) <= $length ) { return $string; }
    return rtrim(mb_substr($string, 0, $length)).$dots;
}

// strip non numeric (all except 0-9, ., .)
function __strip_nonnumeric($string)
{
    return preg_replace('/[^0-9,.]/', '', $string);  
}

// strip non digit (all except 0-9)
function __strip_nondigit($string)
{
    return preg_replace('/[^0-9]/', '', $string);
}

// checks if variable is an integer (works also for big integers)
function __is_integer($input)
{
    if( @__nx($input) ) { return false; }
    if( is_int($input) ) { return true; }
    if( is_numeric($input) && ($input != (string)(float)$input) ) { return true; }
    return false;
}