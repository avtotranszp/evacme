{*
<button data-id="{$id}" class="flex items-center justify-between p-4 border-b border-gray">
	<span>{$pagetitle}</span>
	<img src="new-site/img/arrow.svg" width="10" height="10" loading="lazy" aria-hidden="true" alt="" />
</button>*}
<div class="border-gray flex justify-between items-center w-full border-b">
	<a href="{$uri}" class="p-4 w-full">{$pagetitle}</a>
	<button data-id="{$id}" class="flex items-center p-4 mr-1">
		<span class="mr-6 opacity-50">|</span>
		<img src="new-site/img/arrow.svg" width="10" height="10" aria-hidden="true" alt="" />
	</button>
</div>