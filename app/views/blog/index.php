<div class="col-md-9">
    <h1 class="page-header"><i class='ion-compose'></i> Blog</h1>
    <blockquote>
        <em>The Latest News</em>
    </blockquote>
    <?php if(count($posts)):?>
    <div class="scroll-content row">
        <div class="feature-list clearfix">
            <ul>
            <?php foreach($posts as $i => $post):?>
                <li>
                    <a href="/blog/<?php echo $post->slug;?>" class="feature-olivia col-md-4 col-sm-6 col-xs-6" style="background-image: url(/upload/posts/std/<?php echo count($post->files()) ? $post->files()[0]->name : 'default';?>)">
                        <div class="foam<?php echo $i%6+1;?> overlay"></div>
                        <span class="feature-title"><?php echo $post->title;?></span>
                        <span class="feature-descrip"><?php echo words($post->caption,15);?></span>
                        <span class="aboutme-link"><i class="ion-android-time"></i> <?php echo timespan($post->created);?></span>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
        <?php $posts[0]->paginator();?>
    </div>
    <?php endif;?>
</div>
<div class="col-md-3">
    <?php include SP . 'app/views/shared/sidebar.php';?>
</div>

