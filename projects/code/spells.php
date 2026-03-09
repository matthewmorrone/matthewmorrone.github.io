<?


require_once 'Console/Table.php';
require 'diff.php';
$table = new Console_Table(CONSOLE_TABLE_ALIGN_LEFT, '');

$file = file('alpha.txt');
$file = array_map('trim', $file);
$file = array_filter($file);

foreach($file as $line) {
	$line = explode(': ', $line);
	$dict[$line[0]] = $line[1];
}

$table->setHeaders(array('str1', 'str2', 'reg', 'lev', 'def'));
$i = 0;
$done = [];
$defs = [];
foreach($dict as $str1=>$val1) {
	$j = 0;
	foreach($dict as $str2=>$val2) {
		if (strcmp($str1, $str2) === 0) continue;
		if (levenshtein($str1, $str2) > 1) continue;
		if (array_key_exists($str2.$str1, $done)) {
			continue;
		}
		if (array_key_exists($str1.$str2, $done)) {
			continue;
		}
		$table->addRow(array(
			$str1,
			$str2,
			calcdiffer($str1, $str2),
			levenshtein($str1, $str2),
			strcmp($val1, $val2)
		));
		$done[$str1.$str2] = 1;
		$done[$str2.$str1] = 1;
		$j++;

		// echo $str1." ".$str2." ".calcdiffer($str1, $str2)." ".levenshtein($str1, $str2)." ".strcmp($val1, $val2)."\n";

		if (strcmp($val1, $val2) === 0) {
			$defs[calcdiffer($str1, $str2)] = $val1;
			// echo calcdiffer($str1, $str2)."\t".$val1."\n";
		}
		else {
			$defs[$str1] = $val1;
			// echo $str1."\t".$val1."\n";

			$defs[$str2] = $val2;
			// echo $str2."\t".$val2."\n";

		}
		// echo "\n";
	}
	$i++;
}
// echo $table->getTable();
print_r($defs);
