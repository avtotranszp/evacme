<div class="flex flex-col shadow-md p-2 border border-graySecond hover:border-accent transition rounded">
	<a href="{$uri}" class="text-accent font-bold transition hover:underline mb-1">
		{$pagetitle}<span class="ml-1">({count($_modx->getChildIds($id))})</span>
	</a>
	{if $parent == 2 && false}
	<a href="{$uri}#region" class="text-accent text-sm transition hover:underline">{'poly_lang_site_main_show_in_region' | lexicon}</a>
	{/if}
</div>