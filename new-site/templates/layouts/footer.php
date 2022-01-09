<!-- Footer -->
<footer class="flex-grow-0 flex-shrink-0" id="footer">
	<div class="bg-accent py-8">
		<div class="container mx-auto px-4 flex justify-between flex-col md:flex-row">
			<div class="flex flex-col md:px-1">
				<h3 class="footer-link flex justify-between items-center md:inline p-4 border-t text-lg border-gray text-white font-semibold md:p-0 md:pb-3 md:text-base md:border-0">{'poly_lang_site_footer_about_us' | lexicon}</h3>
				<ul class="footer-list pl-5 md:p-0">
					<li class="mb-3 md:mb-2">
						<a href="{3556 | url}" class="text-white hover:text-second transition text-sm">{'poly_lang_site_footer_oferta' | lexicon}</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="{110 | url}" class="text-white hover:text-second transition text-sm">{'poly_lang_site_footer_pravila' | lexicon}</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="{105 | url}" class="text-white hover:text-second transition text-sm">{'poly_lang_site_footer_question' | lexicon}</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="{3811 | url}" class="text-white hover:text-second transition text-sm">{'!pdoField' | snippet : ['id' => 3811]}</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="{3812 | url}" class="text-white hover:text-second transition text-sm">{'!pdoField' | snippet : ['id' => 3812]}</a>
					</li>
				</ul>
			</div>

			{*
			<div class="flex flex-col md:px-1">
				<h3 class="flex justify-between items-center md:inline p-4 border-t text-lg border-gray text-white font-semibold md:p-0 md:pb-3 md:text-base md:border-0">Продавцам</h3>
				<ul class="footer-list pl-5 md:p-0">
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Импорт объявлений</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Платные услуги</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Размещение баннеров</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Виджеты</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Сервис расчета</a>
					</li>
				</ul>
			</div>

			<div class="flex flex-col md:px-1">
				<h3 class="flex justify-between items-center md:inline p-4 border-t text-lg border-gray text-white font-semibold md:p-0 md:pb-3 md:text-base md:border-0">Покупателям</h3>
				<ul class="footer-list pl-5 md:p-0">
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Покупателям</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Безопасные покупки</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Каталог товаров</a>
					</li>
				</ul>
			</div>

			<div class="flex flex-col md:px-1">
				<h3 class="flex justify-between items-center md:inline p-4 border-t text-lg border-gray text-white font-semibold md:p-0 md:pb-3 md:text-base md:border-0">Другие страны</h3>
				<ul class="footer-list pl-5 md:p-0">
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Казахстан</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Молдова</a>
					</li>
					<li class="mb-3 md:mb-2">
						<a href="#!" class="text-white hover:text-second transition text-sm">Венгрия</a>
					</li>
				</ul>
			</div>
				*}

			<!-- Logo mobile -->
			<div class="flex flex-col px-1 order-first md:block md:order-none">
				<img src="new-site/img/logo.png" class="mb-4" width="144" height="35" alt="Логотип" />
				<div class="hidden md:flex flex-wrap justify-center">
					<img src="new-site/img/visa.png" class="mr-2 mb-2" width="50" height="34" aria-hidden="true" alt="" />
					<img src="new-site/img/mastercard.png" class="mr-0 lg:mr-2 mb-2" width="50" height="34" aria-hidden="true" alt="" />
				</div>
			</div>
			<!-- // Logo mobile -->
		</div>
	</div>

	<!-- Subfooter -->
	<div class="bg-accentDarken py-8">
		<div class="container mx-auto px-4">
			<p class="mb-4 text-gray text-xs">© 2013 - {'' | date : "Y"}, {'poly_lang_site_footer_slogan' | lexicon}</p>
{*			<p class="text-gray text-xs">Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Путь жизни ipsum назад своего там подпоясал, инициал одна за.</p>
*}
		</div>
	</div>
	<!-- // Subfooter -->
</footer>
<!-- // Footer -->
