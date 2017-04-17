<?

function pr() {
	return call_user_func_array("print_r", func_get_args());
}

function get_file($f) {
	return file_get_contents($f);
}

function json_clean($json) {
    $json = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t](//).*)#", '', $json);
    return $json;
}

//     if(version_compare(phpversion(), '5.4.0', '>=')) {
//         $json = json_decode($json, $assoc, $depth, $options);
//     }
//     elseif(version_compare(phpversion(), '5.3.0', '>=')) {
//         $json = json_decode($json, $assoc, $depth);
//     }


$file = file("settings.tsv");
$file = array_map("trim", $file);
$file = array_filter($file);


foreach($file as $key=>$line) {
	$file[$key] = explode("\t", $line);
}

$settings = [];
foreach($file as $line) {
	$setting = [];
	$setting["keys"] = $line[0];
	$setting["command"] = $line[1];

	if (count($line) > 2)
	{
		$args = [];
		for($i = 2; $i < count($line); $i+=2) {
			$args[$line[$i]] = $line[$i+1];
		}
		$setting["args"] = $args;
	}


	$settings[] = $setting;
}

exec("cp Default\ \(OSX\).sublime-keymap Default.json");


$old = json_decode(json_clean(get_file("Default.json")));
$new = array_merge($old, $settings);
$new = json_encode($new);

pr($new);

exec("rm Default.json");


// pr(json_encode($settings));
?>

