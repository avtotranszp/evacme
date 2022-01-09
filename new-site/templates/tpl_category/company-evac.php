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
			{if ('company_image_path' | placeholder)}
            <div class="rounded shadow-md p-4 mb-4">
                <img src="{'company_image_path' | placeholder}">
            </div>
            {/if}
            
			<div class="flex flex-col lg:flex-row justify-between relative">
				<div class="flex flex-col w-full">
					<div class=" rounded shadow-md p-4">
					    <h1 style="overflow:hidden" class="text-2xl lg:text-2xl mb-2 font-bold">
					        {$res.pagetitle}
				        </h1>
					
					<div class="lg:hidden flex flex-col mt-4 mb-6 space-y-6">
							<div class="flex items-center space-x-3">
							    <span class="hover:opacity-80 sm:w-20 sm:h-20 w-16 h-16 transition">
									<img src="{('company_logo_path' | placeholder) ?: 'new-site/img/profile.svg'}" width="80" height="80" loading="lazy" aria-hidden="true" alt="" />
								</span>
							    
								<div class="flex flex-col space-y-2">
									<div class="flex flex-col">
									     {'company_title' | placeholder}
										
										<span class="text-graySemiDark text-sm">{'poly_lang_site_user_last_login' | lexicon} {$res.createdby | user : 'thislogin' | date_format : '%d.%m.%Y'}</span>
									</div>
								</div>
							</div>
							<div class="sm:grid-cols-2 grid grid-cols-2 gap-4">
							    <button data-target="showContacts" class="popup--open bg-second hover:bg-secondDarken flex items-center justify-center flex-shrink-0 p-2 text-sm text-white transition rounded">Телефон</button>
							    {if $_modx->user['id']}
    							    <div>
    							        <a href="{$_modx->makeUrl($_modx->config['remessages_page'])}id{$.get.id}" class="bg-accent hover:bg-accentDarken flex items-center justify-center flex-shrink-0 order-last p-2 text-sm text-white transition rounded">{'poly_lang_site_user_message_form' | lexicon}</a>
    							    </div>
    						    {else}
    							    <button class="messageToAuthorBtn bg-accent hover:bg-accentDarken flex items-center justify-center flex-shrink-0 order-last p-2 text-sm text-white transition rounded">{'poly_lang_site_user_message_form' | lexicon}</button>
    							{/if}
							</div>
							
    						<!-- Контакты -->
    						<div class="sm:grid-cols-1 gap-x-4 gap-y-4 grid mb-4">
    						    <div class="flex flex-col">
    								<h2 class="w-max font-medium text-xl border-b-2 border-accent mb-2">{'poly_lang_site_settings_requisites' | lexicon}</h2>
    								<ul class="space-y-1">
    									{if ('company_city' | placeholder)}
        									<li class="flex items-center">
        										<img src="new-site/img/check-list.svg" class="flex-shrink-0 mr-2" width="14" height="14" loading="lazy" aria-hidden="true" alt="">
        										<span class="text-sm font-medium">{'poly_lang_site_my_company_city' | lexicon}:</span>
        										<span class="ml-1 text-sm">{'company_city' | placeholder}</span>
        									</li>
    									{/if}
    								    {if ('company_site' | placeholder)}
        									<li class="flex items-center">
        										<img src="new-site/img/check-list.svg" class="flex-shrink-0 mr-2" width="14" height="14" loading="lazy" aria-hidden="true" alt="">
        										<span class="text-sm font-medium">Сайт:</span>
        										<span class="ml-1 text-sm"><a class="text-accent hover:underline" target="_blank" rel="noopener noreferrer" href="{'4000' | url : ['scheme' => 'full'] : ['link' => ('company_site' | placeholder)]}">{'company_site' | placeholder}</a></span>
        									</li>
    									{/if}
    								</ul>
    							</div>
    						</div>
    						<!-- // Контакты -->
						</div>
					
					{if ('company_description' | placeholder)}
					<div class="flex flex-col">
						<div class="text-editor-content flex flex-col">
						    {'company_description' | placeholder}
						</div>
					</div>
					{/if}
					</div>
					
					<div class="flex flex-col bg-white mb-6 md:mb-0">
						<button id="showFilter" class="p-4 border-t border-graySecond group flex justify-center items-center shadow-md">
							<img src="new-site/img/filter.svg" class="flex-shrink-0" width="24" height="24" loading="lazy" aria-hidden="true" alt="">
							<span class="group-hover:text-accent mx-2 transition">{'poly_lang_site_category_filter' | lexicon}</span>
							<img src="new-site/img/arrow.svg" class="show-filter-arrow opacity-50 transition transform rotate-90" width="12" height="12" loading="lazy" aria-hidden="true" alt="">
						</button>

						<div id="mse2_mfilter" class="msearch2 filters hidden mt-4 mb-4 border-t border-gray shadow-md p-4">
							<form action="{$res.uri}" method="post" id="mse2_filters">
								<!-- Обёртка для селектов - в 2 колонки -->
								<div class="mb-4 grid md:grid-cols-2 gap-4">

									{'my_ms|etype' | placeholder}
									{'my_ms|city' | placeholder}

								</div>
								<!-- // Обёртка для селектов - в 2 колонки -->


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

				<div class="flex-shrink-0 mx-auto mt-8 lg:mt-0 lg:ml-8 sticky top-1 self-start">
				    <div class="lg:flex lg:flex-col lg:p-4 lg:space-y-6 lg:shadow-md hidden w-full" style="max-width: 400px">
                        <p class="font-bold">{'poly_lang_site_company_title' | lexicon}</p>
						<div class="flex items-center space-x-3">
							<span class="hover:opacity-80 w-20 h-20 transition">
								<img src="{('company_logo_path' | placeholder) ?: 'new-site/img/profile.svg'}" width="80" height="80" loading="lazy" aria-hidden="true" alt="" />
							</span>
							<div class="flex flex-col space-y-2">
								<div class="flex flex-col">
									<span class="hover:text-second text-lg font-bold transition">
									    {'company_title' | placeholder}
									    </span>
									<span class="text-graySemiDark text-sm">{'poly_lang_site_user_last_login' | lexicon} {$.get.id | user : 'thislogin' | date_format : '%d.%m.%Y'}</span>
								</div>
							</div>
						</div>
						<div class="grid grid-cols-2 gap-4">
						    <button data-target="showContacts" class="popup--open bg-second hover:bg-secondDarken flex items-center justify-center flex-shrink-0 p-2 text-sm text-white transition rounded">Телефон</button>
						    {if $_modx->user['id']}
							    <div>
							        <a href="{$_modx->makeUrl($_modx->config['remessages_page'])}id{$res.createdby}" class="bg-accent hover:bg-accentDarken flex items-center justify-center flex-shrink-0 order-last p-2 text-sm text-white transition rounded">{'poly_lang_site_user_message_form' | lexicon}</a>
							    </div>
						    {else}
							    <button class="messageToAuthorBtn bg-accent hover:bg-accentDarken flex items-center justify-center flex-shrink-0 order-last p-2 text-sm text-white transition rounded">{'poly_lang_site_user_message_form' | lexicon}</button>
							{/if}
						</div>
						

						<!-- Контакты -->
						<div class="sm:grid-cols-1 gap-x-4 gap-y-4 grid mb-4">
						    <div class="flex flex-col">
								<h2 class="w-max font-medium text-xl border-b-2 border-accent mb-2">{'poly_lang_site_settings_requisites' | lexicon}</h2>
								<ul class="space-y-1">
								    {if ('company_city' | placeholder)}
									<li class="flex items-center">
										<img src="new-site/img/check-list.svg" class="flex-shrink-0 mr-2" width="14" height="14" loading="lazy" aria-hidden="true" alt="">
										<span class="text-sm font-medium">{'poly_lang_site_my_company_city' | lexicon}:</span>
										<span class="ml-1 text-sm">{'company_city' | placeholder}</span>
									</li>
									{/if}
								    {if ('company_site' | placeholder)}
									<li class="flex items-center">
										<img src="new-site/img/check-list.svg" class="flex-shrink-0 mr-2" width="14" height="14" loading="lazy" aria-hidden="true" alt="">
										<span class="text-sm font-medium">Сайт:</span>
										<span class="ml-1 text-sm"><a class="text-accent hover:underline" target="_blank" rel="noopener noreferrer" href="{'4000' | url : ['scheme' => 'full'] : ['link' => ('company_site' | placeholder)]}">{'company_site' | placeholder}</a></span>
									</li>
									{/if}
									
								</ul>
							</div>

							
						</div>
						
						<!-- // Контакты + Характеристики -->
					</div>
				</div>
			</div>

		</div>
	</section>
	<div id="showContacts" style="display: none" class="popup bg-dark bg-opacity-70 fixed top-0 bottom-0 left-0 right-0 z-30 flex items-center justify-center">
		<div class="popup__wrapper relative p-4 bg-white rounded shadow-md">
			<button class="modalClose bg-dark hover:opacity-100 top-3 right-3 opacity-70 absolute flex items-center justify-center transition transform rounded cursor-pointer">
				<svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M24 8L8 24M8 8l16 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</button>
			<div class="popup__inner">
				<p class="md:text-2xl text-xl font-bold text-center">{'poly_lang_site_user_contact_form_title' | lexicon}</p>
				<div class="md:p-6 md:mt-2 flex flex-col items-center gap-5 mt-4">
					<div class="w-20 h-20">
						<img src="{('company_logo_path' | placeholder) ?: 'new-site/img/profile.svg'}" width="80" height="80" loading="lazy" aria-hidden="true" alt="" />
					</div>
					<div class="flex flex-col items-center">
						<p class="text-xl font-medium">{'company_title' | placeholder}</p>
						<span class="text-grayDarken text-base">{'poly_lang_site_user_dolgnost' | lexicon}</span>
					</div>
					<div class="flex flex-col items-center gap-2">
						<p class="text-sm font-bold">{'poly_lang_site_user_contact_tel' | lexicon}</p>
						<a href="tel:{('company_phone' | placeholder) | clearPhone}" class="text-accent hover:text-second text-lg transition">{'company_phone' | placeholder}</a>
					</div>
					<div class="flex flex-col items-center gap-2">
						<p class="text-grayDarken text-sm text-center">{'poly_lang_site_user_contact_slogan' | lexicon}</p>
						<p class="bg-second bg-opacity-20 p-3 text-xs text-center">{'poly_lang_site_user_contact_attention' | lexicon}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	{'!AjaxForm' | snippet : [
    	'snippet'      => 'FormIt',
    	'form'         => '@FILE tpl_card/partials/form-user.php',
    	'hooks'        => 'checkSpamTime,email,sendMessage',
    	'emailSubject' => 'Вам написали со страницы - ' ~ $res.pagetitle,
    	'emailTo'      => $res.createdby | user : 'email',
    	'emailFromName' => $_modx->getPlaceholder('name'),
    	'emailReplyTo' => $_modx->getPlaceholder('email'),
    	'emailBCC'     => 'spetsekspress@gmail.com',
    	'emailFrom'    => 'message@evacme.com.ua',
    	'emailTpl'     => 'tpl.email-message',
    	'validate'     => 'name:required,email:email:required,message:minLength=^10^',
    ]}
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
});



