<?php
/* FUNCTIONS */

if (!function_exists('__x')) {
    function __x($input)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'x'], func_get_args());
    }
}

if (!function_exists('__nx')) {
    function __nx($input)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'nx'], func_get_args());
    }
}

if (!function_exists('__fx')) {
    function __fx($input)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'fx'], func_get_args());
    }
}

if (!function_exists('__fnx')) {
    function __fnx($input)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'fnx'], func_get_args());
    }
}

if (!function_exists('__rx')) {
    function __rx(&$input)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'rx'], [&$input]);
    }
}

if (!function_exists('__rnx')) {
    function __rnx(&$input)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'rnx'], [&$input]);
    }
}

if (!function_exists('__v')) {
    function __v(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'v'], func_get_args());
    }
}

if (!function_exists('__e')) {
    function __e(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'e'], func_get_args());
    }
}

if (!function_exists('__i')) {
    function __i($var)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'i'], func_get_args());
    }
}

if (!function_exists('__empty')) {
    function __empty()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'empty'], func_get_args());
    }
}

if (!function_exists('__x_all')) {
    function __x_all(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'x_all'], func_get_args());
    }
}

if (!function_exists('__nx_all')) {
    function __nx_all(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'nx_all'], func_get_args());
    }
}

if (!function_exists('__x_one')) {
    function __x_one(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'x_one'], func_get_args());
    }
}

if (!function_exists('__true_one')) {
    function __true_one(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'true_one'], func_get_args());
    }
}

if (!function_exists('__false_one')) {
    function __false_one(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'false_one'], func_get_args());
    }
}

if (!function_exists('__true_all')) {
    function __true_all(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'true_all'], func_get_args());
    }
}

if (!function_exists('__false_all')) {
    function __false_all(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'false_all'], func_get_args());
    }
}

if (!function_exists('__nx_one')) {
    function __nx_one(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'nx_one'], func_get_args());
    }
}

if (!function_exists('__true')) {
    function __true($val)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'true'], func_get_args());
    }
}

if (!function_exists('__false')) {
    function __false($val)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'false'], func_get_args());
    }
}

if (!function_exists('__cookie_exists')) {
    function __cookie_exists($cookie_name)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'cookie_exists'], func_get_args());
    }
}

if (!function_exists('__cookie_get')) {
    function __cookie_get($cookie_name)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'cookie_get'], func_get_args());
    }
}

if (!function_exists('__cookie_set')) {
    function __cookie_set($cookie_name, $cookie_value, $days = 30, $options = [])
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'cookie_set'], func_get_args());
    }
}

if (!function_exists('__cookie_delete')) {
    function __cookie_delete($cookie_name)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'cookie_delete'], func_get_args());
    }
}

if (!function_exists('__strip')) {
    function __strip($string, $length = 50, $dots = '...')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strip'], func_get_args());
    }
}

if (!function_exists('__strip_numeric')) {
    function __strip_numeric($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strip_numeric'], func_get_args());
    }
}

if (!function_exists('__strip_nonnumeric')) {
    function __strip_nonnumeric($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strip_nonnumeric'], func_get_args());
    }
}

if (!function_exists('__strip_digit')) {
    function __strip_digit($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strip_digit'], func_get_args());
    }
}

if (!function_exists('__strip_nondigit')) {
    function __strip_nondigit($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strip_nondigit'], func_get_args());
    }
}

if (!function_exists('__strip_nonchars')) {
    function __strip_nonchars($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strip_nonchars'], func_get_args());
    }
}

if (!function_exists('__strip_whitespace')) {
    function __strip_whitespace($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strip_whitespace'], func_get_args());
    }
}

if (!function_exists('__strip_whitespace_collapsed')) {
    function __strip_whitespace_collapsed($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strip_whitespace_collapsed'], func_get_args());
    }
}

if (!function_exists('__strip_tags')) {
    function __strip_tags($string, $tags, $with_content = false)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strip_tags'], func_get_args());
    }
}

if (!function_exists('__split_newline')) {
    function __split_newline($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'split_newline'], func_get_args());
    }
}

if (!function_exists('__split_whitespace')) {
    function __split_whitespace($string, $len)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'split_whitespace'], func_get_args());
    }
}

if (!function_exists('__remove_emptylines')) {
    function __remove_emptylines($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_emptylines'], func_get_args());
    }
}

