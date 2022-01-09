<div style="display: none" id="tab-content-branding" class="tab-content-block">
	{'!UpdateProfile' | snippet : [
	    'validate' => 'brand_company_title:required',
	    'excludeExtended' => 'brand_logo',
	    'submitVar' => 'update-brand',
    ]}
	<form action="{$_modx->resource.id | url}" method="post" id="change-brand-form">
		<div class="flex flex-col gap-4">
			<p class="text-graySemiDark mb-2 text-sm">{'poly_lang_site_settings_brand_info' | lexicon}</p>

			<div class="md:flex-row md:gap-5 flex flex-col items-start">
				<div class="md:max-w-[165px] w-full">
					<p class="text-base">Логотип</p>
				</div>
				<div class="sm:flex-row md:gap-10 md:items-start flex flex-col items-center w-full gap-4">
					<label class="flex">
						<input name="brand_logo" type="file" class="hidden" />
						
						<span class="hover:text-second relative text-white hover:shadow-xl block object-cover object-center w-[120px] h-10 overflow-hidden transition shadow-lg cursor-pointer">
							<img src="{$_modx->user['extended']['brand_logo'] ? $_modx->user['extended']['brand_logo'] : 'https://via.placeholder.com/120x40'}?v={time()}" class="object-cover w-full h-full" width="120" height="40" alt="" />
							<span class="left-1/2 bg-dark bg-opacity-60 absolute bottom-0 flex items-center justify-center w-full h-[24px] -translate-x-1/2">
								<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36.174 36.174">
									<defs />
									<path
										fill="currentColor"
										d="M23.921 20.528c0 3.217-2.617 5.834-5.834 5.834s-5.833-2.617-5.833-5.834 2.616-5.834 5.833-5.834 5.834 2.618 5.834 5.834zm12.253-8.284v16.57a4 4 0 01-4 4H4a4 4 0 01-4-4v-16.57a4 4 0 014-4h4.92V6.86a3.5 3.5 0 013.5-3.5h11.334a3.5 3.5 0 013.5 3.5v1.383h4.92c2.209.001 4 1.792 4 4.001zm-9.253 8.284c0-4.871-3.963-8.834-8.834-8.834-4.87 0-8.833 3.963-8.833 8.834s3.963 8.834 8.833 8.834c4.871 0 8.834-3.963 8.834-8.834z"
									/>
								</svg>
							</span>
						</span>
					</label>
					<div class="sm:text-left text-graySemiDark flex flex-col text-sm text-center">
						<p>{'poly_lang_site_settings_brand_logo_title' | lexicon}</p>
						<p>{'poly_lang_site_settings_brand_logo_recommendations' | lexicon}</p>
						<p class="error-size">{'poly_lang_site_settings_avatar_size' | lexicon}</p>
						<p class="error-format">{'poly_lang_site_settings_avatar_ext' | lexicon}</p>
					</div>
				</div>
			</div>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_brand_company_title' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full">
						<label class="group relative flex flex-col w-full">
							<input type="text" value="{$_modx->getPlaceholder('brand_company_title')}" required name="brand_company_title" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_brand_company_title' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('error.brand_company_title')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.brand_company_title')}</p>
    						</div>
						{/if}
					</div>
				</div>
			</div>

			<div class="bg-graySecond w-full h-px my-4"></div>
			<button class="bg-accent hover:bg-accentDarken w-48 py-2 text-sm text-white uppercase transition rounded" name="update-brand" value="1" type="submit">{'poly_lang_site_evac_create_save_button' | lexicon}</button>
		</div>
	</form>
</div>