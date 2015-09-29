    <h3>Devmeta</h3>
    <blockquote><em>We are a small yet adaptable web developing company.</em></blockquote>
    <p>We focus on producing great quality code and mantaining high server software performance under Unix / Linux environments supporting and collaborating with the free software community.</p>
    <a class="btn btn-lg btn-success" href="/contact">Want to hire us, know more?</a>
    <hr>
    <div class="">
        <h3>Tags</h3>
    <?php foreach($tags as $tag):?>
        <a href="/blog/tag/<?php echo $tag->tag;?>" class="label label-success label-badge btn-tag-included"><?php echo $tag->tag;?></a>
    <?php endforeach;?>
    </div>