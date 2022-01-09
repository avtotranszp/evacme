{extends 'file:layouts/main.php'}

{block 'content'}
<main class="flex-grow flex-shrink-0 relative">
	<div class="hidden absolute bg-white bg-opacity-50 w-full h-full block" id="overlay"></div>
	<section class="py-8">
		<div class="container mx-auto px-4">
			<div class="flex flex-col lg:flex-row justify-between relative">
				<div class="flex flex-col w-full">
					<div class="mb-8">
						<h1 class="text-2xl lg:text-4xl mb-4 lg:mb-0 font-bold">{$res.pagetitle}</h1>
					</div>

					<div class="flex flex-col">

						<!-- Список городов -->
						<div class="mb-10 grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5">

    					{if !$cities = $_modx->cacheManager->get('pdoresources/cities/cities_' ~ $opt.cultureKey)}
						    {set $cities = $_modx->runSnippet('!pdoResources', [
							    'parents'   => '2',
							    'templates' => '2',
							    'sortby'    => 'menuindex',
							    'sortdir'   => 'ASC',
							    'tpl'       => '@FILE tpl_main/partials/city.php',
							    'limit'     => 0,
							    
						    ])}
						    {set $null = $_modx->cacheManager->set('pdoresources/cities/cities_' ~ $opt.cultureKey, $cities, 24 * 3600)}
						{/if}

						{$cities}

						</div>
						<!-- // Список городов -->

						<!-- Текстовый блок -->
						<div class="text-editor-content flex flex-col border-t border-b border-graySecond py-5">
							{$res.content}
						</div>
						<!-- // Текстовый блок -->
					</div>
				</div>

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
	<!--<script charset="utf-8" type="text/javascript" src="https://cp.vidwidget.ru/api/js/widget.js" data-fileName="1340ba10-f052-402b-8ad0-894c67ce8f83"></script>-->
	{if $.get['delete']}
	{set $message =  'poly_lang_site_settings_delete_status_' ~ $.get['delete']}
    	<div id="deleteResults" class="popup bg-dark bg-opacity-70 fixed inset-0 z-30 flex items-center justify-center">
        	<div class="popup__wrapper relative w-full p-4 bg-white rounded shadow-md" style="max-width: 600px; min-height: 65px">
        		<button type="button" class="modalClose bg-dark hover:opacity-100 top-3 right-3 opacity-70 absolute flex items-center justify-center transition transform rounded cursor-pointer">
        			<svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
        				<path d="M24 8L8 24M8 8l16 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        			</svg>
        		</button>
        		<div class="popup__inner w-full">
        			<div class="flex flex-col space-y-4">
        				<p class="text-2xl font-bold text-center">{$message | lexicon}</p>
        			</div>
        		</div>
        	</div>
        </div>
    {/if}
</main>
{/block}
{block 'scripts'}
    {ignore}
        <script>
            $('.modalClose').click(function(){
                $(this).parents('.popup').hide();
            })
        </script>
    {/ignore}
{/block}
