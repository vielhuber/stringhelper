<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <title>.</title>
    <style type='text/css'>
	*
    {
        box-sizing: border-box;
        margin:0;
    }
    html, body
    {
        width:100%;
        height:100%;
    }
	body
    {
    }
    textarea
    {
        font-size:9px;
        font-family:sans-serif;
        width:100%;
        height:50%;
    }
    </style>
</head>
<body>

	<?php
    echo '<textarea>';
	require_once('../stringhelper.php');
	function outputRow($input)
    {
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( $input !== null ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( $input != null ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( $input !== false ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( $input != false ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( $input === true ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( $input == true ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( !is_null($input) ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'false'; } elseif( isset($input) ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'false'; } elseif( !empty($input) ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( $input ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } else { echo (($input)?('true'):('false')); } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( count($input) > 0 ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( $input != '' ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( $input !== '' ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
        echo ' | <sub>'; if( $input === 'error' ) { echo 'error'; } elseif( __x($input) ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' | <sub>'; if( $input === 'error' ) { echo 'false'; } elseif( __x(@$input) ) { echo 'true'; } else { echo 'false'; } echo '</sub>';
		echo ' |';
	}
	$items = [
        'null' => null,
        'false' => false,
        'true' => true,
        '[]' => [],
        '[\'\']' => [''],
        '0' => 0,
        '1' => 1,
        '-1' => -1,
        '\'0\'' => '0',
        '\'1\'' => '1',
        '\'-1\'' => '-1',
        '\'\'' => '',
        '\' \'' => ' ',
        '\'str\'' => 'str',
        '[0,1]' => [0,1],
        '[0]' => [0],
        'new stdClass' => new stdClass,
		'$_GET[\'not_set\']' => 'error',
	];
	echo '| ';
	echo '| <sub>!== null</sub> ';
	echo '| <sub>!= null</sub> ';
	echo '| <sub>!== false</sub> ';
	echo '| <sub>!= false</sub> ';
	echo '| <sub>=== true</sub> ';
	echo '| <sub>== true</sub> ';
	echo '| <sub>!is_null()</sub> ';
	echo '| <sub>isset()</sub> ';
	echo '| <sub>!empty()</sub> ';
	echo '| <sub>if/else</sub> ';
	echo '| <sub>ternary</sub> ';
	echo '| <sub>count() > 0</sub> ';
	echo '| <sub>!= \'\'</sub> ';
	echo '| <sub>!== \'\'</sub> ';
    echo '| <sub>__x()</sub> ';
	echo '| <sub>__x(@)</sub> ';
	echo '|';
	echo PHP_EOL;
	echo '| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |';
	foreach($items as $items__key=>$items__value)
    {
		echo PHP_EOL;
		echo '| <sub>'.$items__key.'</sub>';
		outputRow($items__value);
	}
    echo '</textarea>';
	?>

</body>
</html>
