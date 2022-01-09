{extends 'file:layouts/main.php'}
{block 'linksPrev'}
<link rel="stylesheet" href="new-site/libs/select2/select2.min.css">
<link rel="preload" as="style" href="new-site/libs/select2/select2.min.css"/>

<link rel="stylesheet" href="new-site/libs/dropzone/basic.min.css">
<link rel="preload" as="style" href="new-site/libs/dropzone/basic.min.css"/>

<link rel="stylesheet" href="new-site/libs/dropzone/dropzone.min.css">
<link rel="preload" as="style" href="new-site/libs/dropzone/dropzone.min.css"/>

<link rel="stylesheet" href="new-site/libs/fotorama/fotorama.css">
<link rel="preload" as="style" href="new-site/libs/fotorama/fotorama.css"/>
{/block}
{block 'content'}
{'!isLoggedIn' | snippet : ['redirectTo' => 3781]}
<main class="relative flex-grow flex-shrink-0">
	<section class="py-8">
		<div class="container flex flex-col gap-2 px-4 mx-auto mb-5">
			<div class="sm:items-center flex flex-row justify-between">
				<h1 class="text-2xl font-bold text-black">{$_modx->resource['pagetitle']}</h1>
				{'personal_balance' | chunk}
			</div>
			<p class="text-graySemiDark">{$_modx->resource['introtext']}</p>
		</div>

		<div class="container px-4 mx-auto">
			<div class="lg:flex-row relative flex flex-col justify-between">
                {'account_menu' | chunk}
				<div class="lg:ml-8 flex flex-col w-full gap-5">
					{$_modx->runSnippet('!FormIt', [
					    'preHooks' => 'getCompanyFields',
					    'hooks'  => 'setCompanyFields',
					    'clearFieldsOnSuccess' => 0,
					    'fields' => 'company_title,company_city,company_address,company_phone,company_site,company_description,company_alias',
					    'customValidators' => 'aliasValidate',
					    'validate' => 'company_title:required,company_city:required,company_alias:required:aliasValidate',
					    'submitVar' => 'company_update',
					    
					])}

					{if $_modx->getPlaceholder('fi.success')}
                        <div class="alert_success border-t-4 rounded-b px-4 py-3 shadow-md mb-4" role="alert">
                          <div class="flex">
                              <p class="font-bold">{'poly_lang_site_my_company_success_update' | lexicon}</p>
                          </div>
                        </div>
                    {/if}
					<form action="{$_modx->resource.id | url}" method="post" id="updateCompany" class="tab-content-block flex flex-col gap-5 p-4 bg-white rounded shadow-md">
						<p class="text-graySemiDark text-sm">{$_modx->resource['content'] | notags}</p>
						<div class="file_input md:flex-row md:gap-5 flex flex-col items-start gap-3">
							<div class="md:max-w-[250px] w-full">
								<p class="text-base">{'poly_lang_site_my_company_images_title' | lexicon}</p>
							</div>
							<div class="sm:flex-row md:gap-10 flex flex-col items-center w-full gap-4">
								<label>
									<input type="hidden" value="{$_modx->getPlaceholder('fi.company_logo_path')}" name="company_logo_path">
									<input type="file" value="" name="company_logo" class="hidden">
									<span class="hover:shadow-2xl hover:text-second relative block object-cover object-center w-20 h-20 overflow-hidden text-white transition rounded-full shadow-lg cursor-pointer">
										<img src="{$_modx->getPlaceholder('fi.company_logo_path') ? $_modx->getPlaceholder('fi.company_logo_path') : 'https://via.placeholder.com/180x180'}?v={time()}" class="object-cover w-full h-full" width="80" height="80" alt="">
										<span class="left-1/2 bg-dark bg-opacity-60 absolute bottom-0 flex items-center justify-center w-full h-[34px] -translate-x-1/2">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36.174 36.174">
												<defs></defs>
												<path fill="currentColor" d="M23.921 20.528c0 3.217-2.617 5.834-5.834 5.834s-5.833-2.617-5.833-5.834 2.616-5.834 5.833-5.834 5.834 2.618 5.834 5.834zm12.253-8.284v16.57a4 4 0 01-4 4H4a4 4 0 01-4-4v-16.57a4 4 0 014-4h4.92V6.86a3.5 3.5 0 013.5-3.5h11.334a3.5 3.5 0 013.5 3.5v1.383h4.92c2.209.001 4 1.792 4 4.001zm-9.253 8.284c0-4.871-3.963-8.834-8.834-8.834-4.87 0-8.833 3.963-8.833 8.834s3.963 8.834 8.833 8.834c4.871 0 8.834-3.963 8.834-8.834z"></path>
											</svg>
										</span>
									</span>
								</label>
								<div class="sm:text-left text-graySemiDark flex flex-col text-sm text-center">
									<p>{'poly_lang_site_my_company_logo_info' | lexicon}</p>
									<p>{'poly_lang_site_my_company_logo_recommendations' | lexicon}</p>
									<p class="error-size">{'poly_lang_site_settings_avatar_size' | lexicon}</p>
									<p class="error-format">{'poly_lang_site_settings_avatar_ext' | lexicon}</p>
								</div>
							</div>
						</div>

						<div class="file_input flex flex-col gap-4">
							<label class="block w-full">
								<input type="hidden" value="{$_modx->getPlaceholder('fi.company_image_path')}" name="company_image_path">
								<input type="file" value="" name="company_image" class="hidden">
								<span class="hover:shadow-2xl hover:text-second relative block object-cover object-center w-full h-[140px] overflow-hidden text-white transition shadow-lg cursor-pointer">
									<img src="{$_modx->getPlaceholder('fi.company_image_path') ? $_modx->getPlaceholder('fi.company_image_path') : 'https://via.placeholder.com/990x200'}?v={time()}" class="object-cover w-full h-full" width="990" height="200" alt="">
									<span class="left-1/2 bg-dark bg-opacity-60 absolute bottom-0 flex items-center justify-center w-full h-[60px] -translate-x-1/2">
										<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 36.174 36.174">
											<defs></defs>
											<path fill="currentColor" d="M23.921 20.528c0 3.217-2.617 5.834-5.834 5.834s-5.833-2.617-5.833-5.834 2.616-5.834 5.833-5.834 5.834 2.618 5.834 5.834zm12.253-8.284v16.57a4 4 0 01-4 4H4a4 4 0 01-4-4v-16.57a4 4 0 014-4h4.92V6.86a3.5 3.5 0 013.5-3.5h11.334a3.5 3.5 0 013.5 3.5v1.383h4.92c2.209.001 4 1.792 4 4.001zm-9.253 8.284c0-4.871-3.963-8.834-8.834-8.834-4.87 0-8.833 3.963-8.833 8.834s3.963 8.834 8.833 8.834c4.871 0 8.834-3.963 8.834-8.834z"></path>
										</svg>
									</span>
								</span>
							</label>
							<ul class="text-graySemiDark pl-5 text-sm list-disc">
								<li>
									<p>{'poly_lang_site_my_company_image_recommendations' | lexicon}</p>
								</li>
								<li>
									<p class="error-format">{'poly_lang_site_settings_avatar_size' | lexicon}</p>
								</li>
								<li>
									<p class="error-format">{'poly_lang_site_settings_avatar_ext' | lexicon}</p>
								</li>
							</ul>
						</div>

						<div class="flex flex-col gap-3">
							<div class="md:flex-row md:gap-5 flex flex-col items-start">
								<div class="md:max-w-[250px] w-full">
									<p class="md:pt-2 text-base">{'poly_lang_site_my_company_company_title' | lexicon} <span class="text-red">*</span></p>
								</div>
								<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
									<div class="w-full md:max-w-[290px]">
										<label class="group relative flex flex-col w-full md:max-w-[290px]">
											<input type="text" required value="{$_modx->getPlaceholder('fi.company_title')}" name="company_title" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_my_company_company_title_ph' | lexicon}">
										</label>
										{if $_modx->getPlaceholder('fi.error.company_title')}
                    						<div class="flex ml-3.5 mt-1 items-center">
                    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
                    							<p class="text-red ml-2">{$_modx->getPlaceholder('fi.error.company_title')}</p>
                    						</div>
                						{/if}
									</div>
									<div class="flex items-center w-full gap-2"></div>
								</div>
							</div>
							<div class="md:flex-row md:gap-5 flex flex-col items-start">
								<div class="md:max-w-[250px] w-full">
									<p class="md:pt-2 text-base">{'poly_lang_site_my_company_city' | lexicon} <span class="text-red">*</span></p>
								</div>
								<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
									<div class="w-full md:max-w-[290px]">
										<label class="group relative flex flex-col w-full md:max-w-[290px]">
											<input type="text" required value="{$_modx->getPlaceholder('fi.company_city')}" name="company_city" class="searchCity border-accent focus:shadow-accent px-3 py-2 transition border rounded ui-autocomplete-input" placeholder="{'poly_lang_site_my_company_city_ph' | lexicon}" autocomplete="off">
										</label>
										{if $_modx->getPlaceholder('fi.error.company_city')}
                    						<div class="flex ml-3.5 mt-1 items-center">
                    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
                    							<p class="text-red ml-2">{$_modx->getPlaceholder('fi.error.company_city')}</p>
                    						</div>
                						{/if}
									</div>
									<div class="flex items-center w-full gap-2"></div>
								</div>
							</div>
							<div class="md:flex-row md:gap-5 flex flex-col items-start">
								<div class="md:max-w-[250px] w-full">
									<p class="md:pt-2 text-base">{'poly_lang_site_my_company_address' | lexicon}</p>
								</div>
								<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
									<div class="w-full md:max-w-[290px]">
										<label class="group relative flex flex-col w-full md:max-w-[290px]">
											<input type="text" value="{$_modx->getPlaceholder('fi.company_address')}" name="company_address" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_my_company_address_ph' | lexicon}">
										</label>
									</div>
									<div class="flex items-center w-full gap-2"></div>
								</div>
							</div>
							<div class="md:flex-row md:gap-5 flex flex-col items-start">
								<div class="md:max-w-[250px] w-full">
									<p class="md:pt-2 text-base">{'poly_lang_site_my_company_phone' | lexicon}</p>
								</div>
								<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
									<div class="w-full md:max-w-[290px]">
										<label class="group relative flex flex-col w-full md:max-w-[290px]">
											<input type="tel" value="{$_modx->getPlaceholder('fi.company_phone')}" name="company_phone" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_my_company_phone_ph' | lexicon}">
										</label>
									</div>
									<div class="flex items-center w-full gap-2"></div>
								</div>
							</div>
							<div class="md:flex-row md:gap-5 flex flex-col items-start">
								<div class="md:max-w-[250px] w-full">
									<p class="md:pt-2 text-base">{'poly_lang_site_my_company_site' | lexicon}</p>
								</div>
								<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
									<div class="w-full md:max-w-[290px]">
										<label class="group relative flex flex-col w-full md:max-w-[290px]">
											<input type="text" value="{$_modx->getPlaceholder('fi.company_site')}" name="company_site" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_my_company_site_ph' | lexicon}">
										</label>
									</div>
									<div class="flex items-center w-full gap-2"></div>
								</div>
							</div>
							<div class="md:flex-row md:gap-5 flex flex-col items-start">
								<div class="md:max-w-[250px] w-full">
									<p class="md:pt-2 text-base">{'poly_lang_site_my_company_description' | lexicon}</p>
								</div>
								<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
									<div class="flex flex-col w-full">
										<textarea name="company_description" class="border-accent focus:shadow-accent resize-none w-full p-3 transition border rounded min-h-[130px]" name="textcontent" id="text" placeholder="{'poly_lang_site_my_company_description_ph' | lexicon}">{$_modx->getPlaceholder('fi.company_description')}</textarea>
									</div>
								</div>
							</div>
							<div class="bg-graySecond w-full h-px"></div>
						</div>
						<div class="flex flex-col gap-4">
							<p class="text-graySemiDark text-sm">{'poly_lang_site_my_company_alias_info' | lexicon}</p>
							<div class="md:flex-row md:gap-5 flex flex-col items-start">
								<div class="md:max-w-[250px] w-full">
									<p class="md:pt-2 text-base">{'poly_lang_site_my_company_alias' | lexicon}</p>
								</div>
								<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
									<div class="flex flex-col w-full">
										<label class="group sm:flex-row relative flex flex-col items-center w-full">
											<p class="border-accent sm:w-max bg-accent bg-opacity-10 sm:border-r-0 sm:rounded-l sm:border-b block w-full px-3 py-2 border border-b-0">{$_modx->config['site_url']}shop/</p>
											<input type="text" required value="{$_modx->getPlaceholder('fi.company_alias')}" name="company_alias" class="border-accent focus:shadow-accent sm:rounded-r w-full px-3 py-2 transition border" placeholder="{'poly_lang_site_my_company_alias_ph' | lexicon}">
										</label>
										{if $_modx->getPlaceholder('fi.error.company_alias')}
                    						<div class="flex ml-3.5 mt-1 items-center">
                    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
                    							<p class="text-red ml-2">{$_modx->getPlaceholder('fi.error.company_alias')}</p>
                    						</div>
                						{/if}
									</div>
								</div>
							</div>
						</div>
						<button class="bg-accent hover:bg-accentDarken w-48 py-2 text-sm text-white uppercase transition rounded" type="submit" name="company_update" value="1">{'poly_lang_site_evac_create_save_button' | lexicon}</button>
					</form>
				</div>
			</div>
		</div>
	</section>
