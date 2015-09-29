<div class="col-md-9">
    <h1 class="page-header"><i class='ion-compose'></i> Blog</h1>
    <blockquote>
        <em>The Latest News</em>
    </blockquote>
    <div>
        <ul class="ch-grid">
        <?php foreach($posts as $post):?>
            <li>    
                <div class="ch-item" style="background-image: url(/upload/posts/th-<?php echo count($post->files()) ? $post->files()[0]->name : 'default';?>)">
                    <div class="ch-title">
                        <h3><?php echo $post->title;?></h3>
                    </div>
                    <div class="ch-caption">
                        <h3><?php echo $post->caption;?></h3>
                        <p>
                            <a href="/blog/<?php echo $post->slug;?>" class="btn btn-sm btn-success"><i class="ion-ios-glasses"></i> Read</a>
                        </p>
                    </div>
                </div>
            </li>
		<?php endforeach;?>
        </ul>
    </div>
</div>
<div class="col-md-3">
    <?php include SP . 'app/views/shared/sidebar.php';?>
</div>