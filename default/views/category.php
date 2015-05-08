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
		<h1 class="uk-h3 uk-margin"><?php echo $pageHeader;?></h1>

		<div class="uk-grid uk-grid-width-medium-1-3" data-uk-grid-match="{target: '.uk-match'}" data-uk-grid-margin>
			<?php foreach ($items as $post) : ?>
				<div>
					<article>
						<div class="uk-match">
						<h1 class="uk-h2"><a href="<?php $this->route('/'. $view .'/'.$post['title_slug']);?>">
								<?php echo $post['title'];?></a></h1>
						<?php markdown($post['teaser']); ?>
						</div>
						<div class="uk-text-right">
							<a href="<?php $this->route('/'. $view .'/'.$post['title_slug']);?>" title="" class="uk-button uk-button-primary"><i
									class="uk-icon-caret-right uk-margin-small-right"></i>Lees meer</a>
						</div>
					</article>
				</div>
				<?php endforeach; ?>
		</div>
	</div>
	<div class="uk-width-medium-1-4">
		<?php require($app->path('layouts:sidebar.php')); ?>
	</div>
</div>
