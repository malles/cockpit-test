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
 * @var array $nieuwsList
 * @var array $homeContent
 * @var int $page
 * @var int $pages
 */

?>

<h1 class="uk-article-title uk-text-center">Online Weerwolven van Wakkerdam</h1>

<?php include $app->path('layouts:top-a.php');?>

<div class="uk-margin-large uk-panel uk-panel-box uk-panel-box-primary uk-flex uk-flex-space-between">
	<div>
		<h2 class="uk-margin-remove uk-animation-fade">Meespelen met Weerwolven van Wakkerdam?</h2>
		<h4 class="uk-margin-remove uk-animation-fade">Maak nu een account aan op ons forum!</h4>
	</div>
	<div class="uk-animation-slide-left">
		<a href="#" class="uk-button uk-button-large">Registreer je nu<i
				class="uk-icon-angle-double-right uk-margin-small-left"></i></a>
	</div>
</div>

<div class="uk-grid" data-uk-grid-match="{target: '.uk-panel'}" data-uk-grid-margin="">
    <div class="uk-width-medium-1-2">
		<?php region('Frontpage left') ?>
	</div>
    <div class="uk-width-medium-1-2">
		<?php region('Frontpage right') ?>
	</div>
</div>

<?php markdown($homeContent['content']);?>

<div class="uk-grid">
    <div class="uk-width-medium-1-2">
		<div class="uk-panel uk-panel-box uk-panel-box-secondary">
			<h3 class="uk-panel-title">Laatste nieuws</h3>
			<?php foreach ($nieuwsList as $post): ?>
				<h4><a href="<?php $this->route('/nieuws/'.$post['title_slug']);?>"><?php echo $post['title'];?></a></h4>
			<?php endforeach; ?>

			<ul class="uk-pagination">
				<?php for($i=1;$i<=$pages;$i++): ?>

					<?php if($page==$i): ?>
						<li class="uk-active"><span><?=$i;?></span></li>
					<?php else: ?>
						<li><a href="<?=$this->route("/?page={$i}");?>"><?=$i;?></a></li>
					<?php endif; ?>

				<?php endfor; ?>
			</ul>

		</div>

    </div>
    <div class="uk-width-medium-1-2">
		<?php form('Contact'); ?>
			<div class="uk-form-row">
				<input class="uk-width-1-1 uk-form-large" type="text" name="form[name]" placeholder="Naam" required>
			</div>
			<div class="uk-form-row">
				<input class="uk-width-1-1 uk-form-large" type="text" name="form[message]" placeholder="Bericht">
			</div>
			<div class="uk-margin uk-flex uk-flex-center">
				<?= get_recaptcha(); ?>
			</div>
			<div class="uk-form-row">
				<button type="submit" class="uk-width-1-1 uk-button uk-button-primary uk-button-large"><i
						class="uk-icon-paper-plane-o uk-margin-small-right"></i>Verstuur</button>
			</div>
			<div class="form-message-success" hidden>
				<div class="uk-alert uk-alert-success uk-margin-top">Bericht succesvol ontvangen!</div>
			</div>
			<div class="form-message-fail" hidden>
				<div class="uk-alert uk-alert-danger uk-margin-top">Fout in versturen bericht!</div>
			</div>
		</form>
    </div>
</div>
