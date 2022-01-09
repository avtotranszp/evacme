{extends 'file:layouts/main.php'}
{block 'linksPrev'}
<link rel="stylesheet" href="new-site/libs/select2/select2.min.css">
<link rel="preload" as="style" href="new-site/libs/select2/select2.min.css"/>

<link rel="stylesheet" href="new-site/libs/fotorama/fotorama.css">
<link rel="preload" as="style" href="new-site/libs/fotorama/fotorama.css"/>
{/block}
{block 'content'}
{set $user  = $res.createdby | user : 'fullname'}
{set $photo = $res.createdby | user : 'photo'}
{set $phone = $res.createdby | user : 'phone'}
{set $hide  = $res.createdby | user : 'extended'}
<main class="relative flex-grow flex-shrink-0">
	<section class="py-8">
		<div class="container px-4 mx-auto">
			<!-- Хлебные крошки -->
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
			<!-- // Хлебные крошки -->
			{if ('!getCompanyField' | snippet : ['field' => 'image'] && false)}
            <div class="rounded shadow-md p-4 mb-4">
                <img src="{'!getCompanyField' | snippet : ['field' => 'image']}">
            </div>
            {/if}
			<div itemscope itemtype="http://schema.org/Organization" class="lg:flex-row relative flex flex-col justify-between">
			    <meta itemprop="email" content="{$res.createdby | user : 'email'}">
			    <meta itemprop="phone" content="{$phone}">
				<!-- Левая колонка -->
				<div class="flex flex-col w-full">
					{set $images = $_modx->runSnippet('!msGallery', [
						'product' => $res.id,
						'tpl' => '@INLINE 
							{if $files?} 
								{foreach $files as $file}
					                {$file.url}
					                <img src="{$file.url}" width="450" height="300" class="object-cover object-center w-full h-full" loading="lazy" alt="{$res.pagetitle}">
					            {/foreach}
				            {else}
				            	<img src="new-site/img/evac-placeholder.jpg" width="450" height="300" class="object-cover object-center w-full h-full" loading="lazy" alt="{$res.pagetitle}">
				            	
				            {/if}
				            ',
					])}
					<div class="flex flex-col p-4 rounded shadow-md">
						<div class="gap-x-4 gap-y-4 grid grid-cols-1 mb-4">
							<div class="fotorama w-full" data-allowfullscreen="true" data-nav="thumbs" data-width="100%" data-ratio="800/600">
								{$images}
							</div>
						</div>
					</div>
					<div class="flex flex-col p-4 rounded shadow-md">
						<h1 class="mb-4 text-2xl font-bold">{$res.pagetitle}</h1>

						<div class="lg:hidden flex flex-col mt-4 mb-6 space-y-6">
						
							<p class="font-bold">
							    {if ('!getCompanyField' | snippet : ['field' => 'id'])}
							        {'poly_lang_site_company_title' | lexicon}
							    {else}
							        {'poly_lang_site_user_user' | lexicon}
							    {/if}
						    </p>
							<div class="flex items-center space-x-3">
							    {if ('!getCompanyField' | snippet : ['field' => 'id'])}
							    <a href="{3999 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="hover:opacity-80 sm:w-20 sm:h-20 w-16 h-16 transition">
									<img src="{$photo ?: 'new-site/img/profile.svg'}" width="80" height="80" loading="lazy" aria-hidden="true" alt="" />
								</a>
							    {else}
								<a href="{3813 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="hover:opacity-80 sm:w-20 sm:h-20 w-16 h-16 transition">
									<img src="{$photo ?: 'new-site/img/profile.svg'}" width="80" height="80" loading="lazy" aria-hidden="true" alt="" />
								</a>
								{/if}
								<div class="flex flex-col space-y-2">
									<div class="flex flex-col">
									    {if ('!getCompanyField' | snippet : ['field' => 'id'])}
									        <a href="{3999 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="hover:text-second text-lg font-bold transition">
										    {$user ? strtok($user, '@') : strtok($res.createdby | user : 'email', '@')}
										    </a>   
									    {else}
                                            <a href="{3813 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="hover:text-second text-lg font-bold transition">
										    {$user ? strtok($user, '@') : strtok($res.createdby | user : 'email', '@')}
										    </a>    							
										{/if}
										
										<span class="text-graySemiDark text-sm">{'poly_lang_site_user_last_login' | lexicon} {$res.createdby | user : 'thislogin' | date_format : '%d.%m.%Y'}</span>
									</div>
									{if ('!getCompanyField' | snippet : ['field' => 'id'])}
									<a href="{3999 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="border-dark hover:border-second hover:text-second transition">{'poly_lang_site_company_all_evac' | lexicon}</a>
									{else}
									<a href="{3813 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="border-dark hover:border-second hover:text-second transition">{'poly_lang_site_user_all_evac' | lexicon}</a>
								    {/if}
								</div>
							</div>
							<div class="sm:grid-cols-2 grid grid-cols-1 gap-4">
							    {if $hide['hide_phone'] != 1}
								<button data-target="showContacts" class="popup--open bg-second hover:bg-secondDarken flex items-center justify-center flex-shrink-0 p-2 text-sm text-white transition rounded">Телефон</button>
                                {/if}
								<button class="messageToAuthorBtn bg-accent hover:bg-accentDarken flex items-center justify-center flex-shrink-0 order-last p-2 text-sm text-white transition rounded">{'poly_lang_site_user_message_form' | lexicon}</button>
								{if $_modx->user['id']}
								    <div style="display:none">
								        <a href="{$_modx->makeUrl($_modx->config['remessages_page'])}/id{$res.createdby}" class="bg-accent hover:bg-accentDarken flex items-center justify-center flex-shrink-0 order-last p-2 text-sm text-white transition rounded">{'poly_lang_site_user_message_form' | lexicon}</a>
								    </div>
								{/if}
							</div>
							{if $price1 || $price2 || $price3 || $price4 || $price5 || $price6 || $price7 || $price8 || $price9 || $price10}
							<table class="price-table">
								<thead>
									<tr class="border-gray border-b">
										<th class="sm:pl-2 text-sm text-left">{'poly_lang_site_card_type_prce' | lexicon}</th>
										<th class="text-sm text-left">грн</th>
									</tr>
								</thead>
								<tbody>
									{if $price1?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_price_to' | lexicon} 1,5 тонн</td>
										<td class="font-medium">{$res.price1}</td>
									</tr>
									{/if}
									{if $price2?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_price_to' | lexicon} 3 тонн</td>
										<td class="font-medium">{$res.price2}</td>
									</tr>
									{/if}
									{if $price3?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_price_to' | lexicon} 5 тонн</td>
										<td class="font-medium">{$res.price3}</td>
									</tr>
									{/if}
									{if $price4?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_prostoi' | lexicon}</td>
										<td class="font-medium">{$res.price4}</td>
									</tr>
									{/if}
									{if $price5?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_without_city' | lexicon}</td>
										<td class="font-medium">{$res.price5}</td>
									</tr>
									{/if}
									{if $price6?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_price_up' | lexicon}</td>
										<td class="font-medium">{$res.price6}</td>
									</tr>
									{/if}
									{if $price7?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_block' | lexicon}</td>
										<td class="font-medium">{$res.price7}</td>
									</tr>
									{/if}
									{if $price8?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_manipulator' | lexicon}</td>
										<td class="font-medium">{$res.price8}</td>
									</tr>
									{/if}
									{if $price9?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_night' | lexicon}</td>
										<td class="font-medium">{$res.price9}</td>
									</tr>
									{/if}
									{if $price10?}
									<tr class="border-b border-gray">
										<td class="sm:pl-2 text-sm">
											<span class="text-sm w-60 group hover:underline cursor-pointer block text-accent font-medium relative">{'poly_lang_site_evac_create_slognost' | lexicon}
												<span class="text-sm group-hover:block hidden w-72 bg-white rounded -bottom-26 shadow-md border-gray p-2 left-0 absolute text-dark">{'poly_lang_site_evac_create_slognost_desc' | lexicon}</span>
											</span>
										</td>
										<td class="font-medium">{$res.price10}</td>
									</tr>
									{/if}
								</tbody>
							</table>
							{/if}
    						<!-- Контакты + Характеристики -->
    						<div class="sm:grid-cols-1 gap-x-4 gap-y-4 grid mb-4">
    						    <div class="flex flex-col">
    								<h2 class="w-max font-medium text-xl border-b-2 border-accent mb-2">{'poly_lang_site_characteristics' | lexicon}</h2>
    								<ul class="space-y-1">
    									<li class="flex items-center">
    										<img src="new-site/img/check-list.svg" class="flex-shrink-0 mr-2" width="14" height="14" loading="lazy" aria-hidden="true" alt="">
    										<span class="text-sm font-medium">{'poly_lang_site_evac_create_capacity' | lexicon}:</span>
    										<span class="ml-1 text-sm">до {$res.capacity} тонн</span>
    									</li>
    									<li class="flex items-center">
    										<img src="new-site/img/check-list.svg" class="flex-shrink-0 mr-2" width="14" height="14" loading="lazy" aria-hidden="true" alt="">
    										<span class="text-sm font-medium">{'poly_lang_site_evac_create_evac_type' | lexicon}:</span>
    										<span class="ml-1 text-sm">{$res.etype}</span>
    									</li>
    								</ul>
    							</div>
    							{*
    							<div class="flex flex-col">
    								<h2 class="border-accent w-max mb-2 text-xl font-medium border-b-2">{'poly_lang_site_contacts' | lexicon}</h2>
    								<div class="flex items-center mb-1">
    									<img src="new-site/img/location.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
    									<p class="text-sm ml-2">{'poly_lang_site_city_short' | lexicon} {$res.city}</p>
    								</div>
    
    								{if $res.phone?}
    								<div class="flex items-center mb-1">
    									<img src="new-site/img/mobile.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
    									<a href="tel:{$res.phone | clearPhone}" class="text-sm ml-2 text-accent hover:underline transition">{$res.phone}</a>
    								</div>
    								{/if}
    								{if $res.phone_2?}
    								<div class="flex items-center mb-1">
    									<img src="new-site/img/mobile.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
    									<a href="tel:{$res.phone_2 | clearPhone}" class="text-sm ml-2 text-accent hover:underline transition">{$res.phone_2}</a>
    								</div>
    								{/if}
    								{if $res.phone_3?}
    								<div class="flex items-center mb-1">
    									<img src="new-site/img/mobile.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
    									<a href="tel:{$res.phone_3 | clearPhone}" class="text-sm ml-2 text-accent hover:underline transition">{$res.phone_3}</a>
    								</div>
    								{/if}
    							</div>
    							*}
    
    							
    						</div>
    						<!-- // Контакты + Характеристики -->
						</div>



						{if $res.content}
						<div class="flex flex-col">
							[[-<h2 class="w-max font-medium text-xl border-b-2 border-accent mb-4">{'poly_lang_site_cart_about_us' | lexicon}</h2>]]
							<div class="text-editor-content flex flex-col">
							    {$res.content|preg_replace : '~<a\b[^>]*+>|</a\b[^>]*+>~': ''}
							</div>
						</div>
						{/if}

						<!-- Просмотры + ID + Пожаловаться -->
						<div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:items-center justify-between pt-2 mt-2 border-t border-gray">
							<!-- Просмотров -->
							<div class="flex items-center">
								<img src="new-site/img/password-on.svg" class="opacity-50 flex-shrink-0" width="20" height="20" loading="lazy" aria-hidden="true" alt="">
								<p class="ml-1 text-sm text-graySemiDark font-medium">{'poly_lang_site_cart_count_views' | lexicon}:</p>
								<span class="ml-1 text-sm text-graySemiDark">{'!HitsPage' | snippet}</span>
							</div>

							<!-- ID объявления -->
							<div class="flex items-center">
								<img src="new-site/img/tag.svg" class="opacity-50 flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
								<p class="ml-1 text-sm text-graySemiDark font-medium">ID {'poly_lang_site_category_evac' | lexicon}:</p>
								<span class="ml-1 text-sm text-graySemiDark transition hover:text-accent">{$res.id}</span>
							</div>

							<!-- Пожаловаться -->
							<button id="complainButton" class="flex items-center text-graySemiDark group hover:text-red transition">
								<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M8 15C6.14348 15 4.36301 14.2625 3.05025 12.9497C1.7375 11.637 1 9.85652 1 8C1 6.14348 1.7375 4.36301 3.05025 3.05025C4.36301 1.7375 6.14348 1 8 1C9.85652 1 11.637 1.7375 12.9497 3.05025C14.2625 4.36301 15 6.14348 15 8C15 9.85652 14.2625 11.637 12.9497 12.9497C11.637 14.2625 9.85652 15 8 15ZM8 13C9.32608 13 10.5979 12.4732 11.5355 11.5355C12.4732 10.5979 13 9.32608 13 8C13 6.67392 12.4732 5.40215 11.5355 4.46447C10.5979 3.52678 9.32608 3 8 3C6.67392 3 5.40215 3.52678 4.46447 4.46447C3.52678 5.40215 3 6.67392 3 8C3 9.32608 3.52678 10.5979 4.46447 11.5355C5.40215 12.4732 6.67392 13 8 13ZM6 7H10C10.2652 7 10.5196 7.10536 10.7071 7.29289C10.8946 7.48043 11 7.73478 11 8C11 8.26522 10.8946 8.51957 10.7071 8.70711C10.5196 8.89464 10.2652 9 10 9H6C5.73478 9 5.48043 8.89464 5.29289 8.70711C5.10536 8.51957 5 8.26522 5 8C5 7.73478 5.10536 7.48043 5.29289 7.29289C5.48043 7.10536 5.73478 7 6 7Z" class="fill-current"/>
								</svg>
								<span class="ml-1 text-sm">{'poly_lang_site_cart_pogal' | lexicon}</span>
								<!-- #f84146 -->
							</button>
						</div>
						<!-- // Просмотры + ID + Пожаловаться -->
					</div>


					<!-- Поделиться объявлением -->
					<div class="flex items-center justify-between p-2 shadow-md rounded mt-4">
						<p class="text-sm text-graySemiDark mr-2 sm:mr-4">{'poly_lang_site_cart_share' | lexicon}:</p>
						<ul class="space-x-2 flex items-center">
							<li class="hover:opacity-70 transition">
								<a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={$opt.site_url}{$res.uri}" title="Facebook">
									<img src="new-site/img/social-icons/facebook.svg" width="32" height="32" loading="lazy" aria-hidden="true" alt="">
								</a>
							</li>
							<li class="hover:opacity-70 transition">
								<a  href="https://telegram.me/share/url?{['url' => $opt.site_url ~ $res.uri, 'text' => $res.pagetitle] | http_build_query}" title="Telegram">
									<img src="new-site/img/social-icons/telegram.svg" width="32" height="32" loading="lazy" aria-hidden="true" alt="">
								</a>
							</li>
							<li class="hover:opacity-70 transition">
								<a target="_blank" href="https://twitter.com/intent/tweet?url={$opt.site_url}{$res.uri}" title="Twitter">
									<img src="new-site/img/social-icons/twitter.svg" width="32" height="32" loading="lazy" aria-hidden="true" alt="">
								</a>
							</li>
							<li class="hover:opacity-70 transition">
								<a href="viber://forward?text={$opt.site_url}{$res.uri}" title="Viber">
									<img src="new-site/img/social-icons/viber.svg" width="32" height="32" loading="lazy" aria-hidden="true" alt="">
								</a>
							</li>
							<li class="hover:opacity-70 transition">
								<a href="whatsapp://send?text={$opt.site_url}{$res.uri}" title="WhatsApp">
									<img src="new-site/img/social-icons/whatsapp.svg" width="32" height="32" loading="lazy" aria-hidden="true" alt="">
								</a>
							</li>
							<li class="hover:opacity-70 transition">
								<a href="mailto:?{['body' => $opt.site_url ~ $res.uri, 'subject' => $res.pagetitle] | http_build_query}" title="Email">
									<img src="new-site/img/social-icons/email.svg" width="32" height="32" loading="lazy" aria-hidden="true" alt="">
								</a>
							</li>
						</ul>
					</div>
					<!-- // Поделиться объявлением -->

                    {'!ecMessages' | snippet : [
				        'tpl' => 'review.view.card',
				        'tplEmpty' => 'empty_review',
				        'tplWrapper' => 'review_wrapper'
				    ]}
                    
                    <div class="flex flex-col my-5 p-4 mt-4 shadow-md">
						{'ecForm' | snippet : [
					        'tplForm' => 'commentFormTplMain',
					        'allowedFields' => 'user_name,user_email,text,rating',
					        'requiredFields' => 'user_name,user_email,text,rating',
					        'tplSuccess' => '',
					        'tplNewEmailUser' => '',
					        'updateEmailSubjUser' => '',
					        'autoPublish' => 'All',
					        
					    ]}
					</div>
					<!-- // Отзывы -->
				</div>
				<!-- // Левая колонка -->

				<!-- Правая колонка -->
				<div class="lg:mt-0 lg:ml-8 top-1 sticky self-start flex-shrink-0 mx-auto mt-8">
					<div class="lg:flex lg:flex-col lg:p-4 lg:space-y-6 lg:shadow-md hidden w-full" style="max-width: 400px">

						{if ('!getCompanyField' | snippet : ['field' => 'id'])}
					        <p class="font-bold">{'poly_lang_site_company_title' | lexicon}</p>
					    {else}
					        <p class="font-bold">{'poly_lang_site_user_user' | lexicon}</p>
					    {/if}
						<div class="flex items-center space-x-3">
						    {if ('!getCompanyField' | snippet : ['field' => 'id'])}
						    <a href="{3999 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="hover:opacity-80 w-20 h-20 transition">
								<img src="{$photo ?: 'new-site/img/profile.svg'}" width="80" height="80" loading="lazy" aria-hidden="true" alt="" />
							</a>
						    {else}
							<a href="{3813 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="hover:opacity-80 w-20 h-20 transition">
								<img src="{$photo ?: 'new-site/img/profile.svg'}" width="80" height="80" loading="lazy" aria-hidden="true" alt="" />
							</a>
							{/if}
							
							<div class="flex flex-col space-y-2">
								<div class="flex flex-col">
								    {if ('!getCompanyField' | snippet : ['field' => 'id'])}
        						    <a itemprop="name" href="{3999 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="hover:text-second text-lg font-bold transition" >
									    {$user ? strtok($user, '@') : strtok($res.createdby | user : 'email', '@')}
									    </a>
        						    {else}
        							<a itemprop="name" href="{3813 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="hover:text-second text-lg font-bold transition" >
									    {$user ? strtok($user, '@') : strtok($res.createdby | user : 'email', '@')}
									    </a>
        							{/if}
									
									<span class="text-graySemiDark text-sm">{'poly_lang_site_user_last_login' | lexicon} {$res.createdby | user : 'thislogin' | date_format : '%d.%m.%Y'}</span>
								</div>
								
								{if ('!getCompanyField' | snippet : ['field' => 'id'])}
    						    <a href="{3999 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="border-dark hover:border-second hover:text-second transition">{'poly_lang_site_company_all_evac' | lexicon}</a>
    						    {else}
    							<a href="{3813 | url : ['scheme' => 'full'] : ['id' => $res.createdby]}" class="border-dark hover:border-second hover:text-second transition">{'poly_lang_site_user_all_evac' | lexicon}</a>
    							{/if}
								
							</div>
						</div>
						<div class="grid grid-cols-2 gap-4">
						    {if $hide['hide_phone'] != 1}
    						    {if $res.phone?}
    							<button data-target="showContacts" class="popup--open bg-second hover:bg-secondDarken flex items-center justify-center flex-shrink-0 p-2 text-sm text-white transition rounded">Телефон</button>
    							{elseif $res.phone_2?}
    							<button data-target="showContacts" class="popup--open bg-second hover:bg-secondDarken flex items-center justify-center flex-shrink-0 p-2 text-sm text-white transition rounded">Телефон</button>
    							{elseif $res.phone_3?}
    							<button data-target="showContacts" class="popup--open bg-second hover:bg-secondDarken flex items-center justify-center flex-shrink-0 p-2 text-sm text-white transition rounded">Телефон</button>
    							{/if}
							{/if}
							<button class="messageToAuthorBtn bg-accent hover:bg-accentDarken flex items-center justify-center flex-shrink-0 order-last p-2 text-sm text-white transition rounded">{'poly_lang_site_user_message_form' | lexicon}</button>
						    {if $_modx->user['id']}
								    <div style="display:none">
								        <a href="{$_modx->makeUrl($_modx->config['remessages_page'])}id{$res.createdby}" class="bg-accent hover:bg-accentDarken flex items-center justify-center flex-shrink-0 order-last p-2 text-sm text-white transition rounded">{'poly_lang_site_user_message_form' | lexicon}</a>
								    </div>
								{/if}
						</div>
						{if $price1 || $price2 || $price3 || $price4 || $price5 || $price6 || $price7 || $price8 || $price9 || $price10}
						<table class="price-table">
							<thead>
								<tr class="border-gray border-b">
									<th class="sm:pl-2 text-sm text-left">{'poly_lang_site_card_type_prce' | lexicon}</th>
									<th class="text-sm text-left">грн</th>
								</tr>
							</thead>
							<tbody>
								{if $price1?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_price_to' | lexicon} 1,5 тонн</td>
									<td class="font-medium">{$res.price1}</td>
								</tr>
								{/if}
								{if $price2?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_price_to' | lexicon} 3 тонн</td>
									<td class="font-medium">{$res.price2}</td>
								</tr>
								{/if}
								{if $price3?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_price_to' | lexicon} 5 тонн</td>
									<td class="font-medium">{$res.price3}</td>
								</tr>
								{/if}
								{if $price4?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_prostoi' | lexicon}</td>
									<td class="font-medium">{$res.price4}</td>
								</tr>
								{/if}
								{if $price5?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_without_city' | lexicon}</td>
									<td class="font-medium">{$res.price5}</td>
								</tr>
								{/if}
								{if $price6?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_price_up' | lexicon}</td>
									<td class="font-medium">{$res.price6}</td>
								</tr>
								{/if}
								{if $price7?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_block' | lexicon}</td>
									<td class="font-medium">{$res.price7}</td>
								</tr>
								{/if}
								{if $price8?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_manipulator' | lexicon}</td>
									<td class="font-medium">{$res.price8}</td>
								</tr>
								{/if}
								{if $price9?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">{'poly_lang_site_evac_create_night' | lexicon}</td>
									<td class="font-medium">{$res.price9}</td>
								</tr>
								{/if}
								{if $price10?}
								<tr class="border-b border-gray">
									<td class="sm:pl-2 text-sm">
										<span class="text-sm w-60 group hover:underline cursor-pointer block text-accent font-medium relative">{'poly_lang_site_evac_create_slognost' | lexicon}
											<span class="text-sm group-hover:block hidden w-72 bg-white rounded -bottom-26 shadow-md border-gray p-2 left-0 absolute text-dark">{'poly_lang_site_evac_create_slognost_desc' | lexicon}</span>
										</span>
									</td>
									<td class="font-medium">{$res.price10}</td>
								</tr>
								{/if}
							</tbody>
						</table>
						{/if}
						<!-- Контакты + Характеристики -->
						<div class="sm:grid-cols-1 gap-x-4 gap-y-4 grid mb-4">
						    <div class="flex flex-col">
								<h2 class="w-max font-medium text-xl border-b-2 border-accent mb-2">{'poly_lang_site_characteristics' | lexicon}</h2>
								<ul class="space-y-1">
									<li class="flex items-center">
										<img src="new-site/img/check-list.svg" class="flex-shrink-0 mr-2" width="14" height="14" loading="lazy" aria-hidden="true" alt="">
										<span class="text-sm font-medium">{'poly_lang_site_evac_create_capacity' | lexicon}:</span>
										<span class="ml-1 text-sm">до {$res.capacity} тонн</span>
									</li>
									<li class="flex items-center">
										<img src="new-site/img/check-list.svg" class="flex-shrink-0 mr-2" width="14" height="14" loading="lazy" aria-hidden="true" alt="">
										<span class="text-sm font-medium">{'poly_lang_site_evac_create_evac_type' | lexicon}:</span>
										<span class="ml-1 text-sm">{$res.etype}</span>
									</li>
								</ul>
							</div>
							{*
							<div class="flex flex-col">
								<h2 class="border-accent w-max mb-2 text-xl font-medium border-b-2">{'poly_lang_site_contacts' | lexicon}</h2>
								<div class="flex items-center mb-1">
									<img src="new-site/img/location.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
									<p class="text-sm ml-2">{'poly_lang_site_city_short' | lexicon} {$res.city}</p>
								</div>

								{if $res.phone?}
								<div class="flex items-center mb-1">
									<img src="new-site/img/mobile.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
									<a href="tel:{$res.phone}" class="text-sm ml-2 text-accent hover:underline transition">{$res.phone}</a>
								</div>
								{/if}
								{if $res.phone_2?}
								<div class="flex items-center mb-1">
									<img src="new-site/img/mobile.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
									<a href="tel:{$res.phone_2}" class="text-sm ml-2 text-accent hover:underline transition">{$res.phone_2}</a>
								</div>
								{/if}
								{if $res.phone_3?}
								<div class="flex items-center mb-1">
									<img src="new-site/img/mobile.png" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="">
									<a href="tel:{$res.phone_3}" class="text-sm ml-2 text-accent hover:underline transition">{$res.phone_3}</a>
								</div>
								{/if}
							</div>
							*}

							
						</div>
						<!-- // Контакты + Характеристики -->
					</div>
				</div>
				<!-- // Правая колонка -->
			</div>

			<!-- Список похожих объявлений -->
			{'msProducts' | snippet : [
				'tpl'           => '@FILE tpl_category/partials/evac.php',
				'tplWrapper'    => '@FILE tpl_card/partials/wrapper.php',
				'limit'         => 6,
				'depth'         => 0,
				'parents'       => $res.parent,
				'resources'     => '-' ~ $res.id,
				'includeImages' => true,
				'wrapIfEmpty'   => false,
				'showHidden'    => false,
				'sortby'        => [							
					'vipuntil'  => 'DESC',
			        'id'        => 'DESC',
				]
			]}
			<!-- // Список похожих объявлений -->
		</div>
	</section>
    {'reply-comment-form' | chunk}
	<!-- Попап - стандартный -->
	<div class="popup hidden z-30 fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-dark bg-opacity-70" id="popup">
		<div class="popup__wrapper relative p-4 bg-white rounded shadow-md">
			<button class="button--close rounded absolute bg-dark right-3 top-3 transition transform flex items-center justify-center opacity-70 hover:opacity-100 transition cursor-pointer">
				<svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M24 8L8 24M8 8l16 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</button>
			<div class="popup__inner">
				<!-- Сюда можно вставлять контент -->
			</div>
		</div>
	</div>
	{if $hide['hide_phone'] != 1}
	<!-- Попап - стандартный -->
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
						<img src="{$photo ?: 'new-site/img/profile.svg'}" width="80" height="80" loading="lazy" aria-hidden="true" alt="" />
					</div>
					<div class="flex flex-col items-center">
						<p class="text-xl font-medium">{$user ? strtok($user, '@') : strtok($res.createdby | user : 'email', '@')}</p>
						<span class="text-grayDarken text-base">{'poly_lang_site_user_dolgnost' | lexicon}</span>
					</div>
					<div class="flex flex-col items-center gap-2">
						<p class="text-sm font-bold">{'poly_lang_site_user_contact_tel' | lexicon}</p>
						{if $phone != ''}
						<a href="tel:{$phone | clearPhone}" class="text-accent hover:text-second text-lg transition">{$phone}</a>
						{else}
						<a href="tel:{$res.phone | clearPhone}" class="text-accent hover:text-second text-lg transition">{$res.phone}</a>
						{/if}
						{if $res.phone_2}
						<a href="tel:{$res.phone_2 | clearPhone}" class="text-accent hover:text-second text-lg transition">{$res.phone_2}</a>
						{/if}
						{if $res.phone_3}
						<a href="tel:{$res.phone_3 | clearPhone}" class="text-accent hover:text-second text-lg transition">{$res.phone_3}</a>
						{/if}
						
					</div>
					{if ($hide['telegramm'] || $hide['whatsapp'] || $hide['viber']) && $phone}
					<div class="md:flex-row md:gap-5 flex flex-col items-start">
    					<div class="md:gap-3 flex flex-col w-full gap-2">
        					<div class="flex items-center w-full gap-4">
        					    {if $hide['telegramm']}
        						<a href="tg://resolve?domain={$phone | clearPhone}" class="flex-shrink-0 block">
        							<img src="/new-site/img/social-icons/telegram.svg" width="40" height="40" alt="" />
        						</a>
        						{/if}
        						{if $hide['whatsapp']}
        						<a href="https://wa.me/{$phone | clearPhone}" class="flex-shrink-0 block">
        							<img src="/new-site/img/social-icons/whatsapp.svg" width="40" height="40" alt="" />
        						</a>
        						{/if}
        						{if $hide['viber']}
        						<a href="viber://chat?number={$phone | clearPhone}" class="flex-shrink-0 block">
        							<img src="/new-site/img/social-icons/viber.svg" width="40" height="40" alt="" />
        						</a>
        						{/if}
        					</div>
        				</div>
    				</div>
    				{/if}
					<div class="flex flex-col items-center gap-2">
						<p class="text-grayDarken text-sm text-center">{'poly_lang_site_user_contact_slogan' | lexicon}</p>
						<p class="bg-second bg-opacity-20 p-3 text-xs text-center">{'poly_lang_site_user_contact_attention' | lexicon}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	{/if}
	<!-- Попап - "Пожаловаться" -->
	{'!AjaxForm' | snippet : [
    	'snippet'      => 'FormIt',
    	'form'         => '@FILE tpl_card/partials/form.php',
    	'hooks'        => 'checkSpamTime,email',
    	'emailSubject' => 'Была написана жалоба',
    	'emailTo'      => 'spetsekspress@gmail.com',
    	'emailFrom'    => 'no-reply@evacme.com.ua',
    	'emailTpl'     => 'tpl.email-complaint',
    	'validate'     => 'complain:required,complainText:minLength=^10^',
    ]}
	<!-- // Попап - "Пожаловаться" -->

	<!-- Попап - "Написать сообщение" -->
	
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
    	'validate'     => 'name:required,email:email:required,message1:minLength=^10^',
    ]}
	
	<!-- // Попап - "Написать сообщение" -->
	{'!ecThreadRating' | snippet : [
      'tpl' => 'tpl.ecThreadRating_new'
  ]}
</main>
{/block}
{block 'scriptsPrev'}
<script src="new-site/libs/select2/select2.min.js"></script>
<script src="new-site/libs/fotorama/fotorama.js"></script>

{/block}
{block 'scripts'}
<script>
$('.review .rating').each(function(index, el) {
    let rating = $(el).attr('data-rating') - 1;
    $(el).find('span').each(function(i, element) {
        if(i <= rating) {
            $(element).addClass('rating-star--checked');
        }
    });
})

$(document).on('af_complete', function(event, response) {
    var form = response.form;
    if (form.attr('id') == 'review-form' && response.success) {
    	$('#review-form').addClass('hidden');
  	    $('#review-form').next().removeClass('hidden');
    } else {
    	if(form.attr('id') == 'review-form') {
    		for(var prop in response.data) {
	    		$('#review-form [name="'+prop+'"]').parent().next().removeClass('hidden').find('p').html(response.data[prop])
	    	}
    	}
    }
    
    if (form.attr('id') == 'user-send-form' && response.success) {
    	$('#user-send-form').parent().remove();
  	    $('.user-send-form-success').removeClass('hidden');
    } else {
    	if(form.attr('id') == 'user-send-form') {
    		for(var prop in response.data) {
	    		$('#user-send-form [name="'+prop+'"]').parent().next().removeClass('hidden').find('p').html(response.data[prop])
	    	}
    	}
    }

    if (form.attr('id') == 'complaint-form' && response.success) {
    	$('#complaint-form').parent().remove();
  	    $('.complaint-form-success').removeClass('hidden');
    } else {
    	if(form.attr('id') == 'complaint-form') {
    		for(var prop in response.data) {
	    		$('#complaint-form [name="'+prop+'"]').parent().next().removeClass('hidden').find('p').html(response.data[prop])
	    	}
    	}
    }
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
{/block}