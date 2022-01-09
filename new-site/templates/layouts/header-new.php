<header class="header bg-gradient md:py-5 relative z-10 py-3" id="header">
	<div class="bt:block custom-container hidden">
		<div class="flex items-center justify-between gap-4">
			{if $res.id === 1}
			    <span class="flex-shrink-0">
					<img src="new-site/img/logo.png" width="144" height="30" alt="Evacme" />
				</span>
		    {else}
			    <a href="{$opt.site_url}">
					<img src="new-site/img/logo.png" width="144" height="30" alt="Evacme" />
				</a>
		    {/if}	

			<nav class="bt:gap-8 flex items-center gap-2">
				<div class="relative">
					<button class="js-showMenu openMenuBtn hover:opacity-70 bt:text-lg bt:px-5 flex items-center gap-2 px-2 text-white transition">
						<span class="z-20 pointer-events-none">{'polylang_services' | lexicon}</span>
						<svg xmlns="http://www.w3.org/2000/svg" class="z-20 flex-shrink-0 pointer-events-none" width="14" height="9" fill="none" viewBox="0 0 16 10">
							<defs />
							<rect width=".844" height="11.144" x="-.128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(.90539 1.0864) rotate(-45 2.078 -.63)" />
							<rect width=".844" height="11.146" x=".128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(-.9045 1.08714) rotate(-45 -6.639 21.03)" />
						</svg>
					</button>
					<div style="display: none" class="js-headerMenu custom-shadow top-[60px] w-max absolute left-0 right-0 z-10 px-5 py-9 bg-white rounded-sm">
						<div class="pr-4 gap-4 bt:gap-7 custom-scroll grid grid-cols-3 bt:grid-cols-4 overflow-y-auto max-h-[300px]">
							{'pdoResources' | snippet : [
								'parents' => 0,
							    'resources' => '2',
							    'sortby'    => 'menuindex',
							    'sortdir'   => 'ASC',
							    'tpl'       => '@INLINE <a href="{$id | url}" class="nav-menu-link">{$pagetitle}</a>',
							    'limit'     => 0,
							]}
						</div>
					</div>
				</div>
				<div class="relative">
					<button class="js-showMenu openMenuBtn hover:opacity-70 bt:text-lg bt:px-5 flex items-center gap-2 px-2 text-white transition">
						<span class="z-20 pointer-events-none">
							{'poly_lang_regions' | lexicon}
						</span>
						<svg xmlns="http://www.w3.org/2000/svg" class="z-20 flex-shrink-0 pointer-events-none" width="14" height="9" fill="none" viewBox="0 0 16 10">
							<defs />
							<rect width=".844" height="11.144" x="-.128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(.90539 1.0864) rotate(-45 2.078 -.63)" />
							<rect width=".844" height="11.146" x=".128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(-.9045 1.08714) rotate(-45 -6.639 21.03)" />
						</svg>
					</button>
					<div style="display: none;left: -400px;" class="js-headerMenu custom-shadow top-[60px] w-max absolute right-0 z-20 px-5 py-9 bg-white rounded-sm">
						<div class="pr-4 gap-4 bt:gap-7 custom-scroll grid grid-cols-4 overflow-y-auto max-h-[300px]">
							{foreach ($cities | fromJSON) as $city}
								<a href="{$city.id | url}" class="nav-menu-link">
									{$city.pagetitle}
								</a>
							{/foreach}
						</div>
					</div>
				</div>
				<a href="{105 | url}" class="hover:opacity-70 bt:text-lg text-white transition">
					{'!pdoField' | snippet : ['id' => 105]}
				</a>
			</nav>

			<div class="bt:gap-3 flex items-center gap-2">
				<div class="relative">
					
					{'PolylangLinks' | snippet : [
						'tpl' 		  => 'lang_desktop_active',
						'mode' 	      => 'list',
						'showActive'  => 1,
						'activeClass' => 'active-link'
					]}
					<div style="display: none" class="js-headerMenu custom-shadow top-[60px] w-full absolute left-0 right-0 z-10 px-2 bt:px-5 py-2 bg-white rounded-sm">
						<div class="flex flex-col gap-2 bt:gap-4 max-h-[300px]">
							{'PolylangLinks' | snippet : [
								'tpl' 		  => 'lang_desktop',
								'mode' 	      => 'list',
								'showActive'  => 1,
								'activeClass' => 'active-link'
							]}
						</div>
					</div>
				</div>
				<a href="{if $_modx->user.id > 0} {3792 | url} {else} {3781 | url} {/if}" class="hover:opacity-70 flex items-center justify-center w-12 h-12 transition">
					<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="none" viewBox="0 0 48 48">
						<defs />
						<path
							fill="#fff"
							d="M32.485 27.515a11.954 11.954 0 00-4.56-2.86 6.935 6.935 0 003.012-5.718A6.945 6.945 0 0024 12a6.945 6.945 0 00-6.938 6.938 6.935 6.935 0 003.013 5.716 11.954 11.954 0 00-4.56 2.86A11.921 11.921 0 0012 36h1.875c0-5.583 4.542-10.125 10.125-10.125S34.125 30.417 34.125 36H36c0-3.205-1.248-6.219-3.515-8.485zM24 24a5.068 5.068 0 01-5.063-5.063A5.068 5.068 0 0124 13.875a5.068 5.068 0 015.063 5.063A5.068 5.068 0 0124 24z"
						/>
					</svg>
				</a>
			</div>
		</div>
	</div>

	<div class="bt:hidden custom-container z-10 block">
		<div class="flex items-center justify-between gap-4">
			{if $res.id === 1}
			<span class="w-[127px]">
				<img src="new-site/new-main/img/new-main-page/logo.png" width="127" height="37" alt="Evacme" />
			</span>
			{else}
			<a href="{1 | url}" class="w-[127px]">
				<img src="new-site/new-main/img/new-main-page/logo.png" width="127" height="37" alt="Evacme" />
			</a>
			{/if}

			<button class="js-openMobileMenu flex items-center justify-center">
				<svg width="25" height="16" fill="none" class="text-white pointer-events-none" xmlns="http://www.w3.org/2000/svg">
					<rect width="25" height="2" rx="1" fill="currentColor" />
					<rect y="7" width="25" height="2" rx="1" fill="currentColor" />
					<rect y="14" width="25" height="2" rx="1" fill="currentColor" />
				</svg>
			</button>
		</div>
	</div>