if (!function_exists('__remove_newlines')) {
    function __remove_newlines($string, $replace = '')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_newlines'], func_get_args());
    }
}

if (!function_exists('__br2nl')) {
    function __br2nl($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'br2nl'], func_get_args());
    }
}

if (!function_exists('__truncate_string')) {
    function __truncate_string($str, $len = 50, $chars = '...')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'truncate_string'], func_get_args());
    }
}

if (!function_exists('__trim_whitespace')) {
    function __trim_whitespace($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'trim_whitespace'], func_get_args());
    }
}

if (!function_exists('__trim_every_line')) {
    function __trim_every_line($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'trim_every_line'], func_get_args());
    }
}

if (!function_exists('__trim')) {
    function __trim($str, $arr, $replace = '', $mode = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'trim'], func_get_args());
    }
}

if (!function_exists('__ltrim')) {
    function __ltrim($str, $arr)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'ltrim'], func_get_args());
    }
}

if (!function_exists('__rtrim')) {
    function __rtrim($str, $arr)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'rtrim'], func_get_args());
    }
}

if (!function_exists('__strrev')) {
    function __strrev($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strrev'], func_get_args());
    }
}

if (!function_exists('__atrim')) {
    function __atrim($arr)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'atrim'], func_get_args());
    }
}

if (!function_exists('__o')) {
    function __o(...$data)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'o'], func_get_args());
    }
}

if (!function_exists('__d')) {
    function __d(...$data)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'd'], func_get_args());
    }
}

if (!function_exists('__anonymize_ip')) {
    function __anonymize_ip($value = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'anonymize_ip'], func_get_args());
    }
}

if (!function_exists('__password_strength')) {
    function __password_strength($pwd)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'password_strength'], func_get_args());
    }
}

if (!function_exists('__distance_haversine')) {
    function __distance_haversine($p1, $p2)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'distance_haversine'], func_get_args());
    }
}

if (!function_exists('__validate_iban')) {
    function __validate_iban($iban)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'validate_iban'], func_get_args());
    }
}

if (!function_exists('__validate_date')) {
    function __validate_date($date)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'validate_date'], func_get_args());
    }
}

if (!function_exists('__validate_url')) {
    function __validate_url($value)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'validate_url'], func_get_args());
    }
}

if (!function_exists('__validate_email')) {
    function __validate_email($value)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'validate_email'], func_get_args());
    }
}

if (!function_exists('__email_tokenize_str2arr')) {
    function __email_tokenize_str2arr($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'email_tokenize_str2arr'], func_get_args());
    }
}

if (!function_exists('__email_tokenize_arr2str')) {
    function __email_tokenize_arr2str($arr)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'email_tokenize_arr2str'], func_get_args());
    }
}

if (!function_exists('__phone_tokenize')) {
    function __phone_tokenize($value)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'phone_tokenize'], func_get_args());
    }
}

if (!function_exists('__phone_normalize')) {
    function __phone_normalize($value)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'phone_normalize'], func_get_args());
    }
}

if (!function_exists('__phone_country_codes')) {
    function __phone_country_codes()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'phone_country_codes'], func_get_args());
    }
}

if (!function_exists('__phone_area_codes')) {
    function __phone_area_codes()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'phone_area_codes'], func_get_args());
    }
}

if (!function_exists('__phone_area_codes_landline')) {
    function __phone_area_codes_landline()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'phone_area_codes_landline'], func_get_args());
    }
}

if (!function_exists('__phone_area_codes_mobile')) {
    function __phone_area_codes_mobile()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'phone_area_codes_mobile'], func_get_args());
    }
}

if (!function_exists('__phone_is_landline')) {
    function __phone_is_landline($value)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'phone_is_landline'], func_get_args());
    }
}

if (!function_exists('__phone_is_mobile')) {
    function __phone_is_mobile($value)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'phone_is_mobile'], func_get_args());
    }
}

if (!function_exists('__url_normalize')) {
    function __url_normalize($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'url_normalize'], func_get_args());
    }
}

if (!function_exists('__remove_emoji')) {
    function __remove_emoji($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_emoji'], func_get_args());
    }
}

if (!function_exists('__remove_accents')) {
    function __remove_accents($string, $replace_umlauts = false)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_accents'], func_get_args());
    }
}

if (!function_exists('__remove_non_printable_chars')) {
    function __remove_non_printable_chars($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_non_printable_chars'], func_get_args());
    }
}

