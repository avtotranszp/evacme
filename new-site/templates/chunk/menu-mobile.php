<div class="flex hidden flex-col z-30 fixed bg-white top-0 right-0 w-full h-full md:hidden overflow-y-scroll" id="allSections">
	<div class="fixed w-full top-0 flex justify-between items-center bg-second p-4 z-10">
		<p class="text-white">{'poly_lang_site_header_get_all' | lexicon}</p>
		<button class="w-10 h-10 border border-white rounded text-white focus:outline-none text-3xl" id="mobile-nav-398-close">×</button>
	</div>
	

	{if !$menuMob = $_modx->cacheManager->get('menu_mob' ~ $opt.cultureKey)}
	    {set $menuMob = $_modx->runSnippet('!pdoResources', [
    		'parents' => 2,
			'templates' => '2,3',
			'depth' => 0,
			'showHidden' => 0,
			'sortby' => 'menuindex',
			'sortdir' => 'ASC',
			'tpl' => '@FILE chunk/menu-mob.php',
			'limit' => 0
	    ])}
	    {set $null = $_modx->cacheManager->set('menu_mob' ~ $opt.cultureKey, $menuMob, 3600 * 24)}
	{/if}

	<div class="mobMenuFirst flex flex-col">
		<div style="height: 72px; display: block;"></div>
		{$menuMob}
	</div>

	<div class="mobMenuSecond flex flex-col hidden">
		<!-- Кнопка "Назад" -->
		<div style="height: 72px; display: block;"></div>
		<a href="javascript:void(0);" class="button-back flex items-center p-2 w-full">
			<img src="new-site/img/arrow.svg" class="transform rotate-180 mr-2" width="10" height="10" loading="lazy" aria-hidden="true" alt="" />
			<span>Назад</span>
		</a>
		<!-- Кнопка "Назад" -->
		<p class="p-4 font-bold text-xl">Эвакуатор</p>
		
	</div>

</div>