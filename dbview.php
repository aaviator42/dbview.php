<?php
/*
dbview v1.0
*/

require 'StorX.php';

const DB_FILE = "my_data.db";


//----------
printHeader(DB_FILE);
printData(DB_FILE);
printFooter();



function printHeader($dbname){
	echo <<<ENDEND
	
<!DOCTYPE html>
<!-- dbview.php v1.0 by @aaviator42 -->
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>dbview.php</title>
	<style>
	body {
		font-family: Verdana, sans-serif;
		padding: 2rem;
		margin: auto;
		font-size: 1rem !important;
	}
	code, pre {
		font-family: monospace;
		background-color: #E6E6E6;
		white-space: pre-wrap;
	}
	table {
		width: 95%;
		border: 0.01rem solid;
		margin-left: 1rem;
		margin-right: 1rem;
		border-collapse: collapse;
	}
	td {
		border: 0.01rem solid;
		vertical-align: text-top;
	}
	th {
		border: 0.01rem solid;
	}
	</style>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
	<meta name="robots" content="noindex, nofollow, noarchive">

</head>
<body>
	<h2>dbview</h2>
	DB: <code>$dbname</code>
	<hr>

ENDEND;
}

function printFooter(){
	echo<<<ENDEND
	</pre>
</body>
</html>

ENDEND;
}

function printData($dbname){
	$sx = new \StorX\Sx;
	$sx->openFile($dbname);
	$sx->readAllKeys($keyArray);
	echo "
		<table>
			<tr>
				<th></th>
				<th>keyName</th>
				<th>keyValue</th>
			</tr>
		";
	$count = 1;
	foreach($keyArray as $key => $value){
		echo "<tr>" . PHP_EOL;
		echo "<td><pre>[" . $count . "]</pre></td>" . PHP_EOL;
		echo "<td><b><pre>" . $key . "</pre></b></td>" . PHP_EOL;
		if(is_array($value)){
			echo "<td><pre>" . print_r($value, 1) . "</pre></td>" . PHP_EOL;
		} else {
			echo "<td><pre>" . var_export($value, 1) . "</pre></td>" . PHP_EOL;
		}
		echo "</tr>" . PHP_EOL;
		$count++;
	}

	echo "
		</table>
	";
}