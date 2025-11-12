<?php
require_once '../src/__.php';
require_once '../src/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <title>.</title>
    <style type='text/css'>
	* {
        box-sizing: border-box;
        margin:0;
    }
    body {
        font-size:12px;
        font-family:Arial;
        padding:20px;
    }
    h2 {
        margin-bottom:10px;
    }
    h2:not(:first-child) {
        margin-top:50px;
    }
    table {
        width: 100%;
        table-layout: fixed;
        border-collapse: collapse;
    }
    td {
        border: 1px solid #000;
        text-align: center;
        padding: 0;
        overflow: hidden;
    }
    tr:first-child td, td:first-child {
        font-weight:bold;
        background-color:#eee;
    }
    </style>
</head>
<body>

<?php
$items = [
    'null' => null,
    'false' => false,
    'true' => true,
    '0' => 0,
    '1' => 1,
    '-1' => -1,
    '[]' => [],
    '\'0\'' => '0',
    '\'1\'' => '1',
    '\'-1\'' => '-1',
    '\'\'' => '',
    '\'false\'' => 'false',
    '\'true\'' => 'true',
    '\'str\'' => 'str',
    '\'null\'' => 'null',
    'new stdClass' => new stdClass(),
    '$_GET[\'undefined\']' => 'error',
    '@$_GET[\'undefined\']' => @$_GET['undefined'],
    '[\'\']' => [''],
    '\' \'' => ' ',
    '[0,1]' => [0, 1],
    '[0]' => [0],
    '\'a:0:{}\'' => 'a:0:{}',
    '\'b:1;\'' => 'b:1;',
    '\'b:0;\'' => 'b:0;'
];
$output = '';
$output .= '| ';
$output .= '| <sub>if(__x($))</sub> ';
$output .= '| <sub>if(__true($))</sub> ';
$output .= '| <sub>if(__false($))</sub> ';
$output .= '| <sub>if($ !== null)</sub> ';
$output .= '| <sub>if($ != null)</sub> ';
$output .= '| <sub>if($ !== false)</sub> ';
$output .= '| <sub>if($ != false)</sub> ';
$output .= '| <sub>if($ === true)</sub> ';
$output .= '| <sub>if($ == true)</sub> ';
$output .= '| <sub>if(!is_null($))</sub> ';
$output .= '| <sub>if(isset($))</sub> ';
$output .= '| <sub>if(!empty($))</sub> ';
$output .= '| <sub>if($)</sub> ';
$output .= '| <sub>if(!$)</sub> ';
$output .= '| <sub>if(!!$)</sub> ';
$output .= '| <sub>($)?true:false</sub> ';
$output .= '| <sub>if($??\'\'))</sub> ';
$output .= '| <sub>if(($??\'\') !== \'\'))</sub> ';
$output .= '| <sub>if(($??\'\') != \'\'))</sub> ';
$output .= '| <sub>if(count($) > 0)</sub> ';
$output .= '| <sub>if($ != \'\')</sub> ';
$output .= '| <sub>if($ !== \'\')</sub> ';
$output .= '|';
$output .= PHP_EOL;
$output .=
    '| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |';
$counter = 0;
foreach ($items as $items__key => $items__value) {
    $counter++;
    $output .= PHP_EOL;
    $output .= '| <sub>' . $items__key . '</sub>';
    $output .= outputRow($items__value);
    if ($counter === 10) {
        $output .= PHP_EOL . PHP_EOL;
    }
}
outputAsHtml($output, 'existence matrix');
writeToReadme($output, 'existence matrix');