if (!function_exists('__minify_html')) {
    function __minify_html($html)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'minify_html'], func_get_args());
    }
}

if (!function_exists('__str_to_dom')) {
    function __str_to_dom($html)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'str_to_dom'], func_get_args());
    }
}

if (!function_exists('__dom_to_str')) {
    function __dom_to_str($dom)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'dom_to_str'], func_get_args());
    }
}

if (!function_exists('__translate_google')) {
    function __translate_google($str, $from_lng, $to_lng, $api_key, $proxy = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'translate_google'], func_get_args());
    }
}

if (!function_exists('__translate_microsoft')) {
    function __translate_microsoft($str, $from_lng, $to_lng, $api_key, $proxy = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'translate_microsoft'], func_get_args());
    }
}

if (!function_exists('__translate_deepl')) {
    function __translate_deepl($str, $from_lng, $to_lng, $api_key, $proxy = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'translate_deepl'], func_get_args());
    }
}

if (!function_exists('__chatgpt')) {
    function __chatgpt($model = null, $temperature = null, $api_key = null, $session_id = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'chatgpt'], func_get_args());
    }
}

if (!function_exists('__ai')) {
    function __ai($service, $model = null, $temperature = null, $api_key = null, $session_id = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'ai'], func_get_args());
    }
}

if (!function_exists('__first_char_is_uppercase')) {
    function __first_char_is_uppercase($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'first_char_is_uppercase'], func_get_args());
    }
}

if (!function_exists('__set_first_char_uppercase')) {
    function __set_first_char_uppercase($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'set_first_char_uppercase'], func_get_args());
    }
}

if (!function_exists('__slug')) {
    function __slug($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'slug'], func_get_args());
    }
}

if (!function_exists('__random_string')) {
    function __random_string($length = 8, $chars = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'random_string'], func_get_args());
    }
}

if (!function_exists('__arr_without')) {
    function __arr_without($array, $cols)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'arr_without'], func_get_args());
    }
}

if (!function_exists('__shuffle')) {
    function __shuffle($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'shuffle'], func_get_args());
    }
}

if (!function_exists('__shuffle_assoc')) {
    function __shuffle_assoc($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'shuffle_assoc'], func_get_args());
    }
}

if (!function_exists('__mb_strcmp')) {
    function __mb_strcmp($a, $b)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'mb_strcmp'], func_get_args());
    }
}

if (!function_exists('__mb_strcasecmp')) {
    function __mb_strcasecmp($a, $b)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'mb_strcasecmp'], func_get_args());
    }
}

if (!function_exists('__mb_strnatcmp')) {
    function __mb_strnatcmp($a, $b)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'mb_strnatcmp'], func_get_args());
    }
}

if (!function_exists('__mb_strnatcasecmp')) {
    function __mb_strnatcasecmp($a, $b)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'mb_strnatcasecmp'], func_get_args());
    }
}

if (!function_exists('__array_get')) {
    function __array_get($array, $key, $default = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_get'], func_get_args());
    }
}

if (!function_exists('__array_set')) {
    function __array_set(&$array, $key, $value)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_set'], [&$array, $key, $value]);
    }
}

if (!function_exists('__array_multisort')) {
    function __array_multisort($args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_multisort'], func_get_args());
    }
}

if (!function_exists('__array_multisort_get_order')) {
    function __array_multisort_get_order($a, $b, $dir = 'asc')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_multisort_get_order'], func_get_args());
    }
}

if (!function_exists('__array_group_by')) {
    function __array_group_by($array, $key)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_group_by'], func_get_args());
    }
}

if (!function_exists('__array_group_by_aggregate')) {
    function __array_group_by_aggregate($array, $keys, $aggregate_functions)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_group_by_aggregate'], func_get_args());
    }
}

if (!function_exists('__array_unique')) {
    function __array_unique($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_unique'], func_get_args());
    }
}

if (!function_exists('__array_map_deep')) {
    function __array_map_deep($array, $callback, $array__key = null, $key_chain = [])
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_map_deep'], func_get_args());
    }
}

if (!function_exists('__array_map_deep_all')) {
    function __array_map_deep_all($array, $callback, $array__key = null, $key_chain = [])
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_map_deep_all'], func_get_args());
    }
}

if (!function_exists('__array_walk_recursive_all')) {
    function __array_walk_recursive_all(&$array, $callback, $array__key = null, $key_chain = [])
    {
        return call_user_func_array(
            ['\vielhuber\stringhelper\__', 'array_walk_recursive_all'],
            [&$array, $callback, $array__key, $key_chain]
        );
    }
}

