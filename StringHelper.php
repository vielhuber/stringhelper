<?php
// dynamic function to check if multiple variables exists
function __mx() {
    for($i = 0 ; $i < func_num_args(); $i++) {
        $arg = func_get_arg($i);
        if( @__nx($arg) ) { return false; }
    }
    return true;
}

// dynamic function to check if at least one variables exists
function __ox() {
    for($i = 0 ; $i < func_num_args(); $i++) {
        $arg = func_get_arg($i);
        if( @__x($arg) ) { return true; }
    }
    return false;
}

// if string exists
function __x($var) {
    if( $var !== null && $var !== "" && $var !== " " && $var !== "  " && $var !== "   " && $var !== "    " && trim($var) !== "" ) { return true; }
    return false;
}

// if string does not exist
function __nx($var) {
    return !@__x($var);
}

// check if array has minimum one variable that exists
function __aox($var) {
    if( !is_array($var) ) { return false; }
    foreach($var as $key=>$value) {
        if( @__x($value) ) {
            return true;
        }
    }
    return false;
}

// check if every variable in array exists
function __amx($var) {
    if( !is_array($var) ) { return false; }
    foreach($var as $key=>$value) {
        if( @__nx($value) ) {
            return false;
        }
    }
    return true;
}


// return first non null value, otherwise null
function __f(...$args) {
    foreach($args as $arg) {
        if( @__x($arg) ) { return trim($arg); }
    }
    return null;
}

// debug output
function __d($data = array(), $die = false) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    if($die) { die(); }
}

// get nth element of concatenized array
function __expl($separator = " ", $array = array(), $pos = 0) {
    return current(array_slice(explode($separator,$array), $pos, 1));
}

// post/redirect/get-pattern
function __prg($url = null) {
    if($url == null) {
        $url = (@$_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://';
        $url .= $_SERVER['HTTP_HOST'].strtok($_SERVER["REQUEST_URI"],'?');
        if(@__x($_GET["page_id"])) { $url .= '?page_id='.$_GET["page_id"]; }
    }
    header("Location: " . $url);
    die();
}

// returns null if date is invalid, otherwise formatted date
function __date($format, $date) {
    if( !@__validate_date($date) ) { return null; }
    return date($format,strtotime($date));
}

// checks if a date is valid (in english and german format)
function __validate_date($date) {
    if( @__nx($date) ) { return false; }
    $date = explode(" ",$date)[0];
    if( substr_count($date,"-") == 2 ) {
        $date = explode('-', $date);
        if(checkdate($date[1], $date[2], $date[0])) {
            if( $date[0] >= 2037 ) { return false; } // prevent 32-bit problem
            return true;
        }
    }
    else if( substr_count($date,".") == 2 ) {
        $date = explode('.', $date);
        if(checkdate($date[1], $date[0], $date[2])) {
            if( $date[2] >= 2037 ) { return false; } // prevent 32-bit problem
            return true;
        }
    }
    return false;
}

// check if email is valid
function __validate_email($email) {
    if(@__nx($email)) { return false; }
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    }
    return false;
}

// outputs a valid formatted value for input datetime-local
function __datetime($datetime) {
    if( @__nx($datetime) ) { return null; }
    return date('Y-m-d', strtotime($datetime))."T".date('H:i', strtotime($datetime));
}


// flatten multidimensional array (keys)
function __flatten_keys($array) {
    $return = [];
    foreach($array as $key=>$value) {
        if(is_array($value)) {
            $return = array_merge($return, __flatten_keys($value));
        }
        $return[] = $key;
    }
    return $return;
}

// flatten multidimensional array (values)
function __flatten_values($array) {
    $return = [];
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}

// string to slug (sanitize string)
function __slug($string) {
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
function __fkey($array__key,$array) {
	if( array_keys($array)[0] === $array__key ) {
		return true;
	}
	return false;
}

// check if key is last key in foreach loop
function __lkey($array__key,$array) {
	if( array_keys($array)[count(array_keys($array))-1] === $array__key ) {
		return true;
	}
	return false;
}

// get last item of array
function __last($array) {
    return array_values(array_slice($array, -1))[0];
}

// get first item of array
function __first($array) {
    return $array[0];
}