<div class="col-md-9">
	<div class="page-header">
		<h1>Bootie <small>Micro Web Application Framework</small></h1>
	</div>

	<blockquote>
		<em>Developing code to run fast</em>
	</blockquote>

	<div class="group-config">&nbsp;</div>
	<h2>What it is </h2>
	<hr>
	<ul>
		<li>Tiny yet powerful Object Oriented PHP 5 framework</li>
		<li>Easy to learn</li>
		<li>Fully customizable</li>
		<li>Lightweight</li>
	</ul>
	<div class="group-config">&nbsp;</div>
	<h2> Features </h5>
	<hr>
	<ul>
		<li>ORM</li>
		<li>Routing</li>
		<li>Migrations</li>
		<li>Templating</li>
	</ul>

	<div class="group-config">&nbsp;</div>
	<h2> Want to know more? </h5>
	<hr>
	<p>Take a look at this WAP components description <a href="https://github.com/martinfree/Bootie">Bootie</a></p>
	<p>Learn more about <a href="https://github.com/martinfree/Bootie">Bootie</a></p>
	<p>Feel free to <a href="/contact">contact us</a></p>
</div>

<div class="col-md-3">
	<div class="group-config">&nbsp;</div>
	<div class="row">
	<?php if(count($posts)):?>
        <div class="feature-list clearfix">
            <ul>
            <?php foreach($posts as $i => $post):?>
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
</div>