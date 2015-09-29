<div class="col-md-12 center-block">
	<div class="col-md-2">
		<?php include SP . 'app/views/admin/sidebar.php';?>
	</div>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-9">
				<h3>&nbsp;<i class="ion-edit"></i> <?php echo $entry->title;?></h3>
				<form class="form" id="post" action="/admin/posts/update">
					<input type="hidden" name="id" value="<?php echo $entry->id;?>">
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
				<form class="dropzone" data-target="post" data-message="Drop images here" data-domain="posts" data-url="/admin/files/resize" data-index="/blog/files/<?php echo $entry->id;?>" data-id="<?php echo $entry->id;?>" data-max="10"></form>
			</div>
			<div class="col-md-3">
				<div class="group-control">&nbsp;</div>
				<!--div class="text-left">
					<h4> <i class="ion-locked"></i> Privacy </h4>
					<p>Establish your post privacy</p>

					<div class="form-group">
					    <input type="radio" id="privacy_id1" name="privacy_id" value="1"{{if entry.privacy_id != null && entry.privacy_id == 1}} checked{{/if}}{{if entry.privacy_id == null}} checked{{/if}}>
					    <label for="privacy_id1"><i class="ion-globe"></i> Public</label>
					</div>
					<div class="form-group">
					    <input type="radio" id="privacy_id2" name="privacy_id" value="2"{{if entry.privacy_id != null && entry.privacy_id == 2}} checked{{/if}}>
					    <label for="privacy_id2"><i class="ion-lock"></i> Protected</label>
					</div>
				</div><hr>
				<div class="text-left">
					<h4> <i class="ion-chatbubbles"></i> Comments </h4>
					<div class="form-group">
					    <input type="radio" id="disqus1" name="disqus" value="0"{{if entry.disqus != null && entry.disqus == 0}} checked{{/if}}{{if entry.disqus == null}} checked{{/if}}>
					    <label for="disqus1"> No</label>
					</div>
					<div class="form-group">
					    <input type="radio" id="disqus2" name="disqus" value="1"{{if entry.disqus != null && entry.disqus == 1}} checked{{/if}}{{if entry.disqus == null}} checked{{/if}}>
					    <label for="disqus2"> Yes</label>
					</div>
				</div><hr-->
				<div class="text-left tags">
					<h4> <i class="ion-pricetags"></i> Tags </h4>
				    <div class="input-group">
				      <input type="text" id="tags-add" class="form-control" placeholder="Sports, Health, Latest News, ..." />
				      <span class="input-group-btn">
				        <button type="button" class="btn btn-default btn-primary btn-tags-add"><i class="ion-pricetag"></i></button>
				      </span>
				    </div><hr>
					<div class="alert alert-success tags-included"></div>
					<div class="alert alert-info tags-excluded"></div>
				</div><hr>
			</div>
		</div>
	</div>
</div>

<script>

	setTimeout(function(){
		tags();	
	},300)
	
</script>