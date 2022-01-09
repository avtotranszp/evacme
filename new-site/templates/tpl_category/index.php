{extends 'file:layouts/main.php'}
{block 'linksPrev'}
{disableSource}
<link rel="stylesheet" href="new-site/libs/select2/select2.min.css">
<link rel="preload" as="style" href="new-site/libs/select2/select2.min.css"/>
{/disableSource}
{/block}
{block 'content'}
{$_modx->runSnippet('!mFilter2', [
    'depth' => $res.id == 2 ? 3 : 1,
    'paginator' => 'pdoPage',
    'suggestions' => 0,
    'showEmptyFilters' => false,
    'includeImages' => true,
    'filters' => '
        ms|etype,
        ms|capacity,
        ms|city,
        ms|transfer:boolean
    ',
    'aliases' => '
        ms|city==city
    ',
    'tplFilter.outer.ms|etype' => '@FILE filters/select_outer.php',
    'tplFilter.row.ms|etype' => '@FILE filters/select_row.php',
    
    'tplFilter.outer.ms|capacity' => '@FILE filters/select_outer.php',
    'tplFilter.row.ms|capacity' => '@FILE filters/select_row.php',
    
    'tplFilter.outer.city' => '@FILE filters/select_outer.php',
    'tplFilter.row.city' => '@FILE filters/select_row.php',
    
    'tplFilter.outer.ms|transfer' => '@FILE filters/checkbox_outer.php',
    'tplFilter.row.ms|transfer' => '@FILE filters/checkbox_row.php',
    
    'toSeparatePlaceholders' => 'my_',
	'element' => 'msProducts',
	'limit'   => 12,
	'showHidden'    => false,
    'sortby'  => [
        'id'       => 'DESC',
    ],
    'wrapIfEmpty'    => false,
    'includeImages'  => true,
    'where'          => '{"Data.is_vip:=": null, "OR:Data.is_vip:=": 0}',
    'tpl'            => '@FILE tpl_category/partials/evac.php',
    'tplWrapper'     => '',
    'tplPageWrapper' => '@INLINE <div class="pagination mt-10 flex items-center justify-center"><ul class="pagination__list">{$prev}{$pages}{$next}</ul></div>',
    'tplPage'	     => '@INLINE <li class="pagination__item"><a class="pagination__link" href="{$href}">{$pageNo}</a></li>',
    'tplPageActive'  => '@INLINE <li class="pagination__item"><span class="pagination__link pagination__link--active">{$pageNo}</span></li>',
    'tplPagePrevEmpty'   => '',
    'tplPageNextEmpty'    => '',
    'tplPagePrev'    => '@INLINE <li class="pagination__item"><a class="pagination__link pagination__link--prev" href="{$href}"></a></li>',
    'tplPageNext'    => '@INLINE <li class="pagination__item"><a class="pagination__link pagination__link--next" href="{$href}"></a></li>',
])}
<main class="flex-grow flex-shrink-0 relative">
	<section class="py-8">
		<div class="container mx-auto px-4">
			{'!pdoCrumbs' | snippet : [
				'showHome' => 1,
				'tplWrapper' => '@INLINE <nav class="flex mb-2"><ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="custom-scroll flex items-center space-x-4 whitespace-nowrap overflow-ellipsis overflow-x-scroll pb-2">[[+output]]</ol></nav>',
				'tplHome' => '
				@INLINE <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<div>
								<a itemprop="item" href="{$link}" class="text-graySemiDark hover:text-dark transition">
									<svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
										<path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
									</svg>
									<meta itemprop="name" content="{$menutitle}">
									<meta itemprop="position" content="{$idx}">
									<span class="sr-only">{$menutitle}</span>
								</a>
							</div>
						</li>
				',
				'tpl' => '
				@INLINE <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<div class="flex items-center">
								<svg class="flex-shrink-0 h-5 w-5 text-graySemiDark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
								</svg>
								<a itemprop="item" href="{$link}" class="ml-4 text-sm text-graySemiDark hover:text-dark transition">
									<meta itemprop="name" content="{$menutitle}">
									<meta itemprop="position" content="{$idx}">
									{$menutitle}
								</a>
							</div>
						</li>
				',
				'tplCurrent' => '
				@INLINE <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
							<div class="flex items-center">
								<svg class="flex-shrink-0 h-5 w-5 text-graySemiDark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
									<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
								</svg>
								<span class="ml-4 text-sm text-graySemiDark hover:text-dark transition">
									<meta itemprop="name" content="{$menutitle}">
									<meta itemprop="position" content="{$idx}">
									{$menutitle}
								</span>
							</div>
						</li>
				'
			]}
			
			<div class="flex flex-col lg:flex-row justify-between relative">
				<div class="flex flex-col w-full">
					<h1 class="overflow-hidden sf_h1 text-2xl lg:text-4xl mb-4 lg:mb-6 font-bold">{if $res.id != 2} {'poly_lang_site_evac_title' | lexicon}  {/if}{$res.pagetitle}</h1>
					{if $res.id == 2}
						<div class="mt-10 mb-10 grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 gap-5" id="region">

    					{if !$cities = $_modx->cacheManager->get('pdoresources/cities/cities_' ~ $res.id ~ $opt.cultureKey)}
						    {set $cities = $_modx->runSnippet('!pdoResources', [
						        'parents'   => 2,
							    'templates' => '2',
							    'sortby'    => 'menuindex',
							    'sortdir'   => 'ASC',
							    'tpl'       => '@FILE tpl_main/partials/city.php',
							    'limit'     => 0,
							    
						    ])}
						    {set $null = $_modx->cacheManager->set('pdoresources/cities/cities_' ~ $res.id ~ $opt.cultureKey, $cities, 24 * 3600)}
						{/if}

						{$cities}

						</div>
					{/if}
					
					<div class="flex flex-col bg-white mb-6 md:mb-0">
						<button id="showFilter" class="p-4 border-t border-graySecond group flex justify-center items-center md:ml-auto shadow-md">
							<img src="new-site/img/filter.svg" class="flex-shrink-0" width="24" height="24" loading="lazy" aria-hidden="true" alt="">
							<span class="group-hover:text-accent mx-2 transition">{'poly_lang_site_category_filter' | lexicon}</span>
							<img src="new-site/img/arrow.svg" class="show-filter-arrow opacity-50 transition transform rotate-90" width="12" height="12" loading="lazy" aria-hidden="true" alt="">
						</button>

						<div id="mse2_mfilter" class="msearch2 filters hidden mt-4 mb-4 border-t border-gray shadow-md p-4">
							<form action="{$res.uri}" method="post" id="mse2_filters">
								<!-- Обёртка для селектов - в 2 колонки -->
								<div class="mb-4 grid md:grid-cols-2 gap-4">

									{'my_ms|etype' | placeholder}
									{'my_ms|capacity' | placeholder}
									{'my_ms|city' | placeholder}

								</div>
								<!-- // Обёртка для селектов - в 2 колонки -->

								<!-- Обёртка для чекбоксов -->
								<div class="mb-4 grid md:grid-cols-2 gap-4">

									{'my_ms|transfer' | placeholder}

								</div>
								<!-- // Обёртка для чекбоксов -->

								<!-- Обёртка для кнопок -->
								<div class="flex flex-col-reverse md:flex-row items-center justify-between pt-4 mt-4 border-t border-gray">
									<button type="reset" class="w-full md:w-max text-center hover:bg-accentDarken hover:text-white bg-transparent transition px-8 py-2 text-graySemiDark rounded mt-2 md:mt-0">		{'poly_lang_site_category_filter_reset' | lexicon}
									</button>
									<button type="submit" class="w-full md:w-max text-center hover:bg-secondDarken bg-second transition px-8 py-2 text-white rounded">
										{'poly_lang_site_category_filter_apply' | lexicon}
									</button>
								</div>
								<!-- // Обёртка для кнопок -->
							</form>
							
						</div>

					</div>
					<!-- // Фильтр - меню -->
					
                    {set $vip = '!getThisResourceVip' | snippet}
                    
					<div class="flex flex-col">
					    {if $vip?}
                        <div class="flex flex-col mb-5">
                        	<div class="flex items-center mb-4">
                        		<img src="new-site/img/top-rated.svg" class="flex-shrink-0" width="28" height="24" loading="lazy" aria-hidden="true" alt="">
                        		<h2 class="text-xl font-medium text-second">
                        			<span class="font-bold">ТОП</span> {'poly_lang_site_category_evac' | lexicon}
                        		</h2>
                        	</div>
                        
                        	{$vip}
                        </div>
                        {/if}
						 
                        <div class="flex flex-col mb-5">
                        	<div class="flex items-center mb-4">
                        		<h2 class="text-xl font-medium">
                        			{'poly_lang_site_category_evac_base' | lexicon}
                        		</h2>
                        	</div>
                        
                        	<div id="mse2_results">
    						    {'my_results'|placeholder}
    						</div>
                        </div>
                        
						{'!RatingPage' | snippet}
						<script type='application/ld+json'>
						{
                          "@context": "https://schema.org/", //используемый словарь — Schema.org
                          "@type": "Organization", //сущность — товар
                          "name": "Evacme", //название товара  
                          "aggregateRating": { //рейтинг товара
                            "@type": "AggregateRating", 
                            "ratingValue": "{'rating' | placeholder}", //оценка
                            "ratingCount": "{'votes' | placeholder}" //количество проголосовавших
                          }
                        }
                        </script>
						<div class="p-4 bg-grayLight rounded mt-5">
							<!-- Когда пользователь не кликнул -->
							<div class="flex flex-col md:flex-row items-center justify-center">
								<p class="mb-2 md:mb-0 text-sm text-graySemiDark md:mr-2">{'poly_lang_site_rating_title' | lexicon}:</p>
								<div class="flex items-center">
									<form action="/">
										<div data-id="{$res.id}" class="rating">
											<input class="rating__input" name="rating" type="radio" value="1" {if $_modx->getPlaceholder('rating') == 1}checked{/if}>
											<input class="rating__input" name="rating" type="radio" value="2" {if $_modx->getPlaceholder('rating') == 2}checked{/if}>
											<input class="rating__input" name="rating" type="radio" value="3" {if $_modx->getPlaceholder('rating') == 3}checked{/if}>
											<input class="rating__input" name="rating" type="radio" value="4" {if $_modx->getPlaceholder('rating') == 4}checked{/if}>
											<input class="rating__input" name="rating" type="radio" value="5" {if $_modx->getPlaceholder('rating') == 5}checked{/if}>
										</div>
									</form>
									<span class="ml-2 bg-second px-2 py-0.5 text-white text-sm rounded rating-vote">{'rating' | placeholder}</span>
									<p class="ml-2 text-sm text-graySemiDark"><span class="votes-count">{'votes' | placeholder}</span> {'poly_lang_site_rating_votes' | lexicon}</p>
								</div>
							</div>
							<!-- // Когда пользователь не кликнул -->

							<!-- Когда пользователь кликнул -->
							<div class="flex flex-col md:flex-row items-center justify-center hidden vote-success">
								<p class="text-sm text-graySemiDark">{'poly_lang_site_rating_success' | lexicon}</p>
							</div>
							<!-- // Когда пользователь кликнул -->
						</div>
						<div id="mse2_pagination">
        				{'page.nav' | placeholder}
                        </div>

                        {if $res.id != 2}
						<div class="mt-10 mb-10 grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-3 xl:grid-cols-4 gap-5" id="region">

    					{if !$cities = $_modx->cacheManager->get('pdoresources/cities/cities_' ~ $res.id ~ $opt.cultureKey)}
						    {set $cities = $_modx->runSnippet('!pdoResources', [
						        'parents'   => $res.parent == 2 ? $res.id : $res.parent,
							    'templates' => '3',
							    'sortby'    => 'menuindex',
							    'sortdir'   => 'ASC',
							    'tpl'       => '@FILE tpl_main/partials/city.php',
							    'limit'     => 0,
							    
						    ])}
						    {set $null = $_modx->cacheManager->set('pdoresources/cities/cities_' ~ $res.id ~ $opt.cultureKey, $cities, 24 * 3600)}
						{/if}

						{$cities}

						</div>
						{/if}
					</div>
				</div>
				<!-- // Левая колонка -->

				{'!BannerY' | snippet : [
					'positions' => 1,
					'limit'     => 1,
					'sortby'    => 'RAND()',
					'tpl'       => '@FILE chunk/banners/banner.php',
					'tplWrapper' => '@INLINE <div class="flex-shrink-0 mx-auto mt-8 lg:mt-0 lg:ml-8 sticky top-1 self-start">{$output}</div>'
				]}
			</div>

		</div>
	</section>