if (!function_exists('__array_filter_recursive_all')) {
    function __array_filter_recursive_all($arr, $callback)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_filter_recursive_all'], func_get_args());
    }
}

if (!function_exists('__array_map_keys')) {
    function __array_map_keys($callback, $arr)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_map_keys'], func_get_args());
    }
}

if (!function_exists('__array_map_keys_values')) {
    function __array_map_keys_values($callback, $arr)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_map_keys_values'], func_get_args());
    }
}

if (!function_exists('__encode_data')) {
    function __encode_data(...$data)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'encode_data'], func_get_args());
    }
}

if (!function_exists('__decode_data')) {
    function __decode_data($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'decode_data'], func_get_args());
    }
}

if (!function_exists('__ask')) {
    function __ask($question, $whitelist = [])
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'ask'], func_get_args());
    }
}

if (!function_exists('__progress')) {
    function __progress($done, $total, $info = '', $width = 50, $char = '=')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'progress'], func_get_args());
    }
}

if (!function_exists('__mb_sprintf')) {
    function __mb_sprintf($format, ...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'mb_sprintf'], func_get_args());
    }
}

if (!function_exists('__is_serialized')) {
    function __is_serialized($data, $weak = false)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'is_serialized'], func_get_args());
    }
}

if (!function_exists('__is_integer')) {
    function __is_integer($input)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'is_integer'], func_get_args());
    }
}

if (!function_exists('__float_to_ratio')) {
    function __float_to_ratio($n)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'float_to_ratio'], func_get_args());
    }
}

if (!function_exists('__extract')) {
    function __extract($string, $begin, $end)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'extract'], func_get_args());
    }
}

if (!function_exists('__strposx')) {
    function __strposx($haystack, $needle)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strposx'], func_get_args());
    }
}

if (!function_exists('__strposnth')) {
    function __strposnth($haystack, $needle, $index)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strposnth'], func_get_args());
    }
}

if (!function_exists('__remove_empty')) {
    function __remove_empty($a, $additional = null, $callback = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_empty'], func_get_args());
    }
}

if (!function_exists('__remove')) {
    function __remove($arr, $key)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove'], func_get_args());
    }
}

if (!function_exists('__remove_by_key')) {
    function __remove_by_key($arr, $key)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_by_key'], func_get_args());
    }
}

if (!function_exists('__remove_by_value')) {
    function __remove_by_value($arr, $value)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_by_value'], func_get_args());
    }
}

if (!function_exists('__arr_depth')) {
    function __arr_depth($a)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'arr_depth'], func_get_args());
    }
}

if (!function_exists('__arr_append')) {
    function __arr_append($array, $value, $condition = true)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'arr_append'], func_get_args());
    }
}

if (!function_exists('__arr_prepend')) {
    function __arr_prepend($array, $value, $condition = true)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'arr_prepend'], func_get_args());
    }
}

if (!function_exists('__foreach_nested')) {
    function __foreach_nested(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'foreach_nested'], func_get_args());
    }
}

if (!function_exists('__can_be_looped')) {
    function __can_be_looped($a)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'can_be_looped'], func_get_args());
    }
}

if (!function_exists('__array')) {
    function __array($a = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array'], func_get_args());
    }
}

if (!function_exists('__object')) {
    function __object($a = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'object'], func_get_args());
    }
}

if (!function_exists('__object_to_array')) {
    function __object_to_array($obj)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'object_to_array'], func_get_args());
    }
}

if (!function_exists('__array_to_object')) {
    function __array_to_object($arr)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array_to_object'], func_get_args());
    }
}

if (!function_exists('__highlight')) {
    function __highlight($string, $query, $strip = false, $strip_length = 500)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'highlight'], func_get_args());
    }
}

if (!function_exists('__referer')) {
    function __referer()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'referer'], func_get_args());
    }
}

if (!function_exists('__clean_up_get')) {
    function __clean_up_get()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'clean_up_get'], func_get_args());
    }
}

if (!function_exists('__clean_up_post')) {
    function __clean_up_post()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'clean_up_post'], func_get_args());
    }
}

if (!function_exists('__clean_up')) {
    function __clean_up()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'clean_up'], func_get_args());
    }
}

