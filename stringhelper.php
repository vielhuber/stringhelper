<?php
function __x($input)
{
    if ($input === null || $input === false || $input === '' || (is_string($input) && trim($input) === '') || (is_array($input) && empty($input)) || (is_object($input) && empty((array) $input))) {
        return false;
    }
    if (is_array($input) && count($input) === 1 && array_values($input)[0] === '') {
        return false;
    }
    if ($input instanceof Illuminate\Database\Eloquent\Relations\BelongsTo && $input->count() === 0) {
        return false;
    }
    if ($input instanceof Illuminate\Database\Eloquent\Collection && $input->count() === 0) {
        return false;
    }
    if ($input instanceof Illuminate\Support\Collection && $input->count() === 0) {
        return false;
    }
    if ($input instanceof __empty_helper) {
        return false;
    }
    if (__is_serialized($input)) {
        return __x(unserialize($input));
    }
    if (json_encode($input) === '"\ufeff"') {
        return false;
    } // file_get_content of empty file
    return true;
}

function __nx($var)
{
    return !__x(@$var);
}

function __v(...$args)
{
    foreach ($args as $arg) {
        if (__x(@$arg)) {
            return $arg;
        }
    }
    return null;
}

function __e(...$args)
{
    foreach ($args as $arg) {
        if (__x(@$arg)) {
            return $arg;
        }
    }
    return __empty();
}

function __i($var)
{
    if (__nx(@$var)) {
        return [];
    }
    if (is_array($var) || $var instanceof Traversable) {
        return $var;
    }
    return [];
}

class __empty_helper implements JsonSerializable
{
    public function __call($name, $arguments)
    {
        return new __empty_helper();
    }
    public function __toString()
    {
        return '';
    }
    public function toArray()
    {
        return [];
    }
    public function count()
    {
        return 0;
    }
    public function jsonSerialize()
    {
        return null;
    }
    public function __get($property)
    {
        return null;
    }
}

function __empty()
{
    return new __empty_helper();
}

function __x_all(...$args)
{
    if (__x(@$args[0]) && is_array($args[0]) && count($args) === 1) {
        $args = $args[0];
    }
    foreach ($args as $arg) {
        if (__nx(@$arg)) {
            return false;
        }
    }
    return true;
}

function __nx_all(...$args)
{
    return !__x_all(...@$args);
}

function __x_one(...$args)
{
    if (__x(@$args[0]) && is_array($args[0]) && count($args) === 1) {
        $args = $args[0];
    }
    foreach ($args as $arg) {
        if (__x(@$arg)) {
            return true;
        }
    }
    return false;
}

function __nx_one(...$args)
{
    return !__x_one(...@$args);
}

function __true($val)
{
    if ($val === null) {
        return false;
    }
    if ($val === false) {
        return false;
    }
    if ($val === []) {
        return false;
    }
    if ($val === ['']) {
        return false;
    }
    if ($val === 0) {
        return false;
    }
    if ($val === '0') {
        return false;
    }
    if ($val === '') {
        return false;
    }
    if ($val === ' ') {
        return false;
    }
    if ($val === 'null') {
        return false;
    }
    if ($val === 'false') {
        return false;
    }
    if (is_object($val) && empty((array) $val)) {
        return false;
    }
    if (__is_serialized($val)) {
        return __true(unserialize($val));
    }
    return true;
}

function __false($val)
{
    if ($val === null) {
        return false;
    }
    if ($val === false) {
        return true;
    }
    if ($val === []) {
        return false;
    }
    if ($val === ['']) {
        return false;
    }
    if ($val === 0) {
        return true;
    }
    if ($val === '0') {
        return true;
    }
    if ($val === '') {
        return false;
    }
    if ($val === ' ') {
        return false;
    }
    if ($val === 'null') {
        return false;
    }
    if ($val === 'false') {
        return true;
    }
    if (is_object($val) && empty((array) $val)) {
        return false;
    }
    if (__is_serialized($val)) {
        return __false(unserialize($val));
    }
    return false;
}

function __cookie_exists($cookie_name)
{
    if (__x(@$_COOKIE[$cookie_name])) {
        return true;
    }
    return false;
}

function __cookie_get($cookie_name)
{
    $return = null;
    if (!__cookie_exists(@$cookie_name)) {
        return $return;
    }
    $return = $_COOKIE[$cookie_name];
    $return = stripslashes($return);
    if (__is_serialized($return)) {
        $return = unserialize($return);
    }
    return $return;
}

