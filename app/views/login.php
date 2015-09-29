<div class="col-md-4">
	<h1 class="page-header"><i class='ion-log-in'></i> Login</h1>
	<blockquote>
		<em>Login</em>
	</blockquote>
	<form class="form form-controls" action="/login">
		<div class="form-group">
			<input type="text" name="email" class="form-control input-lg" placeholder="Email o nombre de usuario">
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control input-lg" placeholder="**********">
		</div>
		<?php echo messages();?>
		<div class="alert alert-danger hide"></div>
		<div class="form-group">
			<button type="submit" class="btn btn-lg btn-success btn-login"><i class="ion-checkmark-circled"></i> Start session</button>
		</div>
	</form>
	<div class="text-right">
		<a href="/register"> Register</a> &nbsp;&nbsp;
   		<a href="#_lost-my-pass" role="button" data-toggle="modal">Forgot password</a>
   	</div>
</div>