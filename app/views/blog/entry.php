<div class="col-md-9">
    <h1 class="page-header"><?php echo $entry->title;?></h1>
    <blockquote><em><?php echo $entry->caption;?><br><?php echo date('Y M d',$entry->created);?></em></blockquote>
    <div class="">
        <?php foreach($entry->tags() as $tag) : if( ! isset($tag->tag)) continue;?>
            <a href="/blog/tag/<?php echo $tag->tag;?>" class="label label-success label-badge btn-tag-included"><?php echo $tag->tag;?></a>
        <?php endforeach;?>
        </div>
        <div class="group-control">&nbsp;</div>
        <div class="slick-dotted">
        <?php foreach($entry->files() as $file) : if( ! isset($file->name)) continue;?>
            <div class="image">
                <img class="img-responsive" src="/upload/posts/std/<?php echo $file->name;?>">
            </div>
        <?php endforeach;?>
    </div>
    <div class="group-control">&nbsp;</div>
    <div class="entry-content">
        <?php echo $entry->content;?>
    </div>
    <hr>
</div>
<div class="col-md-3">
<?php if(count($related)):?>
    <div class="feature-list clearfix">
        <ul>
        <?php foreach($related as $i => $post):?>
            <li>
                <a href="/blog/<?php echo $post->slug;?>" class="feature-olivia col-md-12 col-sm-12 col-xs-12" style="background-image: url(/upload/posts/thumb/<?php echo count($post->files()) ? $post->files()[0]->name : 'default';?>)">
                    <div class="foam<?php echo $i%6+1;?> overlay"></div>
                    <span class="feature-descrip"><?php echo $post->title;?></span>
                    <span class="aboutme-link"><i class="ion-android-time"></i> <?php echo timespan($post->created);?></span>
                </a>
            </li>
        <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>
</div>