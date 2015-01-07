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
 * @var array $post
 */

?>


<h1><?php echo $post['title'];?></h1>

<p>
	<?php markdown($post['content']);?>
</p>