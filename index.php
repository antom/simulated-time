<?php
	require_once(getcwd() . '/simulated-time.php');

	$options = array(
		'2 seconds'  => 2,
		'3 seconds'  => 3,
		'4 seconds'  => 4,
		'5 seconds'  => 5,
		'10 seconds' => 10,
		'30 seconds' => 30,
		'1 minute'   => 60,
		'2 minutes'  => 120,
		'3 minutes'  => 180,
		'4 minutes'  => 240,
		'5 minutes'  => 300,
		'10 minutes' => 600,
		'30 minutes' => 1800,
		'1 hour'     => 3600,
		'2 hours'    => 7200,
		'3 hours'    => 10800,
		'4 hours'    => 14400,
		'6 hours'    => 21600,
		'12 hours'   => 43200,
		'24 hours'   => 86400,
		'1 week'     => 604800,
		'2 weeks'    => 1209600,
		'4 weeks'    => 1209600,
		'8 weeks'    => 2419200,
	);

	$option = array_search($x,$options);
	$option = ($option !== false)
		? $option
		: sprintf('%1$d second%2$s',$x,($x==1 ? '' : 's'));

	foreach($options as $key => $value) {
		$options[$key] = sprintf(
			'<li><a href="./?%2$s">1 second = %1$s</a></li>',
			$key,
			http_build_query(array_merge($_GET,array('x' => $value)))
		);
	}

	$options = implode("\n\t\t\t",$options);
?><html>
	<head>
		<title>Simulated Time (1 second = <?php echo $option; ?>)</title>
		<link rel="stylesheet" type="text/css" href="./style.css">
	</head>

	<body data-multiplier="<?php echo $x; ?>">
		<h1>Simulated Time (1 second = <?php echo $option; ?>)</h1>

		<dl class="cf">
			<dt>Now</dt>
				<dd id="now" data-update="<?php echo (isset($_GET['t'])) ? 0 : 1 ?>" data-timestamp="<?php echo $time; ?>"><?php echo gmdate('jS M Y @ g:ia', $time); ?></d>
			<dt>Start</dt>
				<dd id="start" data-timestamp="<?php echo $start; ?>"><?php echo gmdate('jS M Y @ g:ia', $start); ?></dd>
			<dt>Offset</dt>
				<dd id="offset"><?php echo $offset; ?></dd>
			<dt>Simulated</dt>
				<dd id="simulated" data-initial-year="<?php echo $p; ?>" data-timestamp="<?php echo $simulated; ?>"><?php echo sprintf('Year %1$d, Day %2$s',(int)gmdate('Y',$simulated),gmdate('z - jS M @ g:ia',$simulated)); ?></dd>
		</dl>

		<h2>Examples</h2>

		<ul class="options cf">
			<?php echo $options; ?>
		</ul>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js" type="text/javascript"></script>
		<script src="./date.js" type="text/javascript"></script>
		<script src="./simulated-time.js" type="text/javascript"></script>
	</body>
</html>