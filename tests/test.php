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
		html += '<td>'; if( input === null ) { html += 'true'; } else { html += 'false'; } html += '</td>';
		html += '<td>'; if( input == null ) { html += 'true'; } else { html += 'false'; } html += '</td>';
		html += '<td>'; if( typeof input === 'undefined' ) { html += 'true'; } else { html += 'false'; } html += '</td>';
		html += '<td>'; if( input ) { html += 'true'; } else { html += 'false'; } html += '</td>';
		html += '<td>'; html += ((input)?('true'):('false')); html += '</td>';
		html += '<td>'; try { if( input.length > 0 ) { html += 'true'; } else { html += 'false'; } } catch(e) { html += 'type error'; } html += '</td>';
		html += '<td>'; if( input == '' ) { html += 'true'; } else { html += 'false'; } html += '</td>';
		html += '<td>'; if( input === '' ) { html += 'true'; } else { html += 'false'; } html += '</td>';
		html += '<td>'; if( __x(input) ) { html += 'true'; } else { html += 'false'; } html += '</td>';
		return html;
	}

	var html = '';

	html += '<table>';
	//var items = ['new stdClass' => new stdClass];
	var items = new Map([
		['$a', undefined],
		['null',null],
		['[]',[]],
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
	html += '<tr>';
		html += '<td></td>';
		html += '<td>=== null</td>';
		html += '<td>== null</td>';
		html += '<td>typeof input === \'undefined\'</td>';
		html += '<td>if/else</td>';
		html += '<td>ternary</td>';
		html += '<td>length > 0</td>';
		html += '<td>== \'\'</td>';
		html += '<td>=== \'\'</td>';
		html += '<td>__x</td>';
	html += '</tr>';
	items.forEach((items__value, items__key) => {
		html += '<tr>';
			html += '<td>'+items__key+'</td>';
			html += outputRow(items__value);
		html += '</tr>';
	})
	html += '</table>';
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

	<div id="php">
	<?php
	require_once('../StringHelper.php');
	function outputRow($input) {
		echo '<td>'; if( $input === null ) { echo 'true'; } else { echo 'false'; } echo '</td>';
		echo '<td>'; if( $input == null ) { echo 'true'; } else { echo 'false'; } echo '</td>';
		echo '<td>'; if( is_null($input) ) { echo 'true'; } else { echo 'false'; } echo '</td>';
		echo '<td>'; if( isset($input) ) { echo 'true'; } else { echo 'false'; } echo '</td>';
		echo '<td>'; if( empty($input) ) { echo 'true'; } else { echo 'false'; } echo '</td>';
		echo '<td>'; if( $input ) { echo 'true'; } else { echo 'false'; } echo '</td>';
		echo '<td>'; echo (($input)?('true'):('false')); echo '</td>';
		echo '<td>'; if( count($input) > 0 ) { echo 'true'; } else { echo 'false'; } echo '</td>';
		echo '<td>'; if( $input == '' ) { echo 'true'; } else { echo 'false'; } echo '</td>';
		echo '<td>'; if( $input === '' ) { echo 'true'; } else { echo 'false'; } echo '</td>';
		echo '<td>'; if( @__x($input) ) { echo 'true'; } else { echo 'false'; } echo '</td>';
	}
	echo '<table>';
	$items = [
		'$a' => @$a,
		'null' => null,
		'[]' => [],
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
	echo '<tr>';
		echo '<td></td>';
		echo '<td>=== null</td>';
		echo '<td>== null</td>';
		echo '<td>is_null</td>';
		echo '<td>isset</td>';
		echo '<td>empty</td>';
		echo '<td>if/else</td>';
		echo '<td>ternary</td>';
		echo '<td>count > 0</td>';
		echo '<td>== \'\'</td>';
		echo '<td>=== \'\'</td>';
		echo '<td>@__x</td>';
	echo '</tr>';
	foreach($items as $items__key=>$items__value) {
		echo '<tr>';
			echo '<td>'.$items__key.'</td>';
			outputRow($items__value);
		echo '</tr>';
	}
	echo '</table>';
	?>
	</div>

	<div id="js"></div>

</body>
</html>
