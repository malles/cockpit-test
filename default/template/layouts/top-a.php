<?php
/* *
 *	cockpit-test
 *  top-a.php
 *	Created on 7-1-2015 20:43
 *  
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

?>
<div class="uk-grid uk-grid-width-medium-1-2 uk-grid-width-large-1-4 uk-grid-match" data-uk-grid-margin="">
	<?php foreach(cockpit('regions:group', 'top-a') as $region) : ?>
		<div><?php region($region['name']); ?></div>
	<?php endforeach; ?>
</div>
