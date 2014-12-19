<?

function server_info($category)
{
	echo trim($_SERVER[$category]);
}

function browser_info($category)
{
	$browser = get_browser(null, true);
	//echo $browser[$category];
	print_r($browser);
	print_r(get_browser());

}

function directory_contents($dir)
{
	if (empty($dir)) {$dir = getcwd();}
	$counter = 0;
	if (is_dir($dir))
	{
		if ($dh = opendir($dir))
		{
			while (($file = readdir($dh)) !== false)
			{
				if ($file == "." || $file == ".." || substr($file, 0, 1) == ".") {continue;}
				print("<li><a href='".$dir."/".$file."'>".$file."</a></li>");
				//print("<img class='bgimg' id='img".$counter."' src='".$dir."/".$file."'></img>");
				$counter++;
			}
		}
	}
}

function directory_contents_r($dir, $depth, $limit)
{
	$depth++;
	if ($depth == $limit) {return;}
	if (is_dir($dir))
	{
		if ($dh = opendir($dir))
		{
			
			while (($file = readdir($dh)) !== false)
			{
				if ($file == "." || $file == ".." || substr($file, 0, 1) == ".") {continue;}

				if (is_dir($dir.'/'.$file))
				{
					print("<li><a href='".$file."/'>".$file."/</a> <span>(".$depth.")</span></li>");
					echo '<ul>';
					list_dir($dir.'/'.$file, $depth, $limit);
					echo '</ul>';
				}
				else
				{
					print("<li><a href='".$file."'>".$file."</a></li>");
				}
			}
			
		}
	}
}
if ($_GET['salt'] == "eirugherwilguherhiuerh"):

$mode = $_GET['mode'];
if ($mode == 'server_info') 		{server_info($_GET['category']);}
if ($mode == 'browser_info') 		{browser_info($_GET['category']);}
if ($mode == 'directory_contents') 	{directory_contents($_GET['directory']);}

endif;
?>
