<div class="col-md-12 center-block">
	<div class="col-md-2">
		<?php include SP . 'app/views/admin/sidebar.php';?>
	</div>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-12">
				<h3>&nbsp;<i class='ion-android-desktop'></i> Dashboard </h3>
				<table class="table">
					<tr>
						<th>Section</th>
						<th>Count</th>
					</tr>
					<tr>
						<td>Posts</td>
						<td><a class="label label-success label-badge" href="/admin/posts"><?php echo $posts_count;?></a></td>
					</tr>
				</table>
				<div class="clearfix"></div>
				<p> <a href="/" target="_blank">Go to Frontpage</a></p>
			</div>
		</div>
	</div>
</div>