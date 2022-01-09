{extends 'file:layouts/main.php'}

{block 'content'}
{'!isLoggedIn' | snippet : ['redirectTo' => 3781]}
{if !$.get.id?}
	{$_modx->sendErrorPage()}
{/if}
<main class="flex-grow flex-shrink-0 relative">
	<section class="py-8">
		<div class="container mx-auto px-4">

			<div class="flex flex-col relative">

				<div class="mb-6 flex flex-col">

						<h1 class="mb-3 md:mb-8 text-2xl md:text-3xl font-bold">{$res.pagetitle}</h1>

						<div class="flex items-center mb-3">
							<img src="new-site/img/check.svg" class="mr-1" width="16" height="16" loading="lazy" role="presentation" alt="">
							<p>{'poly_lang_site_evac_ads_text' | lexicon}</p>
						</div>
						<input type="hidden" name="id" value="{$.get.id}">
						<div class="grid gap-y-4 md:grid-cols-3 md:gap-x-4 mb-8">
							<input id="1-month" value="1" name="month" class="label-input hidden" type="radio">
							<label for="1-month" class="label-wrapper group transition cursor-pointer">
								<span class="label-inner group-hover:shadow-xl transition flex flex-col border-2 border-gray p-8 rounded relative">
									<span class="mb-3 flex items-center self-center">
										<span class="text-2xl mr-1">1</span> 
										<span>{'poly_lang_site_one_month' | lexicon}</span>
									</span>
									<span class="font-bold text-4xl text-center">149 грн.</span>
								</span>
							</label>

							<input id="3-month" value="3" name="month" class="label-input hidden" type="radio" checked>
							<label for="3-month" class="label-wrapper group transition cursor-pointer">
								<span class="label-inner group-hover:shadow-xl transition flex flex-col border-2 border-gray p-8 rounded relative">
									<span class="absolute -left-0.5 -top-0.5 px-1 py-0.5 bg-second text-white text-sm">
										{'poly_lang_site_ads_popular' | lexicon}
									</span>
									<span class="mb-3 flex items-center self-center">
										<span class="text-2xl mr-1">3</span> 
										<span>{'poly_lang_site_two_month' | lexicon}</span>
									</span>
									<span class="font-bold text-4xl text-center">417 грн.</span>
								</span>
							</label>

							<input id="6-month" value="6" name="month" class="label-input hidden" type="radio">
							<label for="6-month" class="label-wrapper group transition cursor-pointer">
								<span class="label-inner group-hover:shadow-xl transition flex flex-col border-2 border-gray p-8 rounded relative">
									<span class="mb-3 flex items-center self-center">
										<span class="text-2xl mr-1">6</span> 
										<span>{'poly_lang_site_more_month' | lexicon}</span>
									</span>
									<span class="font-bold text-4xl text-center">774 грн.</span>
								</span>
							</label>

						</div>
						
						<div class="flex flex-col">
							<p>{'poly_lang_site_liqpay_text' | lexicon}</p>
							<p>{'poly_lang_site_liqpay_desc' | lexicon}
							<a href="{110 | url}" class="text-accent transition hover:underline" target="_blank">{'poly_lang_site_liqpay_desc2' | lexicon}</a>.
							</p>
						</div>

						<div class="flex flex-col-reverse md:flex-row justify-between items-center mt-8 pt-8 border-t border-gray">
							
							<a href="{3792 | url}" class="w-full md:w-max hover:bg-accentDarken bg-accent transition px-8 py-4 text-white text-center rounded">{'poly_lang_site_back_button' | lexicon}</a>
							<button type="submit" id="createOrder" class="mb-4 md:mb-0 w-full md:w-max hover:bg-secondDarken bg-second transition px-24 font-bold py-4 text-white rounded">{'poly_lang_site_pay_button' | lexicon}</button>
							<button type="submit" id="createOrderByBalance" class="mb-4 md:mb-0 w-full md:w-max hover:bg-secondDarken bg-second transition px-24 font-bold py-4 text-white rounded">{'poly_lang_site_pay_button_balance' | lexicon}</button>
						</div>
				
				</div>
				
			</div>
		</div>
	</section>
</main>
{/block}
{block 'scripts'}
<script src="new-site/js/order.js"></script>
<script src="/new-site/libs/select2/select2.min.js"></script>
<script src="/new-site/libs/dropzone/dropzone.min.js"></script>
<script src="/new-site/js/scripts.min.js"></script>

<div id="paymentError" style="display: none" class="popup bg-dark bg-opacity-70 fixed inset-0 z-30 flex items-center justify-center">
	<div class="popup__wrapper relative w-full p-4 bg-white rounded shadow-md" style="max-width: 600px; min-height: 50px;">
		<button type="button" class="modalClose bg-dark hover:opacity-100 top-3 right-3 opacity-70 absolute flex items-center justify-center transition transform rounded cursor-pointer">
			<svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M24 8L8 24M8 8l16 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</button>
		<div class="popup__inner w-full">
			<div class="flex flex-col space-y-4">
				<p class="text-2xl font-bold text-center">{'poly_lang_site_private_payment_insufficient_funds' | lexicon}</p>
			</div>
		</div>
	</div>
</div>
<script>
    let lang = $('html').attr('lang');
    if(lang == 'ua') {
        $('.polylang-item').attr('href', location.href.replace('/ua/', '/')); 
    } else {
        let link = $('.polylang-item').attr('href') + '?id={$.get.id}';
        $('.polylang-item').prop('href', link);
    }
    
</script>
{/block}
