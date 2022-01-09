<div class="sm:justify-start sm:flex-row sm:items-center flex flex-col justify-between gap-4">
	<p class="text-base"><a href="{$_modx->makeUrl(3921)}">{'poly_lang_site_private_payment_personal_balance' | lexicon}</a>: <span class="font-medium">{$_modx->user['extended']['balance'] ? $_modx->user['extended']['balance'] : 0} грн</span></p>
</div>