$(document).ready(function () {
	$('a.polylang-item--ru').attr('href', location.href.replace('/ua/', '/'))
	$('a.polylang-item--ua').attr('href', location.href.replace('evacme.com.ua/', 'evacme.com.ua/ua/'))

});
$(document).ready(function () {
	let popup = document.getElementById("popup");
	let popupCloseButton = popup.querySelector(".button--close");

	function showPopup() {
		popup.classList.remove("hidden");
	}
	function hidePopup() {
		popup.classList.add("hidden");
	}
	function removeImg() {
		$(".popup__img").remove();
	}

	popup.addEventListener("click", (e) => {
		if (e.target === popup) {
			hidePopup();
			removeImg();
		}
	});

	popupCloseButton.addEventListener("click", () => {
		hidePopup();
		removeImg();
	});

	document.addEventListener("keydown", (e) => {
		if (e.code === "Escape" && popup.classList.contains("flex")) {
			hidePopup();
			removeImg();
		}
	});

	if ($(window).width() > 768) {
		$("#evacuatorLink").click(function (e) {
			e.preventDefault();
			let src = $(this).attr("href");
			let newImg = $("<img aria-hidden='true' alt='' class='popup__img' src='" + src + "'>");
			$(".popup__inner").prepend(newImg);
			newImg.fadeIn(1000);
			showPopup();
		});
	} else {
		$("#evacuatorLink").click(function (e) {
			e.preventDefault();
		});
	}
});

