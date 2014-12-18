<?
function array_delete($array, $element) {
	return array_diff($array, [$element]);
}
function array_flatten($array) {
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return;
}
// use function print_r as pr;

$file = file("library.tsv");
foreach($file as &$line):
	if (trim($line) == "") {continue;}

	$line = explode("\t", $line);
	$key = trim($line[0]);
	$date = trim($line[1]);
	$val = trim($line[2]);
	$parts = explode("/", $val);
	$parts = array_map("trim", $parts);

	// $parts = array_diff($parts, ["https:", "", "master", "raw.githubusercontent.com"]);
	$link = [$key, $date, $val];
	// $link = array_flatten($link);
	// $link = array_unique($link);

	foreach($link as $cell):
		echo "$cell\t";
	endforeach;
	echo "\n";
endforeach;


