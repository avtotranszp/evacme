<div style="display: none" class="popup bg-dark bg-opacity-70 fixed inset-0 z-30 flex items-center justify-center" id="messageToAuthor">
	<div class="popup__wrapper relative w-full p-4 bg-white rounded shadow-md" style="max-width: 600px">
		<button class="button--close bg-dark hover:opacity-100 top-3 right-3 opacity-70 absolute flex items-center justify-center transition transform rounded cursor-pointer">
			<svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M24 8L8 24M8 8l16 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</button>
		<div class="popup__inner w-full">
			<div class="flex flex-col space-y-4">
				<p class="text-2xl font-bold">{'poly_lang_site_ruser_send_message' | lexicon}</p>

				<form action="/" class="flex flex-col justify-center" id="user-send-form">
					<div class="flex flex-col w-full mb-2">
						<label class="group relative flex flex-col mb-1">
							<span class="mb-1 pl-2.5">{'poly_lang_site_your_name' | lexicon}</span>
							<input name="name" type="text" class="border-accent focus:shadow-accent p-3 transition border rounded" placeholder="{'poly_lang_site_your_name' | lexicon}" />
						</label>
						<!-- Вывод ошибки - для отображения убрать hidden -->
						<div class="flex ml-3.5 hidden">
							<img src="new-site/img/stop.svg" class="self-center flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
							<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
						</div>
					</div>
					<div class="flex flex-col w-full mb-2">
						<label class="group relative flex flex-col mb-1">
							<span class="mb-1 pl-2.5">Email</span>
							<input name="email" type="email" class="border-accent focus:shadow-accent p-3 transition border rounded" placeholder="example@mail.com" />
						</label>
						<!-- Вывод ошибки - для отображения убрать hidden -->
						<div class="flex ml-3.5 hidden">
							<img src="new-site/img/stop.svg" class="self-center flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
							<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
						</div>
					</div>

					<div class="flex flex-col my-4">
						<textarea class="custom-scroll border-accent focus:shadow-accent w-full p-2 text-sm transition border rounded resize-none" name="message1" id="message1" placeholder="{'poly_lang_site_your_message' | lexicon}" cols="30" rows="10" required></textarea>

						<div class="flex hidden mt-2">
							<img src="new-site/img/stop.svg" class="self-center flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
							<p class="text-red ml-2 text-sm">Текст не может быть короче 10 символов.</p>
						</div>
					</div>
					<button class="bg-accent hover:bg-accentDarken self-center w-64 py-2 text-white transition rounded" type="submit">{'poly_lang_site_form_send' | lexicon}</button>
				</form>
			</div>


			<div class="flex flex-col space-y-4 hidden user-send-form-success">
				<img src="new-site/img/reg-result.svg" class="flex-shrink-0 mx-auto mb-4" width="200" height="200" aria-hidden="true" alt="" />
				<p class="text-2xl font-bold text-center">{'poly_lang_site_feedback_success' | lexicon}</p>
			</div>
		</div>
	</div>
</div>