function __cookie_set($cookie_name, $cookie_value, $days)
{
    if (is_array($cookie_value)) {
        $cookie_value = serialize($cookie_value);
    }
    setcookie($cookie_name, $cookie_value, time() + 60 * 60 * 24 * $days, '/');
    // immediately set it for current request
    $_COOKIE[$cookie_name] = $cookie_value;
}

function __cookie_delete($cookie_name)
{
    unset($_COOKIE[$cookie_name]);
    setcookie($cookie_name, '', time() - 3600, '/');
}

function __strip($string, $length = 50, $dots = '...')
{
    if (mb_strlen($string) <= $length) {
        return $string;
    }
    return rtrim(mb_substr($string, 0, $length)) . $dots;
}

function __strip_numeric($string)
{
    return preg_replace('/[0-9,.]/', '', $string);
}

function __strip_nonnumeric($string)
{
    return preg_replace('/[^0-9,.]/', '', $string);
}

function __strip_digit($string)
{
    return preg_replace('/[0-9]/', '', $string);
}

function __strip_nondigit($string)
{
    return preg_replace('/[^0-9]/', '', $string);
}

function __strip_whitespace($string)
{
    return preg_replace('/\s+/', '', $string);
}

function __split_newline($string)
{
    return preg_split('/\r\n|\n|\r/', $string);
}

function __remove_emptylines($string)
{
    return preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", PHP_EOL, $string);
}

function __remove_newlines($string)
{
    $string = preg_replace('~[\r\n]+~', '', $string); // remove nl
    $string = str_ireplace(['<br/>', '<br />', '<br>'], '', $string); // remove brs
    return $string;
}

function __atrim($arr)
{
    if( __nx($arr) || (!is_array($arr) && !($arr instanceof Traversable)) )
    {
        return $arr;
    }

    foreach($arr as $arr__key=>$arr__value)
    {
        $arr[$arr__key] = trim($arr__value);
    }
    return $arr;
}

function __o(...$data)
{
    if (!is_array($data)) {
        $data = [$data];
    }
    // prevent html parsing
    array_walk_recursive($data, function (&$data__value) {
        if (is_string($data__value)) {
            $data__value = htmlspecialchars($data__value);
        }
    });
    foreach ($data as $data__value) {
        if (is_array($data__value) || is_object($data__value) || $data__value instanceof Traversable) {
            echo '<pre>';
        }
        var_dump($data__value);
        if (is_array($data__value) || is_object($data__value) || $data__value instanceof Traversable) {
            echo '</pre>';
        }
        echo '<br/>';
    }
}

function __d(...$data)
{
    __o(...$data);
    die();
}

function __validate_date($date)
{
    if (__nx(@$date)) {
        return false;
    }
    $date = explode(' ', $date)[0];
    if (substr_count($date, '-') == 2) {
        $date = explode('-', $date);
        if (checkdate($date[1], $date[2], $date[0])) {
            if ($date[0] >= 2037) {
                return false;
            } // prevent 32-bit problem
            return true;
        }
    } elseif (substr_count($date, '.') == 2) {
        $date = explode('.', $date);
        if (checkdate($date[1], $date[0], $date[2])) {
            if ($date[2] >= 2037) {
                return false;
            } // prevent 32-bit problem
            return true;
        }
    }
    return false;
}

function __validate_url($value)
{
    if (__nx(@$value)) {
        return false;
    }
    $value = mb_strtolower($value);
    $value = str_replace(['ä', 'ö', 'ü'], ['ae', 'oe', 'ue'], $value);
    if (filter_var($value, FILTER_VALIDATE_URL) === false) {
        return false;
    }
    return true;
}

function __validate_email($value)
{
    if (__nx(@$value)) {
        return false;
    }
    $value = mb_strtolower($value);
    $value = str_replace(['ä', 'ö', 'ü'], ['ae', 'oe', 'ue'], $value);
    if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
        return false;
    }
    return true;
}

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
    if (empty($string)) {
        return 'n-a';
    }
    return $string;
}

