<div class="flex-col md:flex-row flex shadow-xl border-t border-gray rounded p-3 mb-4 relative">
	{if $is_vip}
	<div class="absolute left-0 top-0 px-2 py-0.5 bg-second">
		<span class="text-sm mr-0.5 text-white font-medium">TOP до</span>
		<span class="text-sm text-white">{$vipuntil | date_format:"%d-%m-%Y"}</span>
	</div>
	{/if}
	{set $image = $_modx->runSnippet('!msGallery', [
		'product' => $id,
		'tpl' => '@INLINE 
			{if $files?} 
				{foreach $files as $file}
	                <img src="{$file.url}" class="max-h-52 md:max-h-36 object-cover w-full" width="200" height="170" loading="lazy" role="presentation" alt="" />
	            {/foreach}
            {else}
            	<img src="new-site/img/evac-placeholder.jpg" class="max-h-52 md:max-h-36 object-cover w-full" width="200" height="170" loading="lazy" role="presentation" alt="" />
            {/if}
            ',
		'limit' => 1
	])}
	<div class="self-center md:self-start md:w-1/5 flex-shrink-0">
		{$image}
	</div>

	<div class="flex flex-col justify-between md:w-4/5 md:ml-4">
		<div class="mb-4 flex flex-col">
			<a href="{$uri}" class="mt-2 md:mt-0 text-xl font-bold hover:underline transition" target="_blank">{$pagetitle}</a>

			<div class="flex flex-col md:flex-row md:items-center text-sm">
{*
				<div class="flex">
					<div class="flex mr-4">
						<p class="mr-1 text-graySemiDark">С:</p>
						<span>Сегодня</span>
					</div>

					<div class="flex">
						<p class="mr-1 text-graySemiDark">По:</p>
						<span>19 мая</span>
					</div>
				</div>
	*}

				<div class="hidden md:block block border-r border-gray mx-2 h-4"></div>

				<div class="flex items-center">
					<img src="new-site/img/location-account.svg" class="opacity-50 flex-shrink-0 mr-1" width="12" height="12" loading="lazy" role="presentation" alt="" />
					<p>{$city}</p>
					{*
<span>,</span>
					<span class="ml-2">{$area}</span>
						*}
				</div>
			</div>
		</div>

		<div class="flex-col md:flex-row flex-wrap flex md:items-center mb-4">
			<a href="{$uri}" class="py-2 md:py-0 border-b border-gray group md:border-none flex items-center transition" target="_blank">
				<img src="new-site/img/arrow-right.svg" width="12" height="12" loading="lazy" role="presentation" alt="" />
				<span class="group-hover:text-accent ml-1 text-sm">{'poly_lang_site_evac_show' | lexicon}</span>
			</a>

			<div class="hidden md:block border-r border-gray mx-2 h-4"></div>

			<a href="{87 | url : ['schema' => 'full'] : ['id' => $id]}" class="py-2 md:py-0 border-b border-gray group md:border-none flex items-center transition">
				<img src="new-site/img/edit.svg" width="12" height="12" loading="lazy" role="presentation" alt="" />
				<span class="group-hover:text-second ml-1 text-sm">{'poly_lang_site_evac_edit' | lexicon}</span>
			</a>

			<div class="hidden md:block border-r border-gray mx-2 h-4"></div>

			<a href="#!" data-id="{$id}" data-disable="{'poly_lang_site_evac_disable' | lexicon}" data-enable="{'poly_lang_site_evac_enable' | lexicon}" class="py-2 md:py-0 border-b border-gray group md:border-none flex items-center transition {if $hidemenu?}enable-evac{else}disable-evac{/if}">
				<img src="new-site/img/stopicon.svg" width="12" height="12" loading="lazy" role="presentation" alt="" />
				<span class="group-hover:text-red ml-1 text-sm">{if $hidemenu?}{'poly_lang_site_evac_enable' | lexicon}{else}{'poly_lang_site_evac_disable' | lexicon}{/if}</span>
			</a>
		</div>

		<div class="flex self-center md:self-start {if $hidemenu?}hidden{/if} evac-ads">
			<a href="{444 | url : ['schema' => 'full'] : ['id' => $id]}" class="hover:bg-secondDarken {if $is_vip}bg-second{else}bg-accent{/if} transition px-4 py-2 text-white rounded">{'poly_lang_site_evac_promotion' | lexicon}</a>
		</div>
	</div>
</div>