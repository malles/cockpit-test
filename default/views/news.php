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
 * @var string $view
 * @var string $pageHeader
 * @var array $items
 */
?>

<h1 class="uk-h3 uk-margin"><?php echo $pageHeader;?></h1>

<?php
$count = 0;
foreach ($items as $post): ?>
	<article>
		<h1 class="uk-article-title"><a href="<?php $this->route('/'. $view .'/'.$post['title_slug']);?>"><?php echo $post['title'];?></a></h1>
		<?php if (!empty($post['subline'])) : ?>
		    <p class="uk-article-lead"><?php echo $post['subline'];?></p>
		<?php endif; ?>
		<?php if (!empty($post['teaser'])) markdown($post['teaser']); ?>
		<?php if (!empty($post['date'])) : ?>
			<p class="uk-article-meta">Gepubliceerd op <?php echo date_format(date_create_from_format('Y-m-d', $post['date']), 'd M Y');?></p>
		<?php endif; ?>
	</article>
<?php
	$count++;
	if ($count < count($items)) echo '<hr/>';
endforeach; ?>