$(document).ready(function () {
	let complainPopup = document.getElementById("complainPopup");
	let openComplainPopup = document.getElementById("complainButton");
	let closeComplainPopup = complainPopup.querySelector(".button--close");
	let body = $("#body");
	openComplainPopup.addEventListener("click", function () {
		complainPopup.classList.remove("hidden");
		body.css("overflow-y", "hidden");
	});

	closeComplainPopup.addEventListener("click", function () {
		complainPopup.classList.add("hidden");
		body.css("overflow-y", "auto");
	});
});
$(document).on("click", ".popup--open", function () {
	let modalObj = $("#" + $(this).attr("data-target"));

	// hide other windows
	let openedObj = $(".modalWindow:visible");
	if (openedObj) {
		$(openedObj).hide();
	}

	$(modalObj).show(0, function (e) {
		$("#body").css({ overflowY: "hidden" });
		$(modalObj).focus();
	});

	$(document).on("keyup", function (e) {
		if (e.keyCode == 27) {
			$(modalObj).hide();
		}
		$(document).off(this);
	});

	$(modalObj).on("click", function (e) {
		if (e.target.id === modalObj.attr("id") || e.target.classList.contains("modalClose") || $(e.target).parents(".modalClose").length) {
			$("#body").css({ overflowY: "" });
			$(modalObj).hide();
			$(modalObj).off("click");
		}
	});
});
</script>
{/ignore}
{/block}
{block 'scriptsPrev'}
<script src="new-site/libs/select2/select2.min.js"></script>
{/block}
