<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-md">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="/" class="navbar-brand">
				<i class='ion-erlenmeyer-flask x2'></i> Bootie
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-md">
			<ul class="nav navbar nav-pills pull-right">
				<li class="<?php echo segments(1) == 'blog' ? ' active' : '';?>">
					<a href="/blog">Blog</a>
				</li>				
				<li class="<?php echo segments(1) == 'contact' ? ' active' : '';?>">
					<a href="/contact">Contact</a>
				</li>
				<li>
					<a href="https://github.com/martinfree/BootieProject" title="Fork me on Github" data-placement="left" target="_blank"><i class="ion-social-github"></i> </a>
				</li>
			</ul>
		</div>
	</div>
</nav>
