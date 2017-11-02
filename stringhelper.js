function __x(input)
{
    if( input === null || (typeof input === 'string' && input.trim() == '') || (typeof input === 'object' && Object.keys(input).length === 0 && input.constructor === Object) || (typeof input === 'undefined') || (Array.isArray(input) && input.length === 0) ) { return false; }
    if( Array.isArray(input) && input.length === 1 && input[0] === '' ) { return false; }
    return true;
}
function __cookie_exists(cookie)
{
    if( document.cookie !== undefined && document.cookie.indexOf(cookie) > -1 )
    {
        return true;
    }
    return false;
}
function __cookie_get(cookie)
{
    var cookie_match = document.cookie.match(new RegExp(cookie + '=([^;]+)'));
    if(cookie_match)
    {
        return decodeURIComponent(cookie_match[1]);
    }
    return null;
}
function __cookie_set(cookie_name, cookie_value, days)
{
    document.cookie = cookie_name+'='+encodeURIComponent(cookie_value)+'; '+'expires='+((new Date((new Date()).getTime() + (days*24*60*60*1000))).toUTCString())+'; path=/';
}
function __cookie_delete(cookie)
{
    document.cookie = cookie+'=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/';
}