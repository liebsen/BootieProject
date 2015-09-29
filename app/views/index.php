<div class="col-md-9">
	<div class="page-header">
		<h1>Caldero <small>Micro Web Application Framework</small></h1>
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
	<p>Learn more about <a href="https://github.com/devmeta/caldero">Caldero</a></p>
	<p>Feel free to <a href="/contact">contact us</a></p>
</div>

<div class="col-md-3">
	<div class="group-config">&nbsp;</div>
	<div class="row">
		<ul>
		<?php foreach($posts as $post):?>
			<li>
				<span class="label label-warning label-badge"><?php echo date('Y M d',$post->created);?></span><br>
				<a href="/blog/<?php echo $post->slug;?>"><?php echo $post->title;?></a><br>
				<span><?php echo $post->caption;?></span>
			</li>
		<?php endforeach;?>
		</ul>
	</div>
</div>