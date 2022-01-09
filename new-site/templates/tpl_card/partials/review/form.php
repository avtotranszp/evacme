<form action="/" method="POST" id="review-form">
	<div class="flex flex-col space-y-3">
		<div class="group flex flex-col relative">
			<input type="text" name="name" class="text-sm p-2 border border-accent rounded transition focus:shadow-accent" placeholder="{'poly_lang_site_your_name' | lexicon}">
			<!-- Вывод ошибки - для отображения убрать hidden -->
			<div class="flex ml-3.5 mt-1 hidden">
				<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
				<p class="text-red text-sm ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
			</div>
		</div>
		<div class="group flex flex-col relative">
			<input type="email" name="email" class="text-sm p-2 border border-accent rounded transition focus:shadow-accent" placeholder="example@gmail.com">
			<!-- Вывод ошибки - для отображения убрать hidden -->
			<div class="flex ml-3.5 mt-1 hidden">
				<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
				<p class="text-red text-sm ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
			</div>
		</div>

		<div class="flex items-center">
			<span class="pl-2.5 text-sm mr-2">{'poly_lang_site_review_rating' | lexicon}</span>
			<div class="rating">
				<input class="rating__input" name="rating" type="radio" value="1">
				<input class="rating__input" name="rating" type="radio" value="2">
				<input class="rating__input" name="rating" type="radio" value="3" checked>
				<input class="rating__input" name="rating" type="radio" value="4">
				<input class="rating__input" name="rating" type="radio" value="5">
			</div>
			<div class="flex ml-3.5 mt-1 hidden">
				<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
				<p class="text-red text-sm ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
			</div>
		</div>

		<div class="group flex flex-col relative">
			<div>
				<textarea name="comment" id="comment" cols="30" rows="10" class="w-full resize-none text-sm p-2 border border-accent rounded transition focus:shadow-accent" placeholder="{'poly_lang_site_your_message' | lexicon}"></textarea>
			</div>
			<!-- Вывод ошибки - для отображения убрать hidden -->
			<div class="flex items-center ml-3.5 mt-1 hidden">
				<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
				<p class="text-red text-sm ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
			</div>
		</div>
		<button class="mx-auto mt-4 bg-accent text-white rounded w-full sm:w-80 py-2 transition hover:bg-accentDarken" type="submit">{'poly_lang_site_form_send' | lexicon}</button>
	</div>
</form>

<div class="flex items-center justify-center py-2 hidden">
	<img src="new-site/img/check-list.svg" class="flex-shrink-0 mr-2" width="20" height="20" loading="lazy" aria-hidden="true" alt="">
	<p class="text-center text-xl font-medium">{'poly_lang_site_review_success' | lexicon}</p>
</div>