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
 * @var array $views
 * @var array $menus
 * @var array $dropDowns
 * @var array $subMenus
 * @var string $view
 * @var string $currentRoute
 * @var string $min
 * @var string $pageTitle
 * @var string $content_for_layout
 */
?>
<!DOCTYPE HTML>
<html lang="nl-NL" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $pageTitle; ?></title>
	<link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="/assets/css/theme<?php echo $min; ?>.css" type="text/css" />
</head>

<body class="" data-bix-cockpit="{page:'<?php echo $currentRoute; ?>'}">
	<div class="uk-container uk-container-center">
		<header class="uk-block">
			<?php region('header') ?>
		</header>
		<section class="uk-block uk-block-secondary uk-padding-remove" data-uk-sticky>
			<nav class="uk-navbar">
				<ul class="uk-navbar-nav">
					<li<?php echo ($view == '' ? ' class="uk-active"': ''); ?>><a href="/">Home</a></li>
					<?php foreach ($menus as $viewName=>$menuTitle) :
						$classActive = $viewName == $view ? 'uk-active': '';
						if (isset($dropDowns[$viewName])) :?>
							<li class="uk-parent <?php echo $classActive; ?>" data-uk-dropdown="">
								<a href="/<?php echo $viewName; ?>"><?php echo $menuTitle; ?></a>
								<div class="uk-dropdown uk-dropdown-navbar">
									<ul class="uk-nav uk-nav-dropdown">
										<?php foreach ($dropDowns[$viewName] as $slug => $title) :
											//todo $classActiveSub = $viewName == $view ? 'uk-active': '';
										if (isset($subMenus[$slug])) :?>
											<li class="uk-parent">
												<a href="/<?php echo $viewName . '/' . $slug; ?>"><?php echo $title; ?></a>
												<ul class="uk-nav-sub">
													<?php foreach ($subMenus[$slug] as $route => $titleSub) : ?>
														<li><a href="/<?php echo $route; ?>"><?php echo $titleSub; ?></a></li>
													<?php endforeach; ?>
												</ul>
											</li>
										<?php else : ?>
											<li><a href="/<?php echo $viewName . '/' . $slug; ?>"><?php echo $title; ?></a></li>
										<?php endif; ?>
										<?php endforeach; ?>
									</ul>
								</div>
							</li>

						<?php else : ?>
						<li class="<?php echo $classActive; ?>">
							<a href="/<?php echo $viewName; ?>"><?php echo ucfirst($viewName); ?></a>
						</li>
						<?php endif; ?>
					<?php endforeach; ?>
				</ul>
			</nav>
		</section>
		<section class="uk-block uk-block-small">
			<?php echo $content_for_layout;?>
		</section>
		<section class="uk-block uk-block-secondary uk-contrast">
			<?php region('footer');?>
			<div class="uk-text-center">
				&copy;2013-2015 Anouk Timmerman, Wakkerdam.net - Website door <a href="http://www.bixie.nl" target="_blank"><i
						class="uk-icon-bixie uk-margin-small-right"></i>Bixie</a>
			</div>
		</section>
	</div>
	<script src="/vendor/jquery/dist/jquery<?php echo $min; ?>.js"></script>
	<script src="/assets/js/app<?php echo $min; ?>.js"></script>
	<script src="cockpit/index.php/rest/api-js?token=24851523e240cfac23a09c0b "></script>﻿
</body>
</html>
