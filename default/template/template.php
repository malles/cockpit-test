<?php
/* *
 *	cockpit-test
 *  template.php
 *	Created on 7-1-2015 20:42
 *
 *  @author Matthijs
 *  @copyright Copyright (C)2015 Bixie.nl
 *
 */

/**
 * @var string $content_for_layout
 */
?>
<!DOCTYPE HTML>
<html lang="nl-NL" dir="ltr">

<head>
	<link rel="stylesheet" href="/assets/css/theme.css" type="text/css" />
<?php if (get_registry('develop', 0)) : ?>
	<script data-main="src/js/app" src="/vendor/requirejs/require.js"></script>
<?php else : ?>
	<script type="application/javascript" src="/assets/js/app.js" async="true" defer="true"></script>
<?php endif; ?>
</head>

<body class="">
	<div class="uk-container uk-container-center">
		<div class="bix-main">
			<?php echo $content_for_layout;?>
		</div>
	</div>
</body>
</html>
