{if $is_vip?}
<div class="card card--vip mb-3 flex flex-col md:flex-row bg-white border border-gray rounded shadow-xl p-4 relative">
{else}
<div class="card mb-3 flex flex-col md:flex-row bg-white border border-gray rounded shadow-xl p-4 relative">
{/if}
{*
	{set $image = $_modx->runSnippet('!msGallery', [
		'product' => $id,
		'tpl' => '@INLINE 
			{if $files?} 
				{foreach $files as $file}
	                <img src="{$file.url}" width="250" height="160" loading="lazy" alt="{$pagetitle}" />
	            {/foreach}
            {else}
            	<img src="new-site/img/evac-placeholder.jpg.webp" width="250" height="160" loading="lazy" alt="{$pagetitle}" />
            {/if}
            ',
		'limit' => 1
	])}
*}
	{if $is_vip?}
		<!-- Бейдж "ТОП" -->
	<div class="badge-vip absolute -top-2 px-2 xl:px-4 py-2 uppercase right-2 text-white bg-second rounded-b shadow-lg">
		топ
	</div>
	{/if}
	<!-- // Бейдж "ТОП" -->
	<!-- Изображение -->
	<a href="{$uri}" class="mx-auto md:m-0 h-full md:h-40 w-full md:w-2/5">
		<img src="{$thumb ?: 'webp/new-site/img/evac-placeholder.jpg.webp'}" width="250" height="160" loading="lazy" alt="{$pagetitle}" />
	</a>

	<!-- Тело карточки -->
	<div class="mt-4 md:mt-0 md:ml-4 flex flex-col w-full">
		<!-- Заголовок карточки -->
		<a href="{$uri}" class="card__title mb-4 text-base font-bold hover:underline transition xl:text-lg text-accent">{$pagetitle}</a>

		<div class="grid sm:grid-cols-2 gap-x-4">

			<div class="flex flex-row justify-between flex-wrap">

				<div class="flex items-center mb-1">
					<img src="new-site/img/location.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
					<p class="text-sm ml-2">{'poly_lang_site_city_short' | lexicon} {$city}</p>
				</div>
				<div class="flex items-center mb-1">
					<img src="new-site/img/settings.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
					<p class="text-sm ml-2">{$etype}</p>
				</div>

				<div class="flex items-center mb-1">
					<img src="new-site/img/tow-truck.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
					<p class="text-sm ml-2">до {$capacity} тонн</p>
				</div>

				{if $transfer}
				<div class="flex items-center mb-1">
					<img src="new-site/img/settings.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
					<p class="text-sm ml-2">{'poly_lang_site_category_transfer' | lexicon}</p>
				</div>
				{/if}
			</div>

		</div>
			
	</div>
	<!-- // Тело карточки -->
	
</div>