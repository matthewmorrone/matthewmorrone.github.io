<?

$dir = "library";


$file = file("library.tsv");
$index = 0;
$total = count($file);
foreach($file as &$line):
	$index++;

	// if ($index > 60) {exit();}
	// if ($index < 50) {continue;}

	if (trim($line) == "") {continue;}
	$line = explode("\t", $line);

	$line = array_map("trim", $line);


	$name = $line[0];
	$name = substr($name, 0, strlen($name)-3);
	$date = $line[1];
	$addr = $line[2];
	$header = "// $name.js\n// $date\n// $addr\n\n";

	try {
		$page = file_get_contents($addr);
		$len = strlen($page);
	}
	catch(Exception $e) {
		echo "error - couldn't download $name  ($index / $success / $total)\n";
		continue;
	}

	try {
		$f = fopen("$dir/$name-$date.js", "w+");
		try {
			fwrite($f, $header);
			fwrite($f, $page);
			$success++;
		}
		catch(Exception $e) {
			echo "error - couldn't write to $dir/$name-$date.js  ($index / $success / $total)\n";
			continue;
		}

	}
	catch(Exception $e) {
		echo "error - couldn't create $dir/$name-$date.js  ($index / $success / $total)\n";
		continue;
	}
	finally {
		fclose($f);
	}
	$display = str_pad("$name-$date.js", 32, " ", STR_PAD_RIGHT);

	echo "$display ($len chars)\tsuccessfully downloaded\t($index / $success / $total)\n";


endforeach;

// <?

// function url_code($url) {
//     $headers = get_headers($url);
//     return substr($headers[0], 9, 3);
// }
// $dir = $argv[2];

// $file = file($argv[1]);
// $total = count($file);

// $start = $argv[3] ? $argv[3] : 0;
// $finish = $argv[4] ? $argv[4] : 0;

// $success = $start > 0 ? $start : 0;

// $log = fopen("log.tsv", "w+");

// foreach($file as $line):
// 	$index++;

// 	if ($index > $finish) {exit();}
// 	if ($index < $start) {continue;}


// 	if (trim($line) == "") {continue;}
// 	$line = explode("\t", $line);
// 	$line = array_map("trim", $line);

// 	$name = $line[0];
// 	$name = substr($name, 0, strlen($name)-3);
// 	$date = $line[1];
// 	$addr = $line[2];
// 	$header = "// $name.js\n// $date\n// $addr\n\n";
// 	$code = url_code($addr);

// 	if($code == "404") {
// 		$err = "404 not found - $addr not found $name ($index / $success / $total)\n";
// 		// $index++;
// 	}

// 	try {
// 		$page = file_get_contents($addr);
// 		$len = strlen($page);
// 	}
// 	catch(Exception $e) {
// 		$err = "error - couldn't download $name ($index / $success / $total)\n";
// 	}

// 	try {
// 		$f = fopen("$dir/$name-$date.js", "w+");
// 		try {
// 			fwrite($f, $header);
// 			fwrite($f, $page);
// 			$success++;
// 		}
// 		catch(Exception $e) {
// 			$err = "error - couldn't write to $dir/$name-$date.js ($index / $success / $total)\n";
// 		}
// 	}
// 	catch(Exception $e) {
// 		$err = "error - couldn't create $dir/$name-$date.js ($index / $success / $total)\n";
// 	}
// 	finally {
// 		fclose($f);
// 	}

// 	if ($err) {
// 		fwrite($log, $err);
// 		echo $err;
// 		continue;
// 	}

// 	$display = str_pad("$name-$date.js", 32, " ", STR_PAD_RIGHT);

// 	echo "$display ($len chars)\tsuccessfully downloaded\t($index / $success / $total)\n";


// endforeach;

// fclose($log);



