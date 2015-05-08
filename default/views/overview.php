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
 * @var array $collections
 */
?>
	<div class="uk-grid">
		<div class="uk-width-medium-3-4">
			<h1 class="uk-h3 uk-margin"><?php echo $pageHeader;?></h1>
			<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-match" data-uk-grid-margin>
				<?php foreach ($collections as $collectionName => $items) : ?>
					<div>
						<div class="uk-panel uk-panel-box uk-panel-box-secondary">
							<h3 class="uk-panel-title"><?php echo $collectionName;?></h3>
							<ul class="uk-list uk-list-space">
								<?php foreach ($items as $post): ?>
									<li>
										<h3>
											<a href="<?php $this->route('/'. strtolower(str_replace(' ', '-', $collectionName)) .'/'.$post['title_slug']);?>"><?php echo $post['title'];?></a>
										</h3>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="uk-width-medium-1-4">
			<?php require($app->path('layouts:sidebar.php')); ?>
		</div>
	</div>