if (!function_exists('__read_env')) {
    function __read_env($filename)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'read_env'], func_get_args());
    }
}

if (!function_exists('__is_repetitive_action')) {
    function __is_repetitive_action($name = '', $minutes = 60, $whitelist = [])
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'is_repetitive_action'], func_get_args());
    }
}

if (!function_exists('__has_spamwords')) {
    function __has_spamwords($message, $custom_blacklist = [], $custom_whitelist = [])
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'has_spamwords'], func_get_args());
    }
}

if (!function_exists('__ip_is_on_spamlist')) {
    function __ip_is_on_spamlist($ip)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'ip_is_on_spamlist'], func_get_args());
    }
}

if (!function_exists('__get')) {
    function __get($var)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'get'], func_get_args());
    }
}

if (!function_exists('__post')) {
    function __post($var)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'post'], func_get_args());
    }
}

if (!function_exists('__filter_url_args')) {
    function __filter_url_args($url, $filter = [])
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'filter_url_args'], func_get_args());
    }
}

if (!function_exists('__expl')) {
    function __expl($separator = ' ', $array = [], $pos = 0)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'expl'], func_get_args());
    }
}

if (!function_exists('__prg')) {
    function __prg($url = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'prg'], func_get_args());
    }
}

if (!function_exists('__system_message')) {
    function __system_message($content, $type = 'success')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'system_message'], func_get_args());
    }
}

if (!function_exists('__system_messages')) {
    function __system_messages()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'system_messages'], func_get_args());
    }
}

if (!function_exists('__redirect_to')) {
    function __redirect_to($url = null, $code_or_seconds = null, $mode = 'php')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'redirect_to'], func_get_args());
    }
}

if (!function_exists('__date')) {
    function __date($date = null, $format = null, $mod = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'date'], func_get_args());
    }
}

if (!function_exists('__validate_date_format')) {
    function __validate_date_format($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'validate_date_format'], func_get_args());
    }
}

if (!function_exists('__validate_date_mod')) {
    function __validate_date_mod($mod)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'validate_date_mod'], func_get_args());
    }
}

if (!function_exists('__datetime')) {
    function __datetime($datetime)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'datetime'], func_get_args());
    }
}

if (!function_exists('__date_reset_time')) {
    function __date_reset_time($date)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'date_reset_time'], func_get_args());
    }
}

if (!function_exists('__age_from_date')) {
    function __age_from_date($date_birth, $date_relative = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'age_from_date'], func_get_args());
    }
}

if (!function_exists('__strftime')) {
    function __strftime($format, $timestamp = null, $locale = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'strftime'], func_get_args());
    }
}

if (!function_exists('__age_from_date_weeks')) {
    function __age_from_date_weeks($date_birth, $date_relative = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'age_from_date_weeks'], func_get_args());
    }
}

if (!function_exists('__age_from_date_days')) {
    function __age_from_date_days($date_birth, $date_relative = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'age_from_date_days'], func_get_args());
    }
}

if (!function_exists('__remove_zero_decimals')) {
    function __remove_zero_decimals($num)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_zero_decimals'], func_get_args());
    }
}

if (!function_exists('__remove_leading_zeros')) {
    function __remove_leading_zeros($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_leading_zeros'], func_get_args());
    }
}

if (!function_exists('__flatten_keys')) {
    function __flatten_keys($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'flatten_keys'], func_get_args());
    }
}

if (!function_exists('__flatten_values')) {
    function __flatten_values($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'flatten_values'], func_get_args());
    }
}

if (!function_exists('__inside_out_values')) {
    function __inside_out_values($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'inside_out_values'], func_get_args());
    }
}

if (!function_exists('__arrays_to_objects')) {
    function __arrays_to_objects($arr)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'arrays_to_objects'], func_get_args());
    }
}

if (!function_exists('__loop_status')) {
    function __loop_status(&$array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'loop_status'], [&$array]);
    }
}

if (!function_exists('__fkey')) {
    function __fkey($array__key, $array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'fkey'], func_get_args());
    }
}

if (!function_exists('__lkey')) {
    function __lkey($array__key, $array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'lkey'], func_get_args());
    }
}

if (!function_exists('__last')) {
    function __last($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'last'], func_get_args());
    }
}

if (!function_exists('__first')) {
    function __first($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'first'], func_get_args());
    }
}

if (!function_exists('__first_key')) {
    function __first_key($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'first_key'], func_get_args());
    }
}