</main>
{/block}
{block 'scripts'}
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>
<script src="/new-site/libs/select2/select2.min.js"></script>
<script src="/new-site/libs/dropzone/dropzone.min.js"></script>
<script src="/new-site/js/scripts.min.js"></script>
{ignore}
    <script>
        $("[type='tel']").mask("+38 (099) 999-99-99");
        $(document).on('change', '[name="company_logo"],[name="company_image"]', function() {
            var parent = $(this).parents('.file_input');
            parent.find(".error-format").removeAttr('style');
            parent.find(".error-size").removeAttr('style');
            
            var formData = new FormData();
            var file = $(this)[0].files[0];
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            
            if (!allowedExtensions.exec(file.name)) {
                parent.find(".error-format").css('color', 'red');
                return false;
            }
            if(file.size > 5 * 1024 * 1024) {
                parent.find(".error-size").css('color', 'red');
                return false; 
            }
            
            formData.append('image', file);
            formData.append('type', $(this).attr('name'));
            formData.append('action', 'company/images');
            
            $.ajax({
                url : '/new-site/assets/user/connector.php',
                type : 'POST',
                data : formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                success : function(data) {
                   // Image preview
                    data = jQuery.parseJSON(data);
                    $('[name="' + data.type + '_path"]').val(data.path);
                    $('[name="' + data.type + '"]').next().find('img').prop('src', data.path + '?v=' + $.now());
                    
                }
            });
        })
    </script>
{/ignore}
{/block}
