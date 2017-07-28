function __x(input) {
    if( input === null || (typeof input === 'string' && input.trim() == '') || (typeof input === 'object' && Object.keys(input).length === 0 && input.constructor === Object) || (typeof input === 'undefined') || (Array.isArray(input) && input.length === 0) ) { return false; }
    if( Array.isArray(input) && input.length === 1 && input[0] === '' ) { return false; }
    return true;
}