if (!function_exists('__rand')) {
    function __rand($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'rand'], func_get_args());
    }
}

if (!function_exists('__remove_first')) {
    function __remove_first($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_first'], func_get_args());
    }
}

if (!function_exists('__remove_last')) {
    function __remove_last($array)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'remove_last'], func_get_args());
    }
}

if (!function_exists('__string_is_json')) {
    function __string_is_json($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'string_is_json'], func_get_args());
    }
}

if (!function_exists('__string_is_html')) {
    function __string_is_html($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'string_is_html'], func_get_args());
    }
}

if (!function_exists('__fetch')) {
    function __fetch($url, $method = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'fetch'], func_get_args());
    }
}

if (!function_exists('__curl')) {
    function __curl(
        $url = '',
        $data = null,
        $method = null,
        $headers = null,
        $enable_cookies = false,
        $send_as_json = true,
        $timeout = 60,
        $basic_auth = null,
        $cookies = null,
        $follow_redirects = true,
        $proxy = null
    ) {
        return \vielhuber\stringhelper\__::curl(
            $url,
            $data,
            $method,
            $headers,
            $enable_cookies,
            $send_as_json,
            $timeout,
            $basic_auth,
            $cookies,
            $follow_redirects,
            $proxy
        );
    }
}

if (!function_exists('__has_basic_auth')) {
    function __has_basic_auth($url)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'has_basic_auth'], func_get_args());
    }
}

if (!function_exists('__check_basic_auth')) {
    function __check_basic_auth($url, $username = '', $password = '')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'check_basic_auth'], func_get_args());
    }
}

if (!function_exists('__json_response')) {
    function __json_response($data, $code = 200)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'json_response'], func_get_args());
    }
}

if (!function_exists('__input')) {
    function __input($key = null, $fallback = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'input'], func_get_args());
    }
}

if (!function_exists('__extract_urls_from_sitemap')) {
    function __extract_urls_from_sitemap($url, $basic_auth = null, $include_last_modified = false)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'extract_urls_from_sitemap'], func_get_args());
    }
}

if (!function_exists('__extract_title_from_url')) {
    function __extract_title_from_url($url)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'extract_title_from_url'], func_get_args());
    }
}

if (!function_exists('__extract_meta_desc_from_url')) {
    function __extract_meta_desc_from_url($url)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'extract_meta_desc_from_url'], func_get_args());
    }
}

if (!function_exists('__get_mime_type')) {
    function __get_mime_type($filename)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'get_mime_type'], func_get_args());
    }
}

if (!function_exists('__mime_type_to_extension')) {
    function __mime_type_to_extension($mime_type)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'mime_type_to_extension'], func_get_args());
    }
}

if (!function_exists('__extension_to_mime_types')) {
    function __extension_to_mime_types($extension)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'extension_to_mime_types'], func_get_args());
    }
}

if (!function_exists('__reverse_proxy')) {
    function __reverse_proxy($url, $receipts, $output_and_die = true)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'reverse_proxy'], func_get_args());
    }
}

if (!function_exists('__exception')) {
    function __exception($message = '')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'exception'], func_get_args());
    }
}

if (!function_exists('__exception_message')) {
    function __exception_message($t)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'exception_message'], func_get_args());
    }
}

if (!function_exists('__success')) {
    function __success($message = '')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'success'], func_get_args());
    }
}

if (!function_exists('__error')) {
    function __error($message = '')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'error'], func_get_args());
    }
}

if (!function_exists('__hook_fire')) {
    function __hook_fire($hook_name, $arg = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'hook_fire'], func_get_args());
    }
}

if (!function_exists('__hook_add')) {
    function __hook_add($hook_name, $fun, $priority = 0)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'hook_add'], func_get_args());
    }
}

if (!function_exists('__os')) {
    function __os()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'os'], func_get_args());
    }
}

if (!function_exists('__uuid')) {
    function __uuid()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'uuid'], func_get_args());
    }
}

if (!function_exists('__validate_uuid')) {
    function __validate_uuid($str, $strict_check = true)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'validate_uuid'], func_get_args());
    }
}

if (!function_exists('__url')) {
    function __url()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'url'], func_get_args());
    }
}

if (!function_exists('__urlWithoutArgs')) {
    function __urlWithoutArgs()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'urlWithoutArgs'], func_get_args());
    }
}

if (!function_exists('__baseurl')) {
    function __baseurl($include_subpath = false)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'baseurl'], func_get_args());
    }
}

