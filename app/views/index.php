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
		<li>Small full feature PHP 5 framework.</li>
		<li>Easy to learn.</li>
		<li>Fully customizable.</li>
	</ul>
	<div class="group-config">&nbsp;</div>
	<h2> Features </h5>
	<hr>
	<ul>
		<li>ORM</li>
		<li>Migrations</li>
	</ul>
	<div class="group-config">&nbsp;</div>
	<h2> Want to know more? </h5>
	<hr>
	<p>Learn more about <a href="https://github.com/martinfree/Bootie">Bootie</a></p>
	<p>Feel free to <a href="/contact">contact us</a></p>
</div>

<div class="col-md-3">
	<div class="group-config">&nbsp;</div>
	<div class="row">
	<?php if(count($posts)):?>
        <ul class="ch-grid">
        <?php foreach($posts as $post):?>
            <li>    
                <div class="ch-item" style="background-image: url(/upload/posts/thumb/<?php echo count($post->files()) ? $post->files()[0]->name : 'default';?>)">
                    <div class="ch-title">
                        <h5>
                            <i class="ion-android-time"></i> <?php echo timespan($post->created);?>
                        </h5>
                        <h3><?php echo $post->title;?></h3>
                    </div>
                    <div class="ch-caption">
                        <h3><?php echo words($post->caption,20);?></h3>
                        <p>
                            <a href="/blog/<?php echo $post->slug;?>" class="btn btn-sm btn-success"><i class="ion-ios-glasses"></i> Read</a>
                        </p>
                    </div>
                </div>
            </li>
		<?php endforeach;?>
        </ul>
    <?php endif;?>
	</div>
</div>