function __random_string($length = 8, $chars = null)
{
    if ($chars === null) {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    $chars_length = strlen($chars);
    $random_string = '';
    for ($i = 0; $i < $length; $i++) {
        $random_string .= $chars[mt_rand(0, $chars_length - 1)];
    }
    return $random_string;
}

function __is_serialized($string)
{
    if (!is_string($string) || $string == '') {
        return false;
    }
    $data = @unserialize($string);
    if ($string !== 'b:0;' && $data === false) {
        return false;
    }
    return true;
}

function __is_integer($input)
{
    if (__nx(@$input)) {
        return false;
    }
    if (is_int($input)) {
        return true;
    }
    if (is_numeric($input) && $input != (string) (float) $input) {
        return true;
    }
    return false;
}

function __extract($string, $begin, $end)
{
    $pos1 = strpos($string, $begin) + strlen($begin);
    if ($pos1 === false) {
        return false;
    }
    $pos2 = strpos($string, $end, $pos1);
    if ($pos2 === false) {
        return false;
    }
    return substr($string, $pos1, $pos2 - $pos1);
}

function __strposx($haystack, $needle)
{
    $positions = [];
    $last_pos = 0;
    while (($last_pos = strpos($haystack, $needle, $last_pos)) !== false) {
        $positions[] = $last_pos;
        $last_pos += strlen($needle);
    }
    return $positions;
}

function __strposnth($haystack, $needle, $index)
{
    $positions = __strposx($haystack, $needle);
    if (empty($positions) || $index <= 0 || $index > count($positions)) {
        return null;
    }
    return $positions[$index - 1];
}

function __remove_empty($a, $additional = null)
{
    if (($a instanceof Illuminate\Database\Eloquent\Collection || $a instanceof Illuminate\Support\Collection) && $a->count() > 0) {
        foreach ($a as $a__key => $a__value) {
            if (__can_be_looped(@$a__value)) {
                $result = __remove_empty(@$a__value, $additional);
                if (__nx($result)) {
                    $a->forget($a__key);
                } else {
                    $a->put($a__key, $result);
                }
            } elseif (__nx(@$a__value) || ($additional !== null && in_array($a__value, $additional))) {
                $a->forget($a__key);
            }
        }
    } elseif (is_array($a) && !empty($a)) {
        foreach ($a as $a__key => $a__value) {
            if (__can_be_looped(@$a__value)) {
                $result = __remove_empty(@$a__value, $additional);
                if (__nx($result)) {
                    unset($a[$a__key]);
                } else {
                    $a[$a__key] = $result;
                }
            } elseif (__nx(@$a__value) || ($additional !== null && in_array($a__value, $additional, true))) {
                unset($a[$a__key]);
            }
        }
    } elseif (is_object($a) && !empty((array) $a)) {
        foreach ($a as $a__key => $a__value) {
            if (__can_be_looped(@$a__value)) {
                $result = __remove_empty(@$a__value, $additional);
                if (__nx($result)) {
                    unset($a->$a__key);
                } else {
                    $a->$a__key = $result;
                }
            } elseif (__nx(@$a__value) || ($additional !== null && in_array($a__value, $additional, true))) {
                unset($a->$a__key);
            }
        }
    }
    return $a;
}

function __remove(&$arr, $key)
{
    if (__nx($arr)) {
        return;
    }
    $was_object = false;
    if (is_object($arr)) {
        $was_object = true;
        $arr = (array) $arr;
    }
    if (is_array($arr)) {
        unset($arr[$key]);
        $all_numeric = true;
        foreach ($arr as $arr__key => $arr__value) {
            if (!is_numeric($arr__key)) {
                $all_numeric = false;
            }
        }
        if ($all_numeric === true) {
            $arr = array_values($arr);
        }
    }
    if ($was_object === true) {
        $arr = (object) $arr;
    }
    return;
}

function __can_be_looped($a)
{
    if (is_array($a) && !empty($a)) {
        return true;
    }
    if (is_object($a) && !empty((array) $a)) {
        return true;
    }
    if (($a instanceof Illuminate\Database\Eloquent\Collection || $a instanceof Illuminate\Support\Collection) && $a->count() > 0) {
        return true;
    }
    return false;
}

function __array($a = null)
{
    if (__nx($a)) {
        return [];
    }
    if (is_array($a)) {
        return __object_to_array(__array_to_object($a));
    }
    if (is_object($a)) {
        return __object_to_array($a);
    }
    return [$a];
}

function __object($a = null)
{
    if (__nx($a)) {
        return (object) [];
    }
    if (is_object($a)) {
        return __array_to_object(__object_to_array($a));
    }
    if (is_array($a)) {
        return __array_to_object($a);
    }
    return (object) [$a];
}

function __object_to_array($obj)
{
    return json_decode(json_encode($obj), true);
}

function __array_to_object($arr)
{
    $obj = new stdClass();
    foreach ($arr as $k => $v) {
        if (strlen($k)) {
            if (is_array($v)) {
                $obj->$k = __array_to_object($v);
            } else {
                $obj->$k = $v;
            }
        }
    }
    return $obj;
}

function __highlight($string, $query, $strip = false, $strip_length = 500)
{
    if ($strip === true) {
        // get all query begin positions in spot
        $lastPos = 0;
        $positions = [];
        while (($lastPos = mb_stripos($string, $query, $lastPos)) !== false) {
            $positions[] = $lastPos;
            $lastPos = $lastPos + mb_strlen($query);
        }
        // strip away parts
        $placeholder = md5('♥♥♥');
        for ($i = 0; $i < mb_strlen($string); $i++) {
            $strip_now = true;
            foreach ($positions as $p) {
                if ($i >= $p - $strip_length && $i <= $p + mb_strlen($query) + $strip_length) {
                    $strip_now = false;
                }
            }
            if ($strip_now === true) {
                $string = mb_substr($string, 0, $i - 1) . $placeholder . mb_substr($string, $i);
            }
        }
        while (mb_strpos($string, $placeholder . $placeholder) !== false) {
            $string = str_replace($placeholder . $placeholder, $placeholder, $string);
        }
        $string = str_replace($placeholder, ' ... ', $string);
        if (mb_strlen($string) > $strip_length) {
            $string = mb_substr($string, 0, $strip_length) . ' ...';
        }
    }
    // again: get all query begin positions in spot
    $lastPos = 0;
    $positions = [];
    while (($lastPos = mb_stripos($string, $query, $lastPos)) !== false) {
        $positions[] = $lastPos;
        $lastPos = $lastPos + mb_strlen($query);
    }
    // wrap span element around them
    $wrap_begin = '<strong class="highlight">';
    $wrap_end = '</strong>';
    for ($x = 0; $x < count($positions); $x++) {
        $string = substr($string, 0, $positions[$x]) . $wrap_begin . substr($string, $positions[$x], strlen($query)) . $wrap_end . substr($string, $positions[$x] + strlen($query));
        // shift other positions
        for ($y = $x + 1; $y < count($positions); $y++) {
            $positions[$y] = $positions[$y] + mb_strlen($wrap_begin) + mb_strlen($wrap_end);
        }
    }
    return $string;
}

function clean_up_get()
{
    if (__x(@$_GET)) {
        foreach ($_GET as $key => $value) {
            $_GET[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        }
    }
}

function clean_up_post()
{
    if (__x(@$_POST)) {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        }
    }
}

function clean_up()
{
    clean_up_get();
    clean_up_post();
}

function __get($var)
{
    if (__nx(@$_GET[$var])) {
        return null;
    }
    return $_GET[$var];
}

function __post($var)
{
    if (__nx(@$_POST[$var])) {
        return null;
    }
    return $_POST[$var];
}

function __expl($separator = ' ', $array = [], $pos = 0)
{
    return current(array_slice(explode($separator, $array), $pos, 1));
}

function __prg($url = null)
{
    if ($url == null) {
        $url = @$_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';
        $url .= $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?');
        if (__x(@$_GET['page_id'])) {
            $url .= '?page_id=' . $_GET['page_id'];
        }
    }
    header('Location: ' . $url);
    die();
}

function __redirect($url = null)
{
    if ($url == null) {
        $url = @$_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';
        $url .= $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?');
        if (__x(@$_GET['page_id'])) {
            $url .= '?page_id=' . $_GET['page_id'];
        }
    }
    echo '<meta http-equiv="refresh" content="0; url=\'' . $url . '\'">';
    die();
}

function __date($date, $format = null, $mod = null)
{
    if (__nx($date) || $date === true || $date === false) {
        return null;
    }
    // input timestamp
    if (is_numeric($date)) {
        $date = date('Y-m-d', $date);
    }
    // default value for format
    if (__nx($format)) {
        $format = 'Y-m-d';
    }
    // if date has length 10, sort out invalid
    if (strlen($date) === 10 && !__validate_date($date)) {
        return null;
    }
    // pass modification
    if (__x($mod)) {
        $date .= ' ' . $mod;
    }
    if( strtotime($date) === false )
    {
        return null;
    }
    return date($format, strtotime($date));
}

function __datetime($datetime)
{
    if (__nx(@$datetime)) {
        return null;
    }
    return date('Y-m-d', strtotime($datetime)) . 'T' . date('H:i', strtotime($datetime));
}

function __flatten_keys($array)
{
    $return = [];
    foreach ($array as $key => $value) {
        $return[] = $key;
        if (is_array($value)) {
            $return = array_merge($return, __flatten_keys($value));
        }
    }
    return $return;
}

function __flatten_values($array)
{
    $return = [];
    array_walk_recursive($array, function ($a) use (&$return) {
        $return[] = $a;
    });
    return $return;
}

function __inside_out_values($array)
{
    if (__nx($array) || !is_array($array)) {
        return false;
    }
    if (empty($array)) {
        return [];
    }
    $first_key = null;
    foreach ($array as $array__key => $array__value) {
        $first_key = $array__key;
        break;
    }
    $return = [];
    foreach ($array[$first_key] as $array__index => $array__value) {
        foreach ($array as $array__field => $array__data) {
            if (__x(@$array[$array__field][$array__index])) {
                $return[$array__index][$array__field] = $array[$array__field][$array__index];
            }
        }
    }
    $return = __remove_empty($return);
    return $return;
}

function __arrays_to_objects($arr)
{
    if (!is_object($arr) && !is_array($arr)) {
        return $arr;
    }
    if (is_array($arr)) {
        $new = new \stdClass();
        foreach ($arr as $arr__key => $arr__value) {
            if (is_object($arr__value) && isset($arr__value->id)) {
                $new->{intval($arr__value->id)} = $arr__value;
            } elseif (is_array($arr__value) && isset($arr__value['id'])) {
                $new->{intval($arr__value['id'])} = $arr__value;
            } else {
                $new->$arr__key = $arr__value;
            }
        }
        $arr = $new;
    }
    foreach ($arr as $arr__key => $arr__value) {
        if (is_object($arr)) {
            $arr->$arr__key = __arrays_to_objects($arr__value);
        } elseif (is_array($arr)) {
            $arr[$arr__key] = __arrays_to_objects($arr__value);
        }
    }
    return $arr;
}

function __fkey($array__key, $array)
{
    if (array_keys($array)[0] === $array__key) {
        return true;
    }
    return false;
}

function __lkey($array__key, $array)
{
    if (array_keys($array)[count(array_keys($array)) - 1] === $array__key) {
        return true;
    }
    return false;
}

function __last($array)
{
    return array_values(array_slice($array, -1))[0];
}

function __first($array)
{
    return array_values(array_slice($array, 0, 1))[0];
}

function __rand($array)
{
    return $array[array_rand($array)];
}

function __string_is_json($str)
{
    json_decode($str);
    return json_last_error() == JSON_ERROR_NONE;
}

function __curl($url, $data = null, $method = null, $headers = null)
{
    // guess method based on data
    if ($method === null) {
        if (__nx($data)) {
            $method = 'GET';
        } else {
            $method = 'POST';
        }
    }
    if ($method == 'GET' && __x($data)) {
        $url .= '?' . http_build_query($data);
    }
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($curl, CURLOPT_TIMEOUT, 400);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // don't verify certificate
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    /* prepare headers */
    $curl_headers = [];
    if ($method == 'POST' && __x($data)) {
        $curl_headers[] = 'Content-Type: application/json';
        $curl_headers[] = 'Content-Length: ' . strlen(json_encode($data));
    }
    foreach (__i($headers) as $headers__key => $headers__value) {
        $curl_headers[] = $headers__key . ': ' . $headers__value;
    }
    if (__nx($curl_headers)) {
        curl_setopt($curl, CURLOPT_HEADER, false);
    } else {
        curl_setopt($curl, CURLOPT_HTTPHEADER, __nx($curl_headers) ? false : $curl_headers);
    }
    if ($method == 'GET') {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
    }
    if ($method == 'POST') {
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POST, 1);
        if (__x($data)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }
    }
    $result = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    if (__string_is_json($result)) {
        $result = json_decode($result);
    }

    return (object) ['result' => $result, 'status' => $status];
}