if (!function_exists('__timestamp_excel_to_str')) {
    function __timestamp_excel_to_str($timestamp)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'timestamp_excel_to_str'], func_get_args());
    }
}

if (!function_exists('__timestamp_str_to_excel')) {
    function __timestamp_str_to_excel($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'timestamp_str_to_excel'], func_get_args());
    }
}

if (!function_exists('__video_info')) {
    function __video_info($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'video_info'], func_get_args());
    }
}

if (!function_exists('__char_to_int')) {
    function __char_to_int($letters)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'char_to_int'], func_get_args());
    }
}

if (!function_exists('__int_to_char')) {
    function __int_to_char($num)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'int_to_char'], func_get_args());
    }
}

if (!function_exists('__inc_char')) {
    function __inc_char($char, $shift = 1)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'inc_char'], func_get_args());
    }
}

if (!function_exists('__dec_char')) {
    function __dec_char($char, $shift = 1)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'dec_char'], func_get_args());
    }
}

if (!function_exists('__str_search_replace')) {
    function __str_search_replace($str, $regex, $callback)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'str_search_replace'], func_get_args());
    }
}

if (!function_exists('__str_replace_first')) {
    function __str_replace_first($search, $replace, $str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'str_replace_first'], func_get_args());
    }
}

if (!function_exists('__str_replace_last')) {
    function __str_replace_last($search, $replace, $str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'str_replace_last'], func_get_args());
    }
}

if (!function_exists('__csv2array')) {
    function __csv2array($filename, $delimiter = ';', $enclosure = '"')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'csv2array'], func_get_args());
    }
}

if (!function_exists('__array2csv')) {
    function __array2csv($array, $filename, $delimiter = ';', $enclosure = '"')
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array2csv'], func_get_args());
    }
}

if (!function_exists('__xml2array')) {
    function __xml2array($filename)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'xml2array'], func_get_args());
    }
}

if (!function_exists('__array2xml')) {
    function __array2xml($arr, $filename = null, $prolog_attrs = null, $strip_empty_tags = false)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'array2xml'], func_get_args());
    }
}

if (!function_exists('__sed_replace')) {
    function __sed_replace($replacements, $filename)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'sed_replace'], func_get_args());
    }
}

if (!function_exists('__sed_prepend')) {
    function __sed_prepend($str, $filename)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'sed_prepend'], func_get_args());
    }
}

if (!function_exists('__sed_append')) {
    function __sed_append($str, $filename)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'sed_append'], func_get_args());
    }
}

if (!function_exists('__sed_escape')) {
    function __sed_escape($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'sed_escape'], func_get_args());
    }
}

if (!function_exists('__diff')) {
    function __diff($str1, $str2)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'diff'], func_get_args());
    }
}

if (!function_exists('__line_endings_convert')) {
    function __line_endings_convert($str, $os)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'line_endings_convert'], func_get_args());
    }
}

if (!function_exists('__line_endings_weak_equals')) {
    function __line_endings_weak_equals($str1, $str2)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'line_endings_weak_equals'], func_get_args());
    }
}

if (!function_exists('__log_begin')) {
    function __log_begin($message = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'log_begin'], func_get_args());
    }
}

if (!function_exists('__log_end')) {
    function __log_end($message = null, $echo = true)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'log_end'], func_get_args());
    }
}

if (!function_exists('__image_compress')) {
    function __image_compress($source, $quality = 90, $destination = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'image_compress'], func_get_args());
    }
}

if (!function_exists('__image_orientate')) {
    function __image_orientate($source, $quality = 90, $destination = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'image_orientate'], func_get_args());
    }
}

if (!function_exists('__file_extension')) {
    function __file_extension($filename)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'file_extension'], func_get_args());
    }
}

if (!function_exists('__is_utf8')) {
    function __is_utf8($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'is_utf8'], func_get_args());
    }
}

if (!function_exists('__to_utf8')) {
    function __to_utf8($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'to_utf8'], func_get_args());
    }
}

if (!function_exists('__utf8_encode')) {
    function __utf8_encode($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'utf8_encode'], func_get_args());
    }
}

if (!function_exists('__utf8_decode')) {
    function __utf8_decode($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'utf8_decode'], func_get_args());
    }
}

if (!function_exists('__iptc_codes')) {
    function __iptc_codes()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'iptc_codes'], func_get_args());
    }
}