</main>
{/block}
{disableSource}
{block 'scripts'}
{ignore}
<script>
$('[name="rating"]').click(function() {
    let rating = $(this).val();
    $.post('new-site/assets/menu/connector.php', {action: 'votes', rating: rating, 'id': $(this).parent().data('id')}, (response) => {
        response = JSON.parse(response);
        if(response.success) {
            $('.rating-vote').text(response.rating);
            $('.votes-count').text(response.votes);
            $('[name="rating"]').prop('disabled', true);
            $('.vote-success').removeClass('hidden');
            localStorage.setItem('votes_' + window.location.pathname, true);
        }
    })
})
// Селекты в фильтрах
$(document).ready(function () {
    if(localStorage.getItem('votes_' + window.location.pathname) != null) {
        $('[name="rating"]').prop('disabled', true);
        $('.vote-success').removeClass('hidden');
    }
	// Показать селекты
	$("#showFilter").click(function () {
		$(".filters").slideToggle();
		$(this).find(".show-filter-arrow").toggleClass("-rotate-90");
		$(this).find("span").toggleClass("text-accent");
	});
	// Инициализировать селекты
	$.fn.select2.defaults.set("closeOnSelect", false);
	$(".filters .select").select2();
});
</script>
{/ignore}
{/block}
{block 'scriptsPrev'}
<script src="new-site/libs/select2/select2.min.js"></script>
{/block}
{/disableSource}