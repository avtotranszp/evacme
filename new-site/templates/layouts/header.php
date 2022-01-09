<!-- Header -->
<header class="header pt-4 pb-4 bg-accent z-10" id="header">
	<!-- Верхний ряд -->
	<div class="flex items-center justify-between container mx-auto px-4 mb-4">
		<!-- Кнопка меню - мобайл -->
		<button class="p-2 w-12 flex md:hidden items-center justify-center hover:bg-accentDarken transition border rounded text-white focus:outline-none" id="mobile-nav-397-open">
			<img src="new-site/img/burger.svg" class="" width="20" height="20" aria-hidden="true" alt="" />
		</button>
		<!-- // Кнопка меню - мобайл -->

		<!-- Меню - мобайл -->
		<div class="flex hidden flex-col z-30 fixed bg-white top-0 right-0 w-full h-full md:hidden" id="mobile-nav-397">
			<!-- Шапка мобильного меню -->
			<div class="flex justify-between items-center bg-accent p-4">
			    {if $res.id === 1}
			    <span class="flex-shrink-0">
					<img src="new-site/img/logo.png" width="144" height="35" loading="lazy" alt="Логотип" />
				</span>
			    {else}
			    <a href="{$opt.site_url}" class="flex-shrink-0">
					<img src="new-site/img/logo.png" width="144" height="35" loading="lazy" alt="Логотип" />
				</a>
			    {/if}
				
				<button class="w-12 h-12 border border-white rounded text-white focus:outline-none text-3xl" id="mobile-nav-397-close">×</button>
			</div>
			<!-- // Шапка мобильного меню -->

			<button class="flex focus:outline-none w-full justify-between items-center p-4 border-b border-gray" id="allSectionButton">
				<span>{'poly_lang_site_header_evac' | lexicon}</span>
				<img src="new-site/img/arrow.svg" width="10" height="10" aria-hidden="true" alt="" />
			</button>

			<a href="{105 | url}" class="p-4 border-b border-gray block">Обратная связь</a>
			<a href="{87 | url}" class="mx-4 mt-6 text-center rounded p-4 bg-second text-white block">Добавить эвакуатор</a>
			

			<!-- Выбор языка -->
			<div class="flex justify-center mt-8 items-center w-full">
				{'PolylangLinks' | snippet : [
					'tpl' 		  => '@FILE chunk/lang_mob.php',
					'mode' 	      => 'list',
					'showActive'  => 1,
					'activeClass' => 'active-link'
				]}
			</div>
			<!-- // Выбор языка -->
		</div>
		<!-- // Меню - мобайл -->

		{include 'file:chunk/menu-mobile.php'}

		<div class="flex items-center">
			<!-- Логотип -->
			{if $res.id === 1}
			<span class="flex-shrink-0 order-2 md:order-first">
				<img src="new-site/img/logo.png" width="144" height="35" alt="Логотип" />
			</span>
			{else}
			<a href="{$opt.site_url}" class="flex-shrink-0 order-2 md:order-first">
				<img src="new-site/img/logo.png" width="144" height="35" alt="Логотип" />
			</a>
			{/if}
			<!-- // Логотип -->

			<!-- Главная навигация -->
			{*
			<nav class="hidden md:flex items-center ml-4 relative">
				<a href="#!" class="active-link text-white hover:text-second transition mr-2 whitespace-nowrap">Объявления</a>

				<button class="dropdown-button group flex items-center justify-center h-full bg-white p-2 rounded hover:text-second transition focus:outline-none lg:hidden" data-target="nav-mobile">
					<span class="triangle group-hover:border-secondTriangle transition"></span>
				</button>

				<!-- Главная навигация прячется на планшете кроме 1й ссылки -->
				<div class="hidden lg:block absolute lg:relative bg-white lg:bg-transparent right-0 top-8 lg:top-0 z-10 lg:z-0 p-4 lg:p-0 rounded lg:rounded-none shadow-2xl lg:shadow-none" id="nav-mobile">
					<div class="flex flex-col lg:flex-row">
						<a href="#!" class="mb-2 lg:mb-0 lg:text-white hover:text-second transition mr-2 whitespace-nowrap">Работа</a>
						<a href="#!" class="mb-2 lg:mb-0 lg:text-white hover:text-second transition mr-2 whitespace-nowrap">Продать / купить эвакуатор</a>
						<a href="#!" class="mb-2 lg:mb-0 lg:text-white hover:text-second transition mr-2 whitespace-nowrap">Обратная связь</a>
					</div>
				</div>
				<!-- Главная навигация прячется на планшете кроме 1й ссылки -->
			</nav>
				*}
			<!-- Главная навигация -->
		</div>

		<!-- Язык + войти -->
		<div class="flex items-center">
			{'PolylangLinks' | snippet : [
				'tpl' 		  => '@FILE chunk/lang.php',
				'mode' 	      => 'list',
				'showActive'  => 1,
				'activeClass' => 'active-link'
			]}
			{if $_modx->user.id > 0}
			<a href="{3792 | url}" class="text-white px-2 md:px-0 hover:text-second transition" aria-label="Кабинет">
				<span class="hidden md:block">{'poly_lang_site_header_lk' | lexicon}</span>
				<img src="new-site/img/login.png" class="block md:hidden" width="20" height="20" aria-hidden="true" alt="" />
			</a>
			{else}
			<a href="{3781 | url}" class="text-white px-2 md:px-0 hover:text-second transition" aria-label="Войти">
				<span class="hidden md:block">{'poly_lang_site_header_login' | lexicon}</span>
				<img src="new-site/img/login.png" class="block md:hidden" width="20" height="20" aria-hidden="true" alt="" />
			</a>
			{/if}
		</div>
		<!-- Язык + войти -->
	</div>

	<div class="flex items-center justify-between container mx-auto px-4 relative">
		<div class="flex items-center justify-between flex-shrink-0 relative">
			<button class="dropdown-button p-2 hidden md:flex cursor-pointer items-center hover:bg-accentDarken transition border rounded text-white focus:outline-none" data-target="menu">
				<img src="new-site/img/burger.svg" class="mr-2" width="20" height="20" aria-hidden="true" alt="" />
				{'poly_lang_site_header_all' | lexicon}
			</button>
		</div>

		{include 'file:chunk/menu-desktop.php'}

		
		<div class="flex w-full items-center justify-between md:ml-4 relative">
			<!-- Поиск города - дропдаун -->
			{*
			<div class="hidden flex flex-col top-11 absolute rounded bg-white w-full p-4 shadow-2xl" id="header-dropdown">
				<p class="mb-2">Укажите населённый пункт</p>
				<label class="block mb-2 border-1 border-gray-200 border-opacity-100">
					<input type="text" id="search-second" class="p-2 w-full outline-none border border-gray rounded" placeholder="Ищу в Харькове" />
				</label>
				<div class="flex mb-4">
					<p class="mr-1 text-gray text-sm">Последние города:</p>
					<a href="#!" class="text-accent underline text-sm hover:text-second transition mr-1">Киев</a>
					<a href="#!" class="text-accent underline text-sm hover:text-second transition mr-1">Львов</a>
					<a href="#!" class="text-accent underline text-sm hover:text-second transition mr-1">Харьков</a>
				</div>
				<p class="mb-3">Выберите свой город</p>
				<div class="flex flex-wrap">
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Украина</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Киев</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Винница</a>
					<span class="current text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Харьков</span>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Днепр</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Чернигов</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Полтава</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Одеса</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Украина</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Киев</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Винница</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Днепр</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Чернигов</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Полтава</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Одеса</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Украина</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Киев</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Винница</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Днепр</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Чернигов</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Полтава</a>
					<a href="#!" class="text-accent w-2/4 md:w-1/3 lg:w-1/4 hover:text-second transition mb-2">Одеса</a>
				</div>
			</div>
			<!-- // Поиск города - дропдаун -->

			<!-- Поиск города -->
			<button class="dropdown-button group flex items-center h-full w-14 md:w-1/4 bg-accentDarken md:bg-white p-2 rounded hover:text-second transition focus:outline-none" data-target="header-dropdown">
				<span class="hidden md:block">Харьков</span>
				<span class="hidden md:block triangle md:ml-1.5 group-hover:border-secondTriangle transition"></span>
				<img src="new-site/img/location.svg" class="px-2 flex-shrink-0 md:hidden" width="42" height="21" aria-hidden="true" alt="" />
			</button>
			<!-- Поиск города -->
*}
				{'!mSearchForm' | snippet : [
                    'element' => 'msProducts',
                    'limit' => 5,
                ]}
		</div>


		<a href="{87 | url}" class="hidden lg:flex rounded p-2 bg-second hover:bg-secondDarken transition flex-shrink-0 ml-4 text-white">{'poly_lang_site_header_add_evac' | lexicon}</a>
	</div>
	<!-- // Нижний ряд -->
</header>
<!-- // Header -->