if (!function_exists('__iptc_code')) {
    function __iptc_code($code)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'iptc_code'], func_get_args());
    }
}

if (!function_exists('__iptc_keyword')) {
    function __iptc_keyword($code)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'iptc_keyword'], func_get_args());
    }
}

if (!function_exists('__iptc_read')) {
    function __iptc_read($filename, $field = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'iptc_read'], func_get_args());
    }
}

if (!function_exists('__iptc_write')) {
    function __iptc_write($filename, $field, $value = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'iptc_write'], func_get_args());
    }
}

if (!function_exists('__encrypt')) {
    function __encrypt($string, $salt = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'encrypt'], func_get_args());
    }
}

if (!function_exists('__decrypt')) {
    function __decrypt($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'decrypt'], func_get_args());
    }
}

if (!function_exists('__encrypt_poor')) {
    function __encrypt_poor($string)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'encrypt_poor'], func_get_args());
    }
}

if (!function_exists('__decrypt_poor')) {
    function __decrypt_poor($token, $once = false)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'decrypt_poor'], func_get_args());
    }
}

if (!function_exists('__files_in_folder')) {
    function __files_in_folder($folder = '.', $recursive = false, $exclude = [], $abspath = false)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'files_in_folder'], func_get_args());
    }
}

if (!function_exists('__zip')) {
    function __zip($output, $files_or_folders, $strip_paths = false)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'zip'], func_get_args());
    }
}

if (!function_exists('__unzip')) {
    function __unzip($input, $folder)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'unzip'], func_get_args());
    }
}

if (!function_exists('__rrmdir')) {
    function __rrmdir($dir)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'rrmdir'], func_get_args());
    }
}

if (!function_exists('__is_base64_encoded')) {
    function __is_base64_encoded($str)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'is_base64_encoded'], func_get_args());
    }
}

if (!function_exists('__is_eloquent_builder')) {
    function __is_eloquent_builder($data)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'is_eloquent_builder'], func_get_args());
    }
}

if (!function_exists('__is_external')) {
    function __is_external($link)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'is_external'], func_get_args());
    }
}

if (!function_exists('__pushId')) {
    function __pushId()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'pushId'], func_get_args());
    }
}

/* CLASSES */

if (!class_exists('__empty_helper')) {
    class __empty_helper implements \JsonSerializable
    {
        public function __call($name, $arguments)
        {
            return new \__empty_helper();
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
        public function jsonSerialize(): mixed
        {
            return null;
        }
        public function __get($property)
        {
            return null;
        }
    }
}

if (!class_exists('ExtendedException')) {
    class ExtendedException extends \Exception
    {
        public function __construct($message = null, $code = 0, Exception $previous = null)
        {
            if (!is_string($message)) {
                $message = serialize($message);
            }
            parent::__construct($message, $code, $previous);
        }
    }
}

/* LEGACY CODE */

if (!function_exists('__redirect')) {
    function __redirect($url = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'redirect'], func_get_args());
    }
}

if (!function_exists('__f')) {
    function __f(...$args)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'f'], func_get_args());
    }
}

if (!function_exists('__swap')) {
    function __swap(&$x, &$y)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'swap'], [&$x, &$y]);
    }
}

if (!function_exists('__mx')) {
    function __mx()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'mx'], func_get_args());
    }
}

if (!function_exists('__ox')) {
    function __ox()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'ox'], func_get_args());
    }
}

if (!function_exists('__aox')) {
    function __aox($var)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'aox'], func_get_args());
    }
}

if (!function_exists('__amx')) {
    function __amx($var)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'amx'], func_get_args());
    }
}

if (!function_exists('__xe')) {
    function __xe($var, $return, $fallback = null)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'xe'], func_get_args());
    }
}

if (!function_exists('__eq')) {
    function __eq($a, $b)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'eq'], func_get_args());
    }
}

if (!function_exists('__neq')) {
    function __neq($a, $b)
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'neq'], func_get_args());
    }
}

if (!function_exists('clean_up_get')) {
    function clean_up_get()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'clean_up_get'], func_get_args());
    }
}

if (!function_exists('clean_up_post')) {
    function clean_up_post()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'clean_up_post'], func_get_args());
    }
}

if (!function_exists('clean_up')) {
    function clean_up()
    {
        return call_user_func_array(['\vielhuber\stringhelper\__', 'clean_up'], func_get_args());
    }
}
