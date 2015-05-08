<?php
/* *
 *	cockpit-test
 *  index.php
 *	Created on 7-1-2015 20:37
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

/**
 * @var \Lime\App $app
 * @var string $view
 * @var string $pageHeader
 * @var array $items
 */
?>
	<div class="uk-grid">
		<div class="uk-width-medium-3-4">
			<h1 class="uk-h2 uk-margin"><?php echo $pageHeader;?></h1>
			<ul class="uk-list uk-list-space">
				<?php foreach ($items as $post):
					$route = isset($post['route']) ? $post['route'] : $this->routeUrl('/'. $view .'/'.$post['title_slug']);
					?>
					<li>
						<h3>
							<a href="<?php echo $route;?>"><?php echo $post['title'];?></a>
						</h3>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="uk-width-medium-1-4">
			<?php require($app->path('layouts:sidebar.php')); ?>
		</div>
	</div>