foreach (['loose', 'strict'] as $modes__value) {
    $output = '';
    $output .= '| <sub>';
    if ($modes__value === 'strict') {
        $output .= '=';
    }
    $output .= '==';
    $output .= '</sub> ';
    foreach ($items as $items__key => $items__value) {
        $output .= '| <sub>' . $items__key . '</sub> ';
    }
    $output .= '|';
    $output .= PHP_EOL;
    $output .= '| --- ' . str_repeat('| --- ', count($items)) . '|';
    foreach ($items as $items1__key => $items1__value) {
        $output .= PHP_EOL;
        $output .= '| <sub>' . $items1__key . '</sub>';
        foreach ($items as $items2__key => $items2__value) {
            $output .= '| <sub>';
            if (
                (is_object($items1__value) && is_integer($items2__value)) ||
                (is_object($items2__value) && is_integer($items1__value))
            ) {
                $output .= 'error';
            } elseif ($items1__value === 'error' || $items2__value === 'error') {
                $output .= 'error';
            } elseif ($modes__value === 'loose' && $items1__value == $items2__value) {
                $output .= 'true';
            } elseif ($modes__value === 'strict' && $items1__value === $items2__value) {
                $output .= 'true';
            } else {
                $output .= 'false';
            }
            $output .= '</sub>';
        }
        $output .= ' |';
    }
    outputAsHtml($output, $modes__value . ' comparison matrix');
    writeToReadme($output, $modes__value . ' comparison matrix');
}

function outputAsHtml($output, $headline)
{
    $html = '';
    $html .= '<h2>' . $headline . '</h2>';
    $html .= '<table>';
    $html .= $output;
    $html .= '</table>';

    $html = preg_replace('/^\| --- \| .+ \| --- \|$/m', '', $html);

    $html = str_replace(PHP_EOL, '</tr><tr>', $html);
    $html = str_replace('|', '</td><td>', $html);

    $html = str_replace('<tr></td>', '<tr>', $html);
    $html = str_replace('<td></tr>', '</tr>', $html);

    $html = str_replace('<table></td>', '<table><tr>', $html);
    $html = str_replace('<td></table>', '</tr></table>', $html);

    echo $html;
}
function writeToReadme($output, $headline)
{
    $readme = file_get_contents('../README.md');
    $pos1 = mb_strpos($readme, '### ' . $headline);
    $pos2 = mb_strpos($readme, '###', $pos1 + 3);

    $readme_pre = '';
    if ($pos1 !== false) {
        $readme_pre = mb_substr($readme, 0, $pos1);
    }
    $readme_post = '';
    if ($pos2 !== false) {
        $readme_post = mb_substr($readme, $pos2);
    }

    $readme = $readme_pre . ('### ' . $headline . PHP_EOL . PHP_EOL . $output) . PHP_EOL . PHP_EOL . $readme_post;
    file_put_contents('../README.md', $readme);
}
function outputRow($input)
{
    $icon_yes = '✅';
    $icon_no = '❌';
    if (
        $input === [''] ||
        $input === ' ' ||
        $input === [0, 1] ||
        $input === [0] ||
        $input === 'a:0:{}' ||
        $input === 'b:1;' ||
        $input === 'b:0;'
    ) {
        $icon_no = '⚠️';
    }

    $output = '';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif (__x($input)) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif (__true($input)) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif (__false($input)) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif ($input !== null) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif ($input != null) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif ($input !== false) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif ($input != false) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif ($input === true) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif ($input == true) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif (!is_null($input)) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    } elseif (isset($input)) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    } elseif (!empty($input)) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif ($input) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif (!$input) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif (!!$input) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } else {
        $output .= $input
            ? 'true' . (__x($input) ? $icon_yes : $icon_no)
            : 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    $output .=
        $input ?? '' ? 'true' . (__x($input) ? $icon_yes : $icon_no) : 'false' . (!__x($input) ? $icon_yes : $icon_no);
    $output .= '</sub>';
    $output .= ' | <sub>';
    $output .=
        ($input ?? '') !== ''
            ? 'true' . (__x($input) ? $icon_yes : $icon_no)
            : 'false' . (!__x($input) ? $icon_yes : $icon_no);
    $output .= '</sub>';
    $output .= ' | <sub>';
    $output .=
        ($input ?? '') != ''
            ? 'true' . (__x($input) ? $icon_yes : $icon_no)
            : 'false' . (!__x($input) ? $icon_yes : $icon_no);
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif (!is_countable($input)) {
        $output .= 'error' . $icon_no;
    } elseif (@count($input) > 0) {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif ($input != '') {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' | <sub>';
    if ($input === 'error') {
        $output .= 'error' . $icon_no;
    } elseif ($input !== '') {
        $output .= 'true' . (__x($input) ? $icon_yes : $icon_no);
    } else {
        $output .= 'false' . (!__x($input) ? $icon_yes : $icon_no);
    }
    $output .= '</sub>';
    $output .= ' |';
    return $output;
}
?>

</body>
</html>