function __exception($message = '')
{
    throw new \Exception($message);
}

function __success($message = '')
{
    return (object) ['success' => true, 'message' => $message];
}

function __error($message = '')
{
    return (object) ['success' => false, 'message' => $message];
}

function __os()
{
    if (stristr(PHP_OS, 'DAR')) {
        return 'mac';
    }
    if (stristr(PHP_OS, 'WIN') || stristr(PHP_OS, 'CYGWIN')) {
        return 'windows';
    }
    if (stristr(PHP_OS, 'LINUX')) {
        return 'linux';
    }
    return 'unknown';
}

function __uuid()
{
    $data = random_bytes(16);
    $data[6] = chr((ord($data[6]) & 0x0f) | 0x40); // set version to 0100
    $data[8] = chr((ord($data[8]) & 0x3f) | 0x80); // set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function __url()
{
    if (__nx(@$_SERVER['HTTP_HOST']) || __nx(@$_SERVER['REQUEST_URI'])) {
        return null;
    }
    $url = 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return rtrim($url, '/');
}

function __baseurl()
{
    if (__nx(@$_SERVER['HTTP_HOST'])) {
        return null;
    }
    $url = 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 's' : '') . '://' . $_SERVER['HTTP_HOST'];
    return rtrim($url, '/');
}

