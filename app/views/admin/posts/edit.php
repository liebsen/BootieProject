<div class="col-md-12 center-block">
	<div class="col-md-2">
		<?php include SP . 'app/views/admin/sidebar.php';?>
	</div>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-9">
				<h3>&nbsp;<i class="ion-edit"></i> <?php echo $entry->title;?></h3>
				<input type="hidden" name="id" value="<?php echo $entry->id;?>">
				<form class="form" id="post" action="/admin/posts/update/<?php echo $entry->id;?>">
					<div class="form-group">
						<input type="text" class="form-control slugify" data-target="slug" name="title" placeholder="Title" value="<?php echo $entry->title;?>" required>
					</div>

					<div class="form-group">
						<textarea class="form-control" name="caption" placeholder="Caption"><?php echo $entry->caption;?></textarea>
					</div>

				    <div class="progress summernote-progress hide">
				      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
				        <span class="sr-only"></span>
				      </div>
				    </div>

					<div class="form-group">
						<textarea class="form-control summernote" name="content" placeholder="Contenido"><?php echo $entry->content;?></textarea>
					</div><div class="clearfix"></div>

					<div class="form-actions form-group text-center">
						<button type="submit" class="btn btn-lg btn-success"> <i class="ion-checkmark-round"></i> &nbsp;Save </button>
					</div><div class="clearfix"></div>
				</form>
			</div>
			<div class="col-md-3">
				<div class="group-control">&nbsp;</div>
				<div class="text-left tags">
					<h4> <i class="ion-pricetags"></i> Tags </h4>
				    <div class="input-group">
				      <input type="text" id="tags-add" class="form-control" placeholder="Sports, Health, Latest News, ..." />
				      <span class="input-group-btn">
				        <button type="button" class="btn btn-default btn-primary btn-tags-add"><i class="ion-pricetag"></i></button>
				      </span>
				    </div><hr>
					<div class="tags-included"></div>
					<div class="tags-excluded"></div>
				</div><hr>
				<h4> <i class="ion-images"></i> Gallery </h4>
				<form 
					class="dropzone" 
					data-target="post" 
					data-message="Drop images here" 
					data-domain="posts" 
					data-url="/admin/files/resize" 
					data-index="/blog/files/<?php echo $entry->id;?>" 
					data-id="<?php echo $entry->id;?>" data-max="10">
				</form>				
			</div>
		</div>
	</div>
</div>

<script>

	setTimeout(function(){
		tags();	
	},300)
	
</script>