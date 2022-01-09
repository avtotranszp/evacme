<footer class="footer flex flex-col" id="footer">
	<div class="bg-[#187dba] py-6 md:py-12">
		<div class="custom-container">
			<div class="md:flex-row flex flex-col items-start justify-between gap-10">
				<div class="sm:self-center flex items-start self-start gap-20">
					<div class="flex flex-col gap-4 leading-6">
						<h2 class="text-sm font-bold leading-4 text-white">{'poly_lang_site_footer_about_us' | lexicon}</h2>
						<ul class="flex flex-col gap-4 leading-6">
							<li>
								<a href="{3556 | url}" class="footer-link relative text-sm leading-4 text-white">
									{'poly_lang_site_footer_oferta' | lexicon}
								</a>
							</li>
							<li>
								<a href="{110 | url}" class="footer-link relative text-sm leading-4 text-white">
									{'poly_lang_site_footer_pravila' | lexicon}
								</a>
							</li>
							<li>
								<a href="{105 | url}" class="footer-link relative text-sm leading-4 text-white">
									{'poly_lang_site_footer_question' | lexicon}
								</a>
							</li>
							<li>
								<a href="{3811 | url}" class="footer-link relative text-sm leading-4 text-white">
									{'!pdoField' | snippet : ['id' => 3811]}
								</a>
							</li>
							<li>
								<a href="{3812 | url}" class="footer-link relative text-sm leading-4 text-white">
									{'!pdoField' | snippet : ['id' => 3812]}
								</a>
							</li>
						</ul>
					</div>
					<ul class="md:flex md:flex-col md:gap-4 md:leading-4 hidden">
						{'pdoResources' | snippet : [
							'parents' => 0,
						    'resources' => '2',
						    'sortby'    => 'menuindex',
						    'sortdir'   => 'ASC',
						    'tpl'       => '@INLINE <li>
								<a href="{$id | url}" class="footer-link relative text-sm leading-4 text-white">
									{$pagetitle}
								</a>
							</li>',
						    'limit'     => 0,
						]}
					</ul>
				</div>
				<div class="md:order-last md:gap-3 md:w-max md:pb-0 md:border-none flex flex-col justify-center order-first w-full gap-4 pb-4 border-b border-[#73AACF]">
					<div class="flex-shink-0 md:border-b md:border-white md:pb-1">
						<img src="new-site/img/logo.png" width="144" height="30" loading="lazy" alt="" class="footer-logo mx-auto" />
					</div>
					<div class="md:justify-between flex items-center self-center gap-4">
						<a href="https://www.facebook.com/evacmee" target="_blank" class="footer-social--fb w-[30px] h-[30px] block bg-center bg-no-repeat"></a>
						<a href="https://www.instagram.com/evacmee/" target="_blank" class="footer-social--inst w-[30px] h-[30px] block bg-center bg-no-repeat"></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg-[#11679b] py-6">
		<div class="custom-container">
			<div class="flex items-center justify-between">
				<p class="text-sm text-[#67a2c6]">
					© 2013-{'' | date : "Y"}, Evacme - <br class="md:hidden" />
					{'poly_lang_site_footer_slogan' | lexicon}
				</p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center gap-2">
					<img src="/new-site/new-main/img/new-main-page/visa.svg" width="51" height="29" loading="lazy" alt="" class="flex-shrink-0" />
					<img src="/new-site/new-main/img/new-main-page/mastercard.svg" width="51" height="29" loading="lazy" alt="" class="flex-shrink-0" />
				</div>
			</div>
		</div>
	</div>
</footer>