function __char_to_int($letters)
{
    $num = 0;
    $arr = array_reverse(str_split($letters));
    for ($i = 0; $i < count($arr); $i++) {
        $num += (ord(strtolower($arr[$i])) - 96) * pow(26, $i);
    }
    return $num;
}

function __int_to_char($num)
{
    $letters = '';
    while ($num > 0) {
        $code = $num % 26 == 0 ? 26 : $num % 26;
        $letters .= chr($code + 64);
        $num = ($num - $code) / 26;
    }
    return strtoupper(strrev($letters));
}

function __inc_char($char, $shift = 1)
{
    return __int_to_char(__char_to_int($char) + $shift);
}

function __dec_char($char, $shift = 1)
{
    return __int_to_char(__char_to_int($char) - $shift);
}

function __log_begin($message = '')
{
    if (!isset($GLOBALS['performance'])) {
        $GLOBALS['performance'] = [];
    }
    $GLOBALS['performance'][] = [
        'message' => $message,
        'time' => microtime(true)
    ];
}

function __log_end($echo = true)
{
    $message = $GLOBALS['performance'][count($GLOBALS['performance']) - 1]['message'];
    $time = number_format(microtime(true) - $GLOBALS['performance'][count($GLOBALS['performance']) - 1]['time'], 5);
    if ($echo === true) {
        echo 'script ' . $message . ' execution time: ' . $time . ' seconds' . PHP_EOL;
    }
    unset($GLOBALS['performance'][count($GLOBALS['performance']) - 1]);
    $GLOBALS['performance'] = array_values($GLOBALS['performance']);
    return [
        'message' => $message,
        'time' => $time
    ];
}

