<div class="hidden" id="menu">

	<div class="menu-wrapper">
		<div class="menu menu-level-first shadow-2xl">
			<ul>
				<li>
					<a href="{2 | url}" data-menu-open>
						<span>{'poly_lang_site_header_evac' | lexicon}</span>
						<img src="new-site/img/arrow.svg" width="10" height="10" aria-hidden="true" alt="">
					</a>
				</li>
				<li>
					<a href="{105 | url}">{'!pdoField' | snippet : ['id' => 105]}</a>
				</li>
				<li>
					<a href="{87 | url}">{'poly_lang_site_header_add_evac' | lexicon}</a>
				</li>

			</ul>
		</div>

		<div class="menu menu-level-second hidden shadow-2xl">
			<ul>
				{if !$menuDesc = $_modx->cacheManager->get('menu_desc' ~ $opt.cultureKey)}
				    {set $menuDesc = $_modx->runSnippet('!pdoResources', [
				        'parents' => 2,
						'templates' => '2,3',
						'depth' => 0,
						'showHidden' => 0,
						'sortby' => 'menuindex',
						'sortdir' => 'ASC',
						'tpl' => '@FILE chunk/menu.php',
						'limit' => 0
				    ])}
				    {set $null = $_modx->cacheManager->set('menu_desc' ~ $opt.cultureKey, $menuDesc, 3600 * 24)}
				{/if}

				{$menuDesc}
            </ul>
		</div>

		<div class="menu menu-level-third hidden shadow-2xl">
			<ul>
				
			</ul>
		</div>
	</div>
</div>