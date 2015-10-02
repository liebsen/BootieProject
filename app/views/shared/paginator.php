<nav class="text-center">
  <ul class="pagination">
    <li class="<?php echo $current < 2 ? 'disabled' : '';?>">
      <a href="<?php echo $current < 2 ? '#' : '?page=' . ($current-1);?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php foreach($pages as $p):?>
	<li class="<?php echo $current == $p ? 'active' : '';?>"><a href="?page=<?php echo $p;?>"><?php print $p;?></a></li>
<?php endforeach;?>
    <li class="<?php echo $current > count($pages)-1 ? 'disabled' : '';?>">
      <a href="<?php echo $current > count($pages)-1 ? '#' : '?page=' . ($current+1);?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>