function __image_compress($source, $quality = 90, $destination = null)
{
    if ($destination === null) {
        $destination = $source;
    }
    $info = getimagesize($source);
    if ($info['mime'] === 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
        imagejpeg($image, $destination, $quality);
    } elseif ($info['mime'] === 'image/png') {
        $image = imagecreatefrompng($source);
        imagepng($image, $destination, $quality);
    } elseif ($info['mime'] === 'image/gif') {
        $image = imagecreatefromgif($source);
        imagetruecolortopalette($image, false, 16);
        imagegif($image, $destination);
    }
    return true;
}

function __image_orientate($source, $quality = 90, $destination = null)
{
    if ($destination === null) {
        $destination = $source;
    }
    $info = getimagesize($source);
    if ($info['mime'] === 'image/jpeg') {
        $exif = @exif_read_data($source);
        if (!empty($exif['Orientation']) && in_array($exif['Orientation'], [2, 3, 4, 5, 6, 7, 8])) {
            $image = imagecreatefromjpeg($source);
            if (in_array($exif['Orientation'], [3, 4])) {
                $image = imagerotate($image, 180, 0);
            }
            if (in_array($exif['Orientation'], [5, 6])) {
                $image = imagerotate($image, -90, 0);
            }
            if (in_array($exif['Orientation'], [7, 8])) {
                $image = imagerotate($image, 90, 0);
            }
            if (in_array($exif['Orientation'], [2, 5, 7, 4])) {
                imageflip($image, IMG_FLIP_HORIZONTAL);
            }
            imagejpeg($image, $destination, $quality);
        }
    }
    return true;
}

