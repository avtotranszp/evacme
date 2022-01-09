<div class="complain-popup popup hidden z-30 fixed flex items-center justify-center top-0 left-0 right-0 bottom-0 bg-dark bg-opacity-70" id="complainPopup">
	<div class="popup__wrapper relative p-4 bg-white rounded shadow-md">
		<button class="button--close rounded absolute bg-dark right-3 top-3 transition transform flex items-center justify-center opacity-70 hover:opacity-100 transition cursor-pointer">
			<svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M24 8L8 24M8 8l16 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
		</button>
		<div class="popup__inner w-full md:w-96">
			<div class="flex flex-col space-y-4">
				<p class="font-bold text-2xl">{'poly_lang_site_cart_pogal' | lexicon}</p>
				<img src="new-site/img/complain.svg" class="flex-shrink-0 mx-auto" width="100" height="100" loading="lazy" aria-hidden="true" alt="">
				<form action="/" method="POST" id="complaint-form">
					<fieldset class="flex flex-col space-y-2">
						<legend class="pb-1 border-b border-gray w-full">{'poly_lang_site_ads_complaint' | lexicon}</legend>
						<label class="radio-label cursor-pointer flex items-center">
							<input class="hidden" type="radio" name="complain" value="Спам" checked>
							<span class="fake-radio"></span>
							<span class="ml-2">Спам</span>
						</label>
						<label class="radio-label cursor-pointer flex items-center">
							<input class="hidden" type="radio" name="complain" value="{'poly_lang_site_ads_complaint_prohibited' | lexicon}">
							<span class="fake-radio"></span>
							<span class="ml-2">{'poly_lang_site_ads_complaint_prohibited' | lexicon}</span>
						</label>
						<label class="radio-label cursor-pointer flex items-center">
							<input class="hidden" type="radio" name="complain" value="{'poly_lang_site_ads_complaint_not_actual' | lexicon}">
							<span class="fake-radio"></span>
							<span class="ml-2">{'poly_lang_site_ads_complaint_not_actual' | lexicon}</span>
						</label>
						<label class="radio-label cursor-pointer flex items-center">
							<input class="hidden" type="radio" name="complain" value="{'poly_lang_site_ads_complaint_fraud' | lexicon}">
							<span class="fake-radio"></span>
							<span class="ml-2">{'poly_lang_site_ads_complaint_fraud' | lexicon}</span>
						</label>
					</fieldset>
					<div class="flex mt-2 hidden">
						<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
						<p class="text-red text-sm ml-2">{'poly_lang_site_ads_complaint_reason_error' | lexicon}</p>
					</div>
					<div class="flex flex-col my-4">
						<div>
							<textarea class="w-full custom-scroll text-sm p-2 w-full border border-accent rounded transition focus:shadow-accent resize-none" name="complainText" id="complainText" placeholder="{'poly_lang_site_ads_complaint_set_reason' | lexicon}" cols="30" rows="5"></textarea>
						</div>
						
						<div class="flex items-center mt-2 hidden">
							<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
							<p class="text-red text-sm ml-2">{'poly_lang_site_ads_complaint_reason_error' | lexicon}</p>
						</div>
					</div>
					<button class="bg-accent text-white rounded w-full py-2 transition hover:bg-accentDarken" type="submit">{'poly_lang_site_form_send' | lexicon}</button>
				</form>
			</div>


			<div class="flex flex-col space-y-4 hidden complaint-form-success">
				<img src="new-site/img/reg-result.svg" class="mx-auto flex-shrink-0 mb-4" width="200" height="200" aria-hidden="true" alt="" />
				<p class="font-bold text-2xl text-center">{'poly_lang_site_ads_complaint_success' | lexicon}</p>
			</div>
		</div>
	</div>
</div>