		<div class="group-control">&nbsp;</div>
		<div class="list-group">
			<a href="/admin/account" class="list-group-item<?php echo isset($segments[1]) && $segments[1] == 'account' ? ' active' : '';?>"><i class='ion-person'></i> Account</a>
			<a href="/admin/settings" class="list-group-item<?php echo isset($segments[1]) && $segments[1] == 'settings' ? ' active' : '';?>"><i class='ion-ios-gear'></i> Settings</a>
			<a href="/admin/posts" class="list-group-item<?php echo isset($segments[1]) && $segments[1] == 'posts' ? ' active' : '';?>"><i class='ion-compose'></i> Posts </a>
		</div>