function __is_external($link)
{
    if (__nx($link)) {
        return false;
    }
    return (strpos($link, __baseurl()) === false && strpos($link, 'mailto') === false && strpos($link, 'tel') === false) || strpos($link, '.pdf') !== false;
}

function __pushId()
{
    /* https://gist.github.com/datasage/fbd4cdc725598e184c7d */
    if (!isset($GLOBALS['lastPushTime'])) {
        $GLOBALS['lastPushTime'] = 0;
    }
    if (!isset($GLOBALS['lastRandChars'])) {
        $GLOBALS['lastRandChars'] = [];
    }
    $PUSH_CHARS = '-0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
    $now = (int) (microtime(true) * 1000);
    $isDuplicateTime = $now === $GLOBALS['lastPushTime'];
    $GLOBALS['lastPushTime'] = $now;
    $timeStampChars = new \SplFixedArray(8);
    for ($i = 7; $i >= 0; $i--) {
        $timeStampChars[$i] = substr($PUSH_CHARS, $now % 64, 1);
        // NOTE: Can't use << here because javascript will convert to int and lose the upper bits.
        $now = (int) floor($now / 64);
    }
    $id = implode('', $timeStampChars->toArray());
    if (!$isDuplicateTime) {
        for ($i = 0; $i < 12; $i++) {
            $GLOBALS['lastRandChars'][$i] = (int) floor(rand(0, 63));
        }
    } else {
        // If the timestamp hasn't changed since last push, use the same random number, except incremented by 1.
        usleep(10); // additionally prevent duplicates
        for ($i = 11; $i >= 0 && $GLOBALS['lastRandChars'][$i] === 63; $i--) {
            $GLOBALS['lastRandChars'][$i] = 0;
        }
        $GLOBALS['lastRandChars'][$i]++;
    }
    for ($i = 0; $i < 12; $i++) {
        $id .= substr($PUSH_CHARS, $GLOBALS['lastRandChars'][$i], 1);
    }
    return $id;
}

/* LEGACY CODE */

// same as __v
function __f(...$args)
{
    foreach ($args as $arg) {
        if (__x(@$arg)) {
            return $arg;
        }
    }
    return null;
}
// swap variables
function __swap(&$x, &$y)
{
    $tmp = $x;
    $x = $y;
    $y = $tmp;
}
// check if multiple variables exists
function __mx()
{
    for ($i = 0; $i < func_num_args(); $i++) {
        $arg = func_get_arg($i);
        if (__nx(@$arg)) {
            return false;
        }
    }
    return true;
}
// check if at least one variable exists
function __ox()
{
    for ($i = 0; $i < func_num_args(); $i++) {
        $arg = func_get_arg($i);
        if (__x(@$arg)) {
            return true;
        }
    }
    return false;
}
// check if array has minimum one variable that exists
function __aox($var)
{
    if (!is_array($var)) {
        return false;
    }
    foreach ($var as $key => $value) {
        if (__x(@$value)) {
            return true;
        }
    }
    return false;
}
// check if every variable in an array exists
function __amx($var)
{
    if (!is_array($var)) {
        return false;
    }
    foreach ($var as $key => $value) {
        if (__nx(@$value)) {
            return false;
        }
    }
    return true;
}
// if first value exists, return second value, otherwise third
function __xe($var, $return, $fallback = null)
{
    if (__x(@$var)) {
        return $return;
    }
    return $fallback;
}
// check equality of two values (only if they both exist, weak check)
function __eq($a, $b)
{
    if (__nx(@$a) && __nx(@$b)) {
        return false;
    }
    if (__nx(@$a) && __x(@$b)) {
        return false;
    }
    if (__x(@$a) && __nx(@$b)) {
        return false;
    }
    if ($a == $b) {
        return true;
    }
    return false;
}
// check inequality of two values (only if they both exist, weak check)
function __neq($a, $b)
{
    return !__eq(@$a, @$b);
}
