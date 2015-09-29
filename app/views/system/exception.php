<style type="text/css">
.system_error {
	font: 15px/1.4em Monaco;
	background: #fff;
}
code.source {
	white-space: pre;
	background: #fff;
	padding: 1em;
	font-size: 15px;
	display: block;
	margin: 1em 0;
	border: 1px solid #bedbeb;
	border-radius: 5px;
}
.system_error .box {
	margin: 1em 0;
	background: #ebf2fa;
	font-size: 15px;
	padding: 10px;
	border: 1px solid #bedbeb;
	border-radius: 5px;
}
code.source em {background: #ffc;}
</style>

<div class="system_error">

	<b style="color: #990000"><?php echo get_class($exception); ?></b>
	<p><?php echo $exception->getMessage(); ?></p>


	<?php
	$x = FALSE;
	if($backtrace = $exception->getTrace())
	{
		foreach($backtrace as $id => $line)
		{
			if(!isset($line['file'],$line['line']))continue;

			$x = TRUE;

			print '<div class="box">';

			//Skip the first element
			if( $id !== 0 )
			{
				// If this is a class include the class name
				print '<b>Called by '. (isset($line['class']) ? $line['class']. $line['type'] : '');
				print $line['function']. '()</b>';
			}

			// Print file, line, and source
			print ' in '. $line['file']. ' ['. $line['line']. ']';
			print '<code class="source">'. \bootie\Error::source($line['file'], $line['line']). '</code>';

			if(isset($line['args']))
			{
				print '<b>Function Arguments</b>';
				print dump($line['args']);
			}

			print '</div>';
		}

	}

	if(!$x)
	{
		print '<p><b>'.$exception->getFile().'</b> ('.$exception->getLine().')</p>';
	}
	?>

</div>
