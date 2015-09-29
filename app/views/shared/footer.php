<footer>
	<div class="pull-right">
		<span class="label label-info label-badge" title="Memory usage">
			<?php print number_format((memory_get_usage() - START_MEMORY_USAGE) / 1024); ?>kb 
		</span>
		<span class="label label-info label-badge" title="Memory usage (process)">
			<?php print number_format(memory_get_usage()/1024); ?>kb 
		</span>
		<span class="label label-info label-badge" title="Memory usage (process peak)">
			<?php print number_format(memory_get_peak_usage(TRUE)/1024); ?>kb 
		</span>
		<span class="label label-success label-badge" title="Execution Time">
			<?php print round((microtime(true) - START_TIME), 5); ?>s
		</span>&nbsp;&nbsp;
		<a class="x1-2" href="/contact" title="Contact us"><i class="ion-email text-warning"></i></a> &nbsp;&nbsp;
		<a class="x1-2" href="/login" title="Login"><i class="ion-log-in text-success"></i></a> &nbsp;&nbsp;
	</div>
</footer>