</header>

<div style="display: none" class="js-mobileNav fixed inset-0 z-20 w-full h-full bg-white">
	<div class="custom-container relative flex flex-col pt-2">
		<div class="border-[#c0c0c0] flex items-end justify-between gap-4 pb-4 border-b">
			<img src="new-site/new-main/img/new-main-page/logo--dark.svg" width="127" height="41" loading="lazy" alt="" />
			<button class="js-closeMobileMenu flex items-center justify-center text-black">
				<svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect x="18" y=".414" width="2" height="25" rx="1" transform="rotate(45 18 .414)" fill="currentColor" />
					<rect y="1.414" width="2" height="25" rx="1" transform="rotate(-45 0 1.414)" fill="currentColor" />
				</svg>
			</button>
		</div>
		<div class="js-menuLevelFirst flex flex-col">
			<div class="gap-9 flex flex-col py-12">
				<button class="js-openMenuSecond flex items-center justify-between gap-4 text-lg text-black">
					<span class="pointer-events-none">{'poly_lang_regions' | lexicon}</span>
					<svg xmlns="http://www.w3.org/2000/svg" class="z-10 flex-shrink-0 -rotate-90 pointer-events-none" width="15" height="9" fill="none" viewBox="0 0 16 10">
						<defs />
						<rect width=".844" height="11.144" x="-.128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(.90539 1.0864) rotate(-45 2.078 -.63)" />
						<rect width=".844" height="11.146" x=".128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(-.9045 1.08714) rotate(-45 -6.639 21.03)" />
					</svg>
				</button>
				<button class="js-openMenuSecond2 flex items-center justify-between gap-4 text-lg text-black">
					<span class="pointer-events-none">{'polylang_services' | lexicon}</span>
					<svg xmlns="http://www.w3.org/2000/svg" class="z-10 flex-shrink-0 -rotate-90 pointer-events-none" width="15" height="9" fill="none" viewBox="0 0 16 10">
						<defs />
						<rect width=".844" height="11.144" x="-.128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(.90539 1.0864) rotate(-45 2.078 -.63)" />
						<rect width=".844" height="11.146" x=".128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(-.9045 1.08714) rotate(-45 -6.639 21.03)" />
					</svg>
				</button>
				<a href="{105 | url}" class="text-lg text-black">{'!pdoField' | snippet : ['id' => 105]}</a>
			</div>
			<div class="bg-[#eaf3ff] px-5 -mx-5 flex flex-col gap-3 py-5">
				<a href="{if $_modx->user.id > 0} {84 | url} {else} {3781 | url} {/if}" class="flex items-center justify-between">
					<span class="text-lg text-black">{'poly_lang_site_header_lk' | lexicon}</span>
					<img src="new-site/new-main/img/new-main-page/lk-mob.svg" width="22" height="22" loading="lazy" alt="" />
				</a>
				<div class="flex items-center justify-between gap-4">
					<p class="text-lg text-black">{'polylang_lang' | lexicon}</p>
					<div class="flex items-center gap-8">
						{'PolylangLinks' | snippet : [
							'tpl' 		  => 'lang_mob',
							'mode' 	      => 'list',
							'showActive'  => 1,
							'activeClass' => 'active-link'
						]}
					</div>
				</div>
			</div>
		</div>
		<div style="display: none" class="js-menuLevelSecond2 flex flex-col py-10">
			<div class="relative flex items-center pb-10">
				<button class="js-hideMenuLevelSecond2 z-10 flex items-center justify-between gap-4 text-lg text-black">
					<svg xmlns="http://www.w3.org/2000/svg" class="z-10 flex-shrink-0 rotate-90 pointer-events-none" width="15" height="9" fill="none" viewBox="0 0 16 10">
						<defs />
						<rect width=".844" height="11.144" x="-.128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(.90539 1.0864) rotate(-45 2.078 -.63)" />
						<rect width=".844" height="11.146" x=".128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(-.9045 1.08714) rotate(-45 -6.639 21.03)" />
					</svg>
				</button>
				<p class="block w-full -ml-4 text-lg font-medium text-center text-black">{'polylang_services' | lexicon}</p>
				<div class="bg-[#EB8C31] h-px w-[102px] absolute bottom-6 left-1/2 -translate-x-1/2"></div>
			</div>
			<div style="height: calc(100vh - 195px)" class="gap-x-4 gap-y-7 grid grid-cols-2 pb-8 overflow-y-scroll">
				{'pdoResources' | snippet : [
					'parents' => 0,
				    'resources' => '2',
				    'sortby'    => 'menuindex',
				    'sortdir'   => 'ASC',
				    'tpl'       => '@INLINE <a href="{$id | url}" class="ext-sm text-black">{$pagetitle}</a>',
				    'limit'     => 0,
				]}
			</div>
		</div>
		<div style="display: none" class="js-menuLevelSecond flex flex-col py-10">
			<div class="relative flex items-center pb-10">
				<button class="js-hideMenuLevelSecond z-10 flex items-center justify-between gap-4 text-lg text-black">
					<svg xmlns="http://www.w3.org/2000/svg" class="z-10 flex-shrink-0 rotate-90 pointer-events-none" width="15" height="9" fill="none" viewBox="0 0 16 10">
						<defs />
						<rect width=".844" height="11.144" x="-.128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(.90539 1.0864) rotate(-45 2.078 -.63)" />
						<rect width=".844" height="11.146" x=".128" fill="currentColor" stroke="currentColor" stroke-width=".2" rx=".422" transform="scale(-.9045 1.08714) rotate(-45 -6.639 21.03)" />
					</svg>
				</button>
				<p class="block w-full -ml-4 text-lg font-medium text-center text-black">{'poly_lang_regions' | lexicon}</p>
				<div class="bg-[#EB8C31] h-px w-[102px] absolute bottom-6 left-1/2 -translate-x-1/2"></div>
			</div>
			<div style="height: calc(100vh - 195px)" class="gap-x-4 gap-y-7 grid grid-cols-2 pb-8 overflow-y-scroll">
				{foreach ($cities | fromJSON) as $city}
					<a href="{$city.id | url}" class="ext-sm text-black">
						{$city.pagetitle}
					</a>
				{/foreach}
			</div>
		</div>
	</div>
</div>
<script>
	document.addEventListener("DOMContentLoaded", () => {
		if ($(window).width() < 1170) {
			$(".js-openMobileMenu").click(() => {
				$("body").css("overflow-y", "hidden");
				$(".js-mobileNav").show();
			});
			$(".js-closeMobileMenu").click(() => {
				$("body").css("overflow-y", "");
				$(".js-mobileNav").hide();
			});

			$(".js-openMenuSecond").click(() => {
				$(".js-menuLevelFirst").hide();
				$(".js-menuLevelSecond").show();
			});
			$(".js-openMenuSecond2").click(() => {
				$(".js-menuLevelFirst").hide();
				$(".js-menuLevelSecond2").show();
			});

			$(".js-hideMenuLevelSecond").click(() => {
				$(".js-menuLevelFirst").show();
				$(".js-menuLevelSecond").hide();
			});
			
			$(".js-hideMenuLevelSecond2").click(() => {
				$(".js-menuLevelFirst").show();
				$(".js-menuLevelSecond2").hide();
			});
		}
		if ($(window).width() >= 768) {
			let dropdownButton = $(".js-showMenu");
			let dropdown = dropdownButton.next(".js-headerMenu");
			let dropdownButtonArrow = dropdownButton.find("svg");

			$(document).click(function (e) {
				if (dropdownButton.is(e.target)) {
					let that = e.target;
					$(that).next(".js-headerMenu").slideToggle();
					$(that).find("svg").toggleClass("rotate-180");
					$(that).toggleClass("openMenuBtn--clicked");
				} else if (!dropdown.is(e.target) && dropdown.has(e.target).length === 0) {
					dropdown.slideUp();
					dropdownButtonArrow.removeClass("rotate-180");
					dropdownButton.removeClass("openMenuBtn--clicked");
				}
			});
		}
	})
</script>