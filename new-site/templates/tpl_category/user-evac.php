{extends 'file:layouts/main.php'}
{block 'linksPrev'}
<link rel="stylesheet" href="new-site/libs/select2/select2.min.css">
<link rel="preload" as="style" href="new-site/libs/select2/select2.min.css"/>
{/block}
{block 'content'}
{$_modx->runSnippet('!mFilter2', [
	'parents' => 2,
    'depth' => 3,
    'paginator' => 'pdoPage',
    'suggestions' => 0,
    'showEmptyFilters' => false,
    'includeImages' => true,
    'filters' => '
        ms|etype,
        ms|capacity,
        ms|city,
        ms|transfer
    ',
    'tplFilter.outer.ms|etype' => '@FILE filters/select_outer.php',
    'tplFilter.row.ms|etype' => '@FILE filters/select_row.php',
    
    'tplFilter.outer.ms|capacity' => '@FILE filters/select_outer.php',
    'tplFilter.row.ms|capacity' => '@FILE filters/select_row.php',
    
    'tplFilter.outer.ms|city' => '@FILE filters/select_outer.php',
    'tplFilter.row.ms|city' => '@FILE filters/select_row.php',
    
    'tplFilter.outer.ms|transfer' => '@FILE filters/checkbox_outer.php',
    'tplFilter.row.ms|transfer' => '@FILE filters/checkbox_row.php',
    
    'toSeparatePlaceholders' => 'my_',
	'element' => 'msProducts',
	'limit'   => 12,
	'showHidden'    => false,
    'sortby'  => [
        'vipuntil' => 'DESC',
        'id'       => 'DESC',
    ],
    'wrapIfEmpty'    => false,
    'includeImages'  => true,
    'where'          => '{"createdby:=": ' ~ $.get.id ~ '}',
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
					<h1 class="text-2xl lg:text-4xl mb-4 lg:mb-6 font-bold">{$res.pagetitle} - {strtok($.get.id | user : 'email', '@')}</h1>
					
					
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
					

					<div class="flex flex-col">					 
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
                        
						<div id="mse2_pagination">
        				{'page.nav' | placeholder}
                        </div>

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
{block 'scripts'}
{ignore}
<script>
$('[name="rating"]').click(function() {
    let rating = $(this).val();
    $.post('new-site/assets/menu/connector.php', {action: 'votes', rating: rating}, (response) => {
        response = JSON.parse(response);
        if(response.success) {
            $('.rating-vote').text(response.rating);
            $('.votes-count').text(response.votes);
            $('[name="rating"]').prop('disabled', true);
            $('.vote-success').removeClass('hidden');
            localStorage.setItem('votes', true);
        }
    })
})
// Селекты в фильтрах
$(document).ready(function () {
    if(localStorage.getItem('votes') != null) {
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
	
	$('a.polylang-item--ru').attr('href', location.href.replace('/ua/', '/'))
	$('a.polylang-item--ua').attr('href', location.href.replace('evacme.com.ua/', 'evacme.com.ua/ua/'))
});
</script>
{/ignore}
{/block}
{block 'scriptsPrev'}
<script src="new-site/libs/select2/select2.min.js"></script>
{/block}
