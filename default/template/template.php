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
 * @var string $min
 * @var string $pageTitle
 * @var string $content_for_layout
 */
?>
<!DOCTYPE HTML>
<html lang="nl-NL" dir="ltr">

<head>
	<base href="<?php echo $this->routeUrl('/')?>">
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="/assets/css/theme<?php echo $min; ?>.css" type="text/css" />
</head>

<body class="" data-bix-cockpit="{page:'home'}">
	<div class="uk-container uk-container-center">
		<div class="bix-header">
			<?php region('header') ?>
		</div>
		<div class="bix-main">
			<?php echo $content_for_layout;?>
		</div>
		<div class="bix-footer">
			<?php region('footer');?>
		</div>
	</div>
	<script type="application/javascript" src="/vendor/jquery/dist/jquery<?php echo $min; ?>.js"></script>
	<script type="application/javascript" src="/assets/js/app<?php echo $min; ?>.js"></script>
</body>
</html>
