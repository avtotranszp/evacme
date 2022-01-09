{extends 'file:layouts/main.php'}
{block 'linksPrev'}
<link rel="stylesheet" href="new-site/libs/select2/select2.min.css">
<link rel="preload" as="style" href="new-site/libs/select2/select2.min.css"/>
{/block}
{block 'content'}
{'!isLoggedIn' | snippet : ['redirectTo' => 3781]}
{$_modx->runSnippet('!mFilter2', [
    'depth' => 3,
    'parents' => 2,
    'paginator' => 'pdoPage',
    'suggestions' => 0,
    'showEmptyFilters' => false,
    'includeImages' => true,
    'filters' => '
        ms|city,
        ms|etype
    ',
    'tplFilter.outer.ms|city' => '@FILE filters/select_outer_one.php',
    'tplFilter.row.ms|city' => '@FILE filters/select_row.php',
    
    'tplFilter.outer.ms|etype' => '@FILE filters/select_outer.php',
    'tplFilter.row.ms|etype' => '@FILE filters/select_row.php',
    
    'tplFilter.outer.ms|capacity' => '@FILE filters/select_outer.php',
    'tplFilter.row.ms|capacity' => '@FILE filters/select_row.php',
    
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
    'where'          => '{"createdby": ' ~ $_modx->user.id ~ ' }',
    'tpl'            => '@FILE tpl_account/partials/evac-card.php',
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
	    <div class="container flex flex-col gap-2 px-4 mx-auto mb-5">
			<div class="sm:flex-row sm:items-center flex flex-col justify-between">
				<h1 class="text-2xl font-bold text-black">{$_modx->resource['pagetitle']}</h1>
				{'personal_balance' | chunk}
			</div>
			<p class="text-graySemiDark">{$_modx->resource['introtext']}</p>
		</div>
		<div class="container mx-auto px-4">

			<div class="flex flex-col lg:flex-row justify-between relative">
				{'account_menu' | chunk}
				

				<div class="flex flex-col w-full lg:ml-8">
				    
				    
				    
					<div class="flex flex-col">
						<div class="mb-6 flex flex-col">

							<div class="mb-3 md:mb-4 flex flex-col sm:flex-row justify-between items-center">
								<h2 class="text-2xl md:text-3xl font-bold">{'poly_lang_site_account_evac' | lexicon}</h2>
							</div>
							
							<div class="flex flex-col bg-white mb-6">
            					<button id="showFilter" class="p-4 border-t border-graySecond group flex justify-center items-center md:ml-auto shadow-md">
            						<img src="new-site/img/filter.svg" class="flex-shrink-0" width="24" height="24" loading="lazy" role="presentation" alt="">
            						<span class="group-hover:text-accent mx-2 transition">{'poly_lang_site_category_filter' | lexicon}</span>
            						<img src="new-site/img/arrow.svg" class="show-filter-arrow opacity-50 transition transform rotate-90" width="12" height="12" loading="lazy" role="presentation" alt="">
            					</button>
            
            					<div id="mse2_mfilter" class="msearch2 filters hidden mt-4 mb-4 border-t border-gray shadow-md p-4">
            						<form action="{$res.uri}" method="post" id="mse2_filters">
            							<!-- Обёртка для селектов - в 2 колонки -->
            							<div class="mb-4 grid md:grid-cols-2 gap-4">
            
                                            {'my_ms|city' | placeholder}
            								{'my_ms|etype' | placeholder}
            
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

							<div id="mse2_results">
    						    {'my_results'|placeholder}
    						</div>

							<div id="mse2_pagination">
            			    	{'page.nav' | placeholder}
                            </div>
						</div>

				</div>
			</div>
		</div>
	</section>
</main>
{/block}
{block 'scripts'}
{ignore}
<script>
// Селекты в фильтрах
$(document).ready(function () {
	// Показать селекты
	$("#showFilter").click(function () {
		$(".filters").slideToggle();
		$(this).find(".show-filter-arrow").toggleClass("-rotate-90");
		$(this).find("span").toggleClass("text-accent");
	});
	// Инициализировать селекты
	$.fn.select2.defaults.set("closeOnSelect", true);
	$(".filters .select").select2();
});
</script>
{/ignore}
{/block}
{block 'scriptsPrev'}
<script src="new-site/libs/select2/select2.min.js"></script>
{/block}
