<?php

/* matchlen(): returns the length of matching
* substrings at beginning of $a and $b
*/
function matchlen(&$a, &$b) {
	$c = 0;
	$alen = strlen($a);
	$blen = strlen($b);
	$d = min($alen, $blen);
	while (isset($a[$c]) && isset($b[$c]) && $a[$c] == $b[$c] && $c < $d) {
		$c++;
	}
	return $c;
}

/* Returns a table describing
* the differences of $a and $b */
function calcdiffer($a, $b) {
	$alen = strlen($a);
	$blen = strlen($b);
	$aptr = 0;
	$bptr = 0;

	$ops = array();

	while ($aptr < $alen && $bptr < $blen) {
		$matchlen = matchlen(substr($a, $aptr), substr($b, $bptr));
		if ($matchlen) {
			$ops[] = array('=', substr($a, $aptr, $matchlen));
			$aptr += $matchlen;
			$bptr += $matchlen;
			continue;
		}
		/* Difference found */

		$bestlen = 0;
		$bestpos = array(0,0);
		for ($atmp = $aptr; $atmp < $alen; $atmp++) {
			for ($btmp = $bptr; $btmp < $blen; $btmp++) {
				$matchlen = matchlen(substr($a, $atmp), substr($b, $btmp));
				if ($matchlen>$bestlen) {
					$bestlen = $matchlen;
					$bestpos = array($atmp,$btmp);
				}
				if ($matchlen >= $blen-$btmp) {
					break;
				}
			}
		}
		if (!$bestlen) {
			break;
		}

		$adifflen = $bestpos[0] - $aptr;
		$bdifflen = $bestpos[1] - $bptr;

		if ($adifflen) {
			$ops[] = array('-', substr($a, $aptr, $adifflen));
			$aptr += $adifflen;
		}
		if ($bdifflen) {
			$ops[] = array('+', substr($b, $bptr, $bdifflen));
			$bptr += $bdifflen;
		}
		$ops[] = array('=', substr($a, $aptr, $bestlen));
		$aptr += $bestlen;
		$bptr += $bestlen;
	}
	if ($aptr < $alen) {
		/* b has too much stuff */
		$ops[] = array('-', substr($a, $aptr));
	}
	if ($bptr < $blen) {
		/* a has too little stuff */
		$ops[] = array('+', substr($b, $bptr));
	}
	return render($ops);
}

function render($ops) {
	$res = '';
	foreach($ops as $op) {
		if (strcmp($op[0], "=") === 0) {
			$res .= $op[1];
		}
		if (strcmp($op[0], "-") === 0) {
			$res .= $op[1] . "?";
		}
		if (strcmp($op[0], "+") === 0) {
			$res .= $op[1] . "?";
		}
	}
	$res = preg_replace('/(\w)\?(\w)\?/', "[$1$2]", $res);
	return $res;
}


