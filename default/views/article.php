<?php
/* *
 *	cockpit-test
 *  article.php
 *	Created on 7-1-2015 20:37
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

/**
 * @var \Lime\App $app
 * @var array $post
 * @var string $currentCollection
 * @var string $view
 */

?>


<div class="uk-grid">
    <div class="uk-width-medium-3-4">
		<h1><?php echo $post['title'];?></h1>

		<?php if (isset($post['teaser'])) markdown($post['teaser']); ?>

		<?php if (!empty($post['content'])) markdown($post['content']);?>
	<?php if (!empty($post['related']) || !empty($post['tags'])) : ?>
	<div class="uk-grid">
		<div class="uk-width-medium-1-2">
			<?php if (!empty($post['related'])) : ?>
				<h4>Gerelateerde rollen</h4>
			<ul class="uk-list uk-list-line">
				<?php foreach ($post['related'] as $related) :
					$relatedPost = collection($currentCollection)->findOne(['_id'=>$related]);
					?>
					<a href="<?php $this->route('/'. $view .'/'.$relatedPost['title_slug']);?>"><i
							class="uk-icon-link uk-margin-small-right"></i><?php echo $relatedPost['title']; ?></a>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</div>
		<div class="uk-width-medium-1-2">
			<?php if (!empty($post['tags'])) : ?>
				<?php foreach ($post['tags'] as $tag) : ?>
					<div class="uk-badge uk-animation-fade"><i class="uk-icon-tag uk-margin-small-right"></i>
						<a href="<?php $this->route('/tags/'.strtolower(str_replace(' ', '-', $tag)));?>"><?php echo $tag; ?></a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>

	</div>
    <div class="uk-width-medium-1-4">
		<?php require($app->path('layouts:sidebar.php')); ?>
	</div>
</div>
