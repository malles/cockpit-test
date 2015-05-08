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
 * @var array $nieuwsList
 * @var array $homeContent
 */
?>

<h1 class="uk-article-title"><?php echo $homeContent['title'];?></h1>
<?php markdown($homeContent['content']);?>
<?php foreach ($nieuwsList as $post): ?>
	<h2><a href="<?php $this->route('/nieuws/'.$post['title_slug']);?>"><?php echo $post['title'];?></a></h2>
<?php endforeach; ?>
