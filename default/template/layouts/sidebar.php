<?php
/* *
 *	cockpit-test
 *  header.php
 *	Created on 8-1-2015 01:17
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */
/**
 * @var \Lime\App $app
 * @var array $sideMenus
 * @var string $currentRoute
 */
?>


<aside>
	<div class="uk-panel uk-panel-box">
		<h3 class="uk-panel-title">Rollen per alliantie</h3>
		<ul class="uk-nav uk-nav-side">
			<?php foreach ($sideMenus['per-alliantie'] as $route => $title) : ?>
				<li<?php echo ($currentRoute == '/' . $route ? ' class="uk-active"' : ''); ?>><a href="/<?php echo $route; ?>"><?php echo $title; ?></a></li>
			<?php endforeach; ?>

		</ul>
	</div>

	<div class="uk-panel uk-panel-box">
		<h3 class="uk-panel-title">Rollen per krachtsoort</h3>
		<ul class="uk-nav uk-nav-side">
			<?php foreach ($sideMenus['per-krachtsoort'] as $route => $title) : ?>
				<li<?php echo ($currentRoute == '/' . $route ? ' class="uk-active"' : ''); ?>><a href="/<?php echo $route; ?>"><?php echo $title; ?></a></li>
			<?php endforeach; ?>

		</ul>
	</div>

</aside>
