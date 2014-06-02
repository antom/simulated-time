<?php
	$settings = array(
		'y'    => date('Y'),  // start year
		'm'    => 1,          // start month
		'd'    => 1,          // start date
		'h'    => 0,          // start hour
		'i'    => 0,          // start minute
		'p'    => 1,          // initial year
		'x'    => 3,          // second multiplier
	);

	foreach($settings as $key => $value) {
		$$key = (isset($_GET[$key]))
			? (int)$_GET[$key]
			: $value;
	}

	$time = (isset($_GET['t']))
		? (is_numeric($_GET['t']) ? (int)$_GET['t'] : strtotime($_GET['t']))
		: time();

	$start = mktime($h, $i, 0, $m, $d, $y);
	$offset = $time - $start;
	$simulated = strtotime(sprintf('%04d-01-01 00:00:00',$p)) + ($offset * $x); //-62135596800
?>