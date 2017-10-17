<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <title>.</title>
    <script src="../StringHelper.js"></script>
    <script type="text/javascript">
    <!--
	function outputRow(input) {
		var html = '';
		html += ' | '; if( input !== null ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; if( input != null ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; if( input !== false ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; if( input != false ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; if( input === true ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; if( input == true ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; if( typeof input !== 'undefined' ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; if( input ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; html += ((input)?('true'):('false'));
		html += ' | '; try { if( input.length > 0 ) { html += 'true'; } else { html += 'false'; } } catch(e) { html += 'type error'; }
		html += ' | '; if( input != '' ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; if( input !== '' ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; if( __x(input) ) { html += 'true'; } else { html += 'false'; }
		html += ' | '; 
		return html;
	}

	var html = '';

	//var items = ['new stdClass' => new stdClass];
	var items = new Map([
		['$a', undefined],
		['null',null],
		['false',false],
		['true',true],
		['[]',[]],
		['[\'\']',['']],
		['0', 0],
		['1', 1],
		['-1', -1],
		['\'\'', ''],
		['\' \'', ' '],
		['str', 'str'],
		['[0,1]', [0,1]],
		['[0]', [0]],
		['new Object()', new Object()]
	]);
	html += '<br/>';
	html += ' | ';
	html += ' | !== null ';
	html += ' | != null ';
	html += ' | !== false ';
	html += ' | != false ';
	html += ' | === true ';
	html += ' | == true ';
	html += ' | typeof input !== \'undefined\' ';
	html += ' | if/else ';
	html += ' | ternary ';
	html += ' | length > 0 ';
	html += ' | != \'\' ';
	html += ' | !== \'\' ';
	html += ' | __x ';
	html += ' | ';
	html += '<br/>';
	html += '| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |';

	items.forEach((items__value, items__key) => {
		html += '<br/>';
		html += ' | '+items__key+'';
		html += outputRow(items__value);
	})
	document.addEventListener("DOMContentLoaded", function() {
		document.getElementById('js').innerHTML = html;
	});
    -->
    </script>
    <style type='text/css'>
    <!--
	* { box-sizing: border-box;	}
	body { font-size:10px; font-family:sans-serif; }
	table { width:1200px;border-collapse:collapse;margin:20px; }
	table td { width:100px; border:1px solid #000; }
	#js table td:nth-child(4) { width:300px; }
    -->
    </style>
</head>
<body>

	<h2>### php</h2>
	<div id="php">
	<?php
	require_once('../StringHelper.php');
	function outputRow($input) {
		echo ' | '; if( $input !== null ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( $input != null ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( $input !== false ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( $input != false ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( $input === true ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( $input == true ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( !is_null($input) ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( isset($input) ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( !empty($input) ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( $input ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; echo (($input)?('true'):('false'));
		echo ' | '; if( count($input) > 0 ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( $input != '' ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( $input !== '' ) { echo 'true'; } else { echo 'false'; }
		echo ' | '; if( @__x($input) ) { echo 'true'; } else { echo 'false'; }
		echo ' | ';
	}
	$items = [
		'$a' => @$a,
		'null' => null,
		'false' => false,
		'true' => true,
		'[]' => [],
		'[\'\']' => [''],
		'0' => 0,
		'1' => 1,
		'-1' => -1,
		'\'\'' => '',
		'\' \'' => ' ',
		'str' => 'str',
		'[0,1]' => [0,1],
		'[0]' => [0],
		'new stdClass' => new stdClass
	];
	echo ' | ';
	echo ' | !== null ';
	echo ' | != null ';
	echo ' | !== false ';
	echo ' | != false ';
	echo ' | === true ';
	echo ' | == true ';
	echo ' | !is_null ';
	echo ' | isset ';
	echo ' | !empty ';
	echo ' | if/else ';
	echo ' | ternary ';
	echo ' | count > 0 ';
	echo ' | != \'\' ';
	echo ' | !== \'\' ';
	echo ' | @__x ';
	echo ' | ';
	echo '<br/>';
	echo '| --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- | --- |';

	foreach($items as $items__key=>$items__value) {
		echo '<br/>';
		echo ' | '.$items__key.'';
		outputRow($items__value);
	}

	?>
	</div>

	<h2>### js</h2>
	<div id="js"></div>

</body>
</html>
