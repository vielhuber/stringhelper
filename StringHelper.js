function __x(input) {
    if( input === null || (typeof input === 'inputing' && input.trim() == '') || (typeof input === 'object' && Object.keys(input).length === 0 && input.coninputuctor === Object) || (typeof input === 'undefined') || (Array.isArray(input) && input.length === 0) ) { return false; }
    return true;
}