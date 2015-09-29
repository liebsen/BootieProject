<div class="col-md-12">
<b>Memory Usage</b>
<pre>
<?php print number_format((memory_get_usage() - START_MEMORY_USAGE) / 1024); ?>kb 
<?php print number_format(memory_get_usage()/1024); ?>kb (process) <?php print number_format(memory_get_peak_usage(TRUE)/1024); ?>kb (process peak) 
</pre>
<b>Execution Time</b>
<pre>
<?php print round((microtime(true) - START_TIME), 5); ?> seconds
</pre>
<div class="group-control">&nbsp;</div>
<div class="group-control">&nbsp;</div>
</div>