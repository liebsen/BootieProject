<div class="col-md-12 center-block">
	<div class="col-md-2">
		<?php include SP . 'app/views/admin/sidebar.php';?>
	</div>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-12">
				<h3>&nbsp;<i class='ion-compose'></i> Posts <a href="/admin/posts/0" role="button" class="text-success" title="Create a new post" data-placement="right"><i class="ion-android-add-circle"></i></a></h3>

				<table class="table">
					<tr>
						<th>#</th>
						<th>Title</th>
						<th><i class="ion-cog"></i></th>
					</tr>
				<?php foreach($entries as $post):?>
					<tr>
						<td><?php echo $post->id;?></td>
						<td><?php echo $post->updated;?></td>
						<td><?php echo $post->title;?></td>
						<td><a href="/admin/posts/<?php echo $post->id;?>" class="btn btn-success"><i class="ion-edit"></i> Edit</a></td>
					</tr>
				<?php endforeach;?>
				</table>
				<p> <a href="/" target="_blank">Go to Frontpage</a></p>
			</div>
		</div>
	</div>
</div>