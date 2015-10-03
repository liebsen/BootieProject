<div class="col-md-12 center-block">
	<div class="col-md-2">
		<?php include SP . 'app/views/admin/sidebar.php';?>
	</div>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-12">
				<h3>&nbsp;<i class='ion-compose'></i> Posts <a href="/admin/posts/create" role="button" class="text-success" title="Create a new post" data-placement="right"><i class="ion-android-add-circle"></i></a></h3>
				<?php echo messages();?>
			<?php if(count($entries)):?>
				<table class="table">
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Files</th>
						<th>Created</th>
						<th>Updated</th>
						<th><i class="ion-cog"></i></th>
					</tr>
				<?php foreach($entries as $post):?>
					<tr>
						<td><?php echo $post->id;?></td>
						<td><?php echo $post->title;?></td>
						<td><?php echo count($post->files());?></td>
						<td><?php echo date('M d H:i',$post->created);?></td>
						<td><?php echo date('M d H:i',$post->updated);?></td>
						<td>
							<form action="/admin/posts/delete/<?php echo $post->id;?>" method="post">
							<button type="submit" class="btn btn-danger" onclick="if(!confirm('Your are about to delete this post, are you sure?')) return false;"><i class="ion-close-circled"></i> Delete</button>
							<a href="/admin/posts/<?php echo $post->id;?>" class="btn btn-success"><i class="ion-edit"></i> Edit</a>
							</form>
						</td>
					</tr>
				<?php endforeach;?>
				</table>
				<?php $entries[0]->paginator();?>
			<?php else:?>
					<a href="/admin/posts/create" class="btn btn-lg btn-success"><i class="ion-battery-empty"></i> &nbsp; Posts badge is empty! You may create one.</a>
			<?php endif;?>
				<p> <a href="/" target="_blank">Go to Frontpage</a></p>
			</div>
		</div>
	</div>
</div>