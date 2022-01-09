{extends 'file:layouts/main-new.php'}

{block 'content'}
<main class="relative flex-grow flex-shrink-0">
	<section class="bg-[#fa8b21]">
		<div class="promo-section custom-container bt:pt-28 bt:pb-[104px] pt-[85px] pb-12">
		    {'!mSearchForm' | snippet : [
                'element' => 'msProducts',
                'limit'   => 5,
                'pageId'  => 3998,
                'tplForm' => 'tpl.mSearch2.form.main',
            ]}
		</div>

		<script>
			document.addEventListener("DOMContentLoaded", () => {
				let firstScreenSelectFirst = $("#choseService");
				let firstScreenSelectSecond = $("#choseRegion");

				function initSelectOnFirstScreen(select) {
					$(select).select2({
						multiple: false,
						dropdownParent: $(select).parent(),
						width: "100%",
					});
				}

				initSelectOnFirstScreen(firstScreenSelectFirst);
				initSelectOnFirstScreen(firstScreenSelectSecond);
			})
		</script>
	</section>

	<section class="bg-[#1f2d33] py-12 bt:py-9">
		<div class="custom-container">
			<div class="gap-7 bt:gap-26 bt:flex-row flex flex-col items-start justify-between">
				<div class="bt:w-auto flex flex-col w-full gap-2">
					<div class="bt:w-auto md:gap-4 flex items-center justify-between w-full gap-2">
						<p class="md:text-base text-sm text-white opacity-50">
							{'polylang_new_company_count' | lexicon}
						</p>
						{set $company = ('getCountCompany' | snippet)}
						<span class="bt:mr-10 md:text-base text-sm font-bold text-white">
							{$company | declension : ('polylang_company_plural' | lexicon) : true}
						</span>
					</div>
					<div class="h-1.5 w-full bt:w-[490px] bg-white relative">
						<div style="width: {$company * 10}%" class="bg-gradient absolute h-full"></div>
					</div>
					<div class="flex items-center justify-between gap-4">
						<p class="text-white opacity-50">
							0
						</p>
						<p class="text-white opacity-50">
							10
						</p>
					</div>
				</div>
				<div class="flex justify-between bt:flex-col order-first bt:order-none flex-row gap-2.5 w-full bt:w-[200px]">
					<div class="flex items-center justify-between gap-2.5 bt:gap-4">
						{*
						<p class="opacity-40 text-white">
							Проектов <span class="sm:inline hidden">всего</span>:
						</p>
						<span class="font-bold text-white">
							200
						</span>
						*}
					</div>
					<div class="flex items-center justify-between gap-2.5 bt:gap-4">
						{*<p class="opacity-40 text-white">
							Успешно <span class="sm:inline hidden">сдали</span>:
						</p>
						<span class="font-bold text-white">190</span>*}
					</div>
				</div>
				<a href="{3920 | url}" class="btn-ring relative flex items-center self-center justify-center">
					<span style="z-index:3" class="py-2.5 px-9 flex items-center justify-center text-lg font-bold text-white rounded-md">
						{'polylang_add_company' | lexicon}
					</span>
				</a>
			</div>
		</div>
	</section>

	<section class="custom-container bt:py-24 py-10">
		<div class="bt:flex bt:flex-wrap bt:gap-5 bt:align-center grid grid-cols-2 gap-4">

			<a onclick="return false;" style="filter:grayscale(1);" href="#!" class="rounded-[7px] bt:w-[214px] motion-safe:hover:scale-105 transition overflow-hidden relative block">
				<img src="new-site/new-main/img/new-main-page/content/services-1.jpg" class="object-cover object-center w-full h-full" width="214" height="251" alt="" />
				<div class="absolute bottom-0 left-0 w-full z-10 flex items-center justify-center py-2.5 bg-[#fa8b21]">
					<span class="bt:text-lg text-sm text-white">
						Грузоперевозки
					</span>
				</div>
			</a>
			<a onclick="return false;" style="filter:grayscale(1);" href="#!" class="rounded-[7px] bt:w-[340px] motion-safe:hover:scale-105 transition overflow-hidden relative block">
				<img src="new-site/new-main/img/new-main-page/content/services-2.jpg" class="object-cover object-center w-full h-full" width="360" height="251" alt="" />
				<div class="absolute bottom-0 left-0 w-full z-10 flex items-center justify-center py-2.5 bg-[#fa8b21]">
					<span class="bt:text-lg text-sm text-white">
						Тралы
					</span>
				</div>
			</a>
			<a onclick="return false;" style="filter:grayscale(1);" href="#!" class="rounded-[7px] bt:w-[276px] motion-safe:hover:scale-105 transition overflow-hidden relative block">
				<img src="new-site/new-main/img/new-main-page/content/services-3.jpg" class="object-cover object-center w-full h-full" width="286" height="251" alt="" />
				<div class="absolute bottom-0 left-0 w-full z-10 flex items-center justify-center py-2.5 bg-[#fa8b21]">
					<span class="bt:text-lg text-sm text-white">
						Спецтехника
					</span>
				</div>
			</a>
			<a onclick="return false;" style="filter:grayscale(1);" href="#!" class="rounded-[7px] bt:w-[216px] motion-safe:hover:scale-105 transition overflow-hidden relative block">
				<img src="new-site/new-main/img/new-main-page/content/services-4.jpg" class="object-cover object-center w-full h-full" width="216" height="251" alt="" />
				<div class="absolute bottom-0 left-0 w-full z-10 flex items-center justify-center py-2.5 bg-[#fa8b21]">
					<span class="bt:text-lg text-sm text-white">
						СТО
					</span>
				</div>
			</a>
			<a onclick="return false;" style="filter:grayscale(1);" href="#!" class="col-span-2 rounded-[7px] bt:w-[430px] motion-safe:hover:scale-105 transition overflow-hidden relative block">
				<img src="new-site/new-main/img/new-main-page/content/services-5.jpg" class="object-cover object-center w-full h-full" width="430" height="251" alt="" />
				<div class="absolute bottom-0 left-0 w-full z-10 flex items-center justify-center py-2.5 bg-[#fa8b21]">
					<span class="bt:text-lg text-sm text-white">
						Такси
					</span>
				</div>
			</a>
			<a onclick="return false;" style="filter:grayscale(1);" href="#!" class="rounded-[7px] bt:w-[220px] motion-safe:hover:scale-105 transition overflow-hidden relative block">
				<img src="new-site/new-main/img/new-main-page/content/services-6.jpg" class="object-cover object-center w-full h-full" width="220" height="251" alt="" />
				<div class="absolute bottom-0 left-0 w-full z-10 flex items-center justify-center py-2.5 bg-[#fa8b21]">
					<span class="bt:text-lg text-sm text-white">
						Пассажирские
					</span>
				</div>
			</a>
			{'pdoResources' | snippet : [
				'parents' => 0,
			    'resources' => '2',
			    'sortby'    => 'menuindex',
			    'sortdir'   => 'ASC',
			    'tpl'       => 'category-item-main',
			    'limit'     => 1,
			    'includeTVs' => 'img',
			    'tvPrefix' => ''
			]}
		</div>
	</section>

	<section class="py-10 bt:pt-20 bt:pb-8 bg-[#dfebf0de]">
		<div class="custom-container">
			<div class="bt:flex-row bt:items-start bt:gap-10 flex flex-col items-center gap-2 text-2xl text-black">
				<div class="relative flex flex-col items-center">
					<h2 class="font-m font-bold text-lg bt:text-2xl uppercase mb-8 bt:mb-[72px]"><span class="uppercase text-[#EB8C31]">
						{'polylang_evacme_super' | lexicon}</span> «Еvаcмe»
					</h2>

					<div style="width: 320px" class="bt:hidden absolute top-1.5 block">
						<img src="new-site/new-main/img/new-main-page/benefit-bg-mob.svg" class="object-cover w-full h-full" width="304" height="125" loading="lazy" alt="" />
					</div>

					<div class="testemonials-wrapper gap-1.5 bt:gap-11 flex items-center mb-10 bt:mb-16">
						<button data-target="#years" class="testemonials-btn testemonials-btn--active z-10 flex flex-col gap-1.5 items-center">
							<span class="testemonial-btn__inner relative flex flex-col items-center justify-center bt:w-[87px] w-[66px] h-[66px] bt:h-[87px] bg-white rounded-md">
								<span class="bt:text-2xl text-xs font-medium text-black">
									{('' | date_format : '%Y') - 2013}
								</span>
								<span class="bt:hidden text-sm font-light text-black">
									{'polylang_year' | lexicon}
								</span>
							</span>
							<span class="bt:block hidden text-lg font-medium text-white">
								{'polylang_year' | lexicon}
							</span>
						</button>
						<button data-target="#hours" class="testemonials-btn z-10 flex flex-col gap-1.5 items-center">
							<span class="testemonial-btn__inner relative flex flex-col items-center justify-center bt:w-[87px] w-[66px] h-[66px] bt:h-[87px] bg-white rounded-md">
								<span class="bt:text-2xl text-xs font-medium text-black">
									24/7
								</span>
								<span class="bt:hidden text-sm font-light text-black">
									{'polylang_hours' | lexicon}
								</span>
							</span>
							<span class="bt:block hidden text-lg font-medium text-white">
								{'polylang_hours' | lexicon}
							</span>
						</button>
						<button data-target="#clients" class="testemonials-btn z-10 flex flex-col gap-1.5 items-center">
							<span class="testemonial-btn__inner relative flex flex-col items-center justify-center bt:w-[87px] w-[66px] h-[66px] bt:h-[87px] bg-white rounded-md">
								<span class="bt:text-2xl text-xs font-medium text-black">
									{'getCountUser' | snippet | number : 0 : '.' : ' '}
								</span>
								<span class="bt:hidden text-sm font-light text-black">
									{'polylang_users' | lexicon}
								</span>
							</span>
							<span class="bt:block hidden text-lg font-medium text-white">
								{'polylang_users' | lexicon}
							</span>
						</button>
						<button data-target="#companies" class="testemonials-btn z-10 flex flex-col gap-1.5 items-center">
							<span class="testemonial-btn__inner relative flex flex-col items-center justify-center bt:w-[87px] w-[66px] h-[66px] bt:h-[87px] bg-white rounded-md">
								<span class="bt:text-2xl text-xs font-medium text-black">
									{$company}
								</span>
								<span class="bt:hidden text-sm font-light text-black">
									{$company | declension : ('polylang_company_plural' | lexicon)}
								</span>
							</span>
							<span class="bt:block hidden text-lg font-medium text-white">
								{$company | declension : ('polylang_company_plural' | lexicon)}
							</span>
						</button>
					</div>

					<div class="flex flex-col max-w-[500px] bt:max-w-[617px] h-full">
						<div class="testemonials-content" id="years">
							<p>
								{'polylang_title_service_ev4' | lexicon}
							</p>
						</div>
						<div class="testemonials-content" style="display: none" id="hours">
							<p>
								{'polylang_title_service_ev4' | lexicon}
							</p>
						</div>
						<div class="testemonials-content" style="display: none" id="clients">
							<p>
							    {'polylang_title_service_ev4' | lexicon}
							</p>
						</div>
						<div class="testemonials-content" style="display: none" id="companies">
							<p>
								{'polylang_title_service_ev4' | lexicon}
							</p>
						</div>
					</div>
				</div>
				<div class="testemonials-img-wrapper relative">
					<img src="new-site/new-main/img/new-main-page/benefit.svg" width="562" height="410" loading="lazy" aria-hidden="true" alt="" />
				</div>
			</div>
		</div>
		<script>
			document.addEventListener("DOMContentLoaded", () => {
				let tabBtn = $(".testemonials-btn");
				let tabText = $(".testemonials-content");

				tabBtn.click(function (e) {
					e.preventDefault();
					let that = $(this);
					let tabBtnTarget = that.data("target");

					tabBtn.removeClass("testemonials-btn--active");
					that.addClass("testemonials-btn--active");

					tabText.hide();
					$(tabBtnTarget).show();
				});
			})
		</script>
	</section>

	<section class="promotion-section pb-14 bt:p-0">
		<div class="custom-container">
			<div class="promotion-title-wrap bt:justify-end bt:mb-10 mb-14 relative z-10 flex justify-center">
				<div class="flex flex-col gap-3 bt:gap-2.5 z-10">
					<h2 class="px-4 border-white border-b font-m text-lg bt:text-2xl font-bold text-center uppercase text-[#F78F2B] pb-2.5">
						{'polylang_prodv' | lexicon} <span class="text-white">«Еvаcмe»</span>
					</h2>
					<p class="bt:text-lg bt:text-left text-base font-medium text-center text-white">
						{'polylang_title_service_ev3' | lexicon}
					</p>
				</div>
			</div>
			<div class="bt:justify-between relative z-10 flex justify-center pt-8">
				<div class="flex flex-col bt:items-start items-center max-w-[440px] gap-7 bt:gap-[70px]">
					<p class="bt:text-left bt:text-lg text-center text-black">
                        {'polylang_title_service_ev' | lexicon}
					</p>

					<img src="new-site/new-main/img/new-main-page/promotion-mob.svg" class="w-full max-w-[400px] bt:hidden" alt="" />

					<a href="{84 | url}" class="btn-ring w-max btn-ring--white relative flex items-center justify-center">
						<span class="z-10 py-2.5 px-2 bt:px-9 flex items-center justify-center text-base bt:text-lg font-bold text-white rounded-md">
							{'polylang_reclam_text' | lexicon}
						</span>
					</a>
				</div>

				<div class="bt:block promotion-wrapper hidden">
					<img src="new-site/new-main/img/new-main-page/promotion.svg" loading="lazy" width="900" height="500" alt="" />
				</div>
			</div>
		</div>
	</section>

	<section class="safety-section bt:py-32 py-10">

		<div class="custom-container safety-section__wrapper">
			<div class="flex flex-col">
				<h2 class="mb-7 bt:mb-12 font-m text-lg bt:text-2xl font-bold text-center text-black uppercase"><span class="text-[#EB8C31]">
					«Еvаcмe»</span> {'polylang_save_service' | lexicon}
				</h2>

				<div class="safety-carousel owl-carousel mb-9 bt:mb-10">
					<div class="safety-item">
						<img src="new-site/new-main/img/new-main-page/benefits-icon-1.svg" class="safety-item__img" width="81" height="81" loading="lazy" alt="" />
						<span class="safety-item__text">
							{'polylang_adv1' | lexicon}
						</span>
					</div>
					<div class="safety-item">
						<img src="new-site/new-main/img/new-main-page/benefits-icon-2.svg" class="safety-item__img" width="81" height="81" loading="lazy" alt="" />
						<span class="safety-item__text">
							{'polylang_adv2' | lexicon}
						</span>
					</div>
					<div class="safety-item">
						<img src="new-site/new-main//img/new-main-page/benefits-icon-4.svg" class="safety-item__img" width="81" height="81" loading="lazy" alt="" />
						<span class="safety-item__text">
							{'polylang_adv3' | lexicon}
						</span>
					</div>
					<div class="safety-item">
						<img src="new-site/new-main//img/new-main-page/benefits-icon-5.svg" class="safety-item__img" width="81" height="81" loading="lazy" alt="" />
						<span class="safety-item__text">
							{'polylang_adv4' | lexicon}
						</span>
					</div>
				</div>

				<div class="bt:text-base flex flex-col gap-4 text-sm">
					<p>
						{'polylang_title_service_ev2' | lexicon}
					</p>
				</div>
			</div>
		</div>

		<script>
			document.addEventListener("DOMContentLoaded", () => {
				$(".safety-carousel").owlCarousel({
					responsive: {
						0: {
							items: 1,
							margin: 0,
							nav: false,
							dots: true,
						},
						768: {
							items: 2,
							margin: 20,
						},
						1170: {
							items: 3,
							margin: 68,
							dotsEach: true,
						},
					},
				});
			});
		</script>
	</section>

	
	<section class="vip-section relative pt-24 pb-2.5 bt:pb-12">
		<div class="custom-container">
			<div class="flex flex-col gap-12">
				<h2 class="font-m text-lg bt:text-2xl font-bold text-center text-black uppercase">
					<span class="text-[#EB8C31]">{'polylang_clients_new' | lexicon}</span> {'polylang_clients_new_2' | lexicon}
				</h2>

				<div class="bt:grid-cols-5 grid grid-cols-2 gap-6">
					{'!getAllCompanies' | snippet}
				</div>
			</div>
		</div>
	</section>

	<section class="bt:pt-28 bt:pb-24 pt-12 pb-20">
		<div class="custom-container">
			<div class="gap-14 bt:flex-row flex flex-col items-start justify-between">
				<div class="reviews-wrapper flex flex-col gap-12">
					<div class="bt:items-end bt:flex-row bt:justify-between flex flex-col items-center justify-center gap-4">
						<h2 class="font-m bt:text-left bt:text-2xl text-lg font-bold text-center text-black uppercase">
							<span class="text-[#EB8C31]">
								{'poly_lang_site_cart_reviews_title' | lexicon}</span> про «Еvаcмe»
						</h2>
						<a href="{4004 | url}" class="pb-1 border-b border-[#00C6FB] text-[#00C6FB] transition hover:text-[#005BEA] hover:border-[#005BEA] justify-betwenn flex items-center gap-4 w-max">
							<span class="text-lg font-light">
								{'poly_lang_site_all_review' | lexicon}
							</span>
							<svg width="8" height="12" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" fill="currentColor" clip-rule="evenodd" d="M.095.075c.127-.099.333-.099.46 0l7.35 5.743c.127.099.127.26 0 .359a.316.316 0 01-.03.02l-7.32 5.73c-.127.098-.333.098-.46 0-.126-.1-.126-.26 0-.36l7.12-5.57L.094.433c-.127-.099-.127-.26 0-.359z" />
							</svg>
						</a>
					</div>
        			{'!ecMessages' | snippet : [
				        'tpl' => 'commentTpl',
				        'tplEmpty' => 'empty_review',
				        'tplWrapper' => 'commentsWrapperTpl',
				        'thread' => 'resource-1'
				    ]}
				</div>
				<div class="block w-full bt:min-w-[550px] relative">
					<div class="hidden absolute inset-0 z-20 flex items-center justify-center w-full h-[110%] p-5 text-center bg-white">
						<p class="font-m text-2xl text-[#187dba] font-bold">
							{'poly_lang_site_feedback_success' | lexicon}
						</p>
					</div>
					{'ecForm' | snippet : [
				        'tplForm' => 'commentFormTpl',
				        'allowedFields' => 'user_name,user_email,text,rating',
				        'requiredFields' => 'user_name,user_email,text,rating',
				        'tplSuccess' => '',
				        'tplNewEmailUser' => '',
				        'updateEmailSubjUser' => '',
				        'autoPublish' => 'All',
				        'thread' => 'resource-1'
				    ]}
				</div>
			</div>
		</div>
		
		<script>
			document.addEventListener("DOMContentLoaded", () => {
				// Увеличить textarea по мере ввода символов
				autosize($(".autosize-textarea"));
				// Карусель
				$(".reviews-carousel").slick({
					slidesToShow: 1,
					infinite: false,
					dots: true,
					arrows: true,
					adaptiveHeight: true,
					prevArrow: '<button class="bt:top-1/2 top-5 absolute rounded-[7px] shadow-sm transition hover:shadow-md left-0 z-10 flex items-center justify-center w-10 h-10 bt:-translate-y-1/2 bg-white"><img src="new-site/new-main/img/new-main-page/carousel-arrow-next.svg" width="23" height="25" class="flex-shrink-0 rotate-180" alt="" /></button>',
					nextArrow: '<button class="bt:top-1/2 top-5 absolute rounded-[7px] shadow-sm transition hover:shadow-md right-0 z-10 flex items-center justify-center w-10 h-10 bt:-translate-y-1/2 bg-white"><img src="new-site/new-main/img/new-main-page/carousel-arrow-next.svg" width="23" height="25" class="flex-shrink-0" alt="" /></button>',
				});
			});
		</script>
	</section>

</main>
{/block}
{block 'scripts'}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

{ignore}
<script>
    $('.modalClose').click(function(){
        $(this).parents('.popup').hide();
    })
    $('.search-form-wrapper input, .search-form-wrapper select').on('change', function(){
        if($(this).val() != '') {
            $('.search-form-wrapper button').prop('disabled', false);
        }
    })
    $('.comment-item .rating').each(function(index, el) {
        let rating = $(el).attr('data-rating') - 1;
        $(el).find('span').each(function(i, element) {
            if(i <= rating) {
                $(element).addClass('rating-star--checked');
            }
        });
    })
</script>
{/ignore}
{/block}
