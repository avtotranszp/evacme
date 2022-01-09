<form id="regForm" class="flex flex-col items-center w-full" style="max-width: 520px;">
    <input type="hidden" name="redirectUrl" value="{3799 | url}">
    <input type="hidden" name="signup-btn" value="Send">
	<div class="flex flex-col mb-5 w-full">
		<label class="group flex flex-col relative mb-1">
			<img src="new-site/img/mail.svg" class="absolute top-1/2 transform -translate-y-1/2 left-3 opacity-70" width="20" height="20" aria-hidden="true" alt="" />
			<input type="email" name="email" class="p-3 pl-12 border border-accent rounded transition focus:shadow-accent" placeholder="Ваш email" />
		</label>
		<!-- Вывод ошибки - для отображения убрать hidden -->
		<div class="flex items-center ml-3.5 hidden">
			<img src="new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
			<p class="text-red ml-2">Некорректный e-mail адрес.</p>
		</div>
	</div>
	<!-- Пароль -->
	<div class="flex flex-col mb-2 w-full">
		<label class="group flex flex-col relative mb-1">
			<img src="new-site/img/lock.svg" class="absolute top-1/2 transform -translate-y-1/2 left-3 opacity-70" width="20" height="20" aria-hidden="true" alt="" />
			<input name="password" id="passwordControl" type="password" class="p-3 px-12 border border-accent rounded transition focus:shadow-accent" placeholder="Ваш пароль" />
			<button class="password-control absolute top-1/2 transform -translate-y-1/2 right-3 outline-none" aria-label="Показать пароль">
				<img src="new-site/img/password-off.svg" width="22" height="22" aria-hidden="true" alt="" />
				<img src="new-site/img/password-on.svg" class="hidden" width="22" height="22" loading="lazy" aria-hidden="true" alt="" />
			</button>
		</label>
		<!-- Вывод ошибки - для отображения убрать hidden -->
		<div class="flex items-center ml-3.5 hidden">
			<img src="new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
			<p class="text-red ml-2">Некорректный пароль.</p>
		</div>
	</div>

	<button class="mb-8 mt-8 bg-accent text-white uppercase rounded w-72 py-4 transition hover:bg-accentDarken" type="submit">{'poly_lang_site_reg_button' | lexicon}</button>
</form>