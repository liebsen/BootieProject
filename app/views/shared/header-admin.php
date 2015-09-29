<nav class="navbar navbar-inverse navbar-fixed-top admin" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-md">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="/admin" class="navbar-brand">
				<i class='ion-android-desktop x2'></i> Caldero
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-md">
			<ul class="nav navbar nav-pills pull-right">
				<li class="<?php echo isset($segments[0]) && $segments[0] == 'profile' ? ' active' : '';?>">
					<a href="/profile">Profile</a>
				</li>				
				<li class="">
					<a href="/logout">Logout</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
