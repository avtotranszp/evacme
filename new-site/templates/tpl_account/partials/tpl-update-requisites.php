<div style="display: none" id="tab-content-payments" class="tab-content-block">
	{'!UpdateProfile' | snippet : [
	    'preHooks' => 'validatePhone',
	    'validate' => 'requisites_company_title:required,
	                   requisites_company_address:required,
	                   requisites_index:required,
	                   requisites_address:required,
	                   requisites_usreou:required,
	                   requisites_fullname:required,
	                   requisites_contacts_fullname:required,
	                   requisites_contacts_email:email:required,
	                   requisites_contacts_phone:required',
	    'submitVar' => 'update-requisites',
    ]}
	<form action="{$_modx->resource.id | url}" method="post" id="change-requisites-form">
		<div class="flex flex-col gap-4">
			<p class="text-base font-bold">{'poly_lang_site_settings_requisites' | lexicon}</p>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_company_title' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="text" required value="{$_modx->getPlaceholder('requisites_company_title')}" name="requisites_company_title" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_requisites_company_title_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('error.requisites_company_title')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.requisites_company_title')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_company_address' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="text" required value="{$_modx->getPlaceholder('requisites_company_address')}" name="requisites_company_address" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_requisites_company_address_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('error.requisites_company_address')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.requisites_company_address')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_index' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="text" required value="{$_modx->getPlaceholder('requisites_index')}" name="requisites_index" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_requisites_index_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('error.requisites_index')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.requisites_index')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_address' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="text" required value="{$_modx->getPlaceholder('requisites_address')}" name="requisites_address" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_requisites_address_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('error.requisites_address')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.requisites_address')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_usreou' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="text" required value="{$_modx->getPlaceholder('requisites_usreou')}" name="requisites_usreou" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_requisites_usreou_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('error.requisites_usreou')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.requisites_usreou')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex self-start md:self-center md:items-center max-w-[200px] w-full gap-2">
						<input type="checkbox" class="hidden" name="requisites_is_vat" checked value="0" />
						<label class="input-checkbox md:items-center flex self-start cursor-pointer">
							<input type="checkbox" class="hidden" name="requisites_is_vat" {$_modx->user['extended']['requisites_is_vat'] ? 'checked' : ''} value="1" />
							<span class="fake-checkbox flex-shrink-0 block w-5 h-5 bg-no-repeat bg-cover"></span>
							<span class="ml-2 text-sm">{'poly_lang_site_settings_requisites_is_vat' | lexicon}</span>
						</label>
					</div>
				</div>
			</div>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_tin' | lexicon}</p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="text" value="{$_modx->getPlaceholder('requisites_tin')}" name="requisites_tin" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_requisites_tin_ph' | lexicon}" />
						</label>
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_fullname' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="text" required value="{$_modx->getPlaceholder('requisites_fullname')}" name="requisites_fullname" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_requisites_fullname_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('error.requisites_fullname')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.requisites_usreou')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<p class="text-base font-bold">{'poly_lang_site_settings_requisites_contacts' | lexicon}</p>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_contacts_fullname' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="text" required value="{$_modx->getPlaceholder('requisites_contacts_fullname')}" name="requisites_contacts_fullname" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_requisites_contacts_fullname_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('error.requisites_contacts_fullname')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.requisites_contacts_fullname')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_contacts_phone' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="tel" required value="{$_modx->getPlaceholder('requisites_contacts_phone')}" name="requisites_contacts_phone" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="+38" />
						</label>
						{if $_modx->getPlaceholder('error.requisites_contacts_phone')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.requisites_contacts_phone')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<div class="flex flex-col items-start gap-1">
				<p class="text-base">{'poly_lang_site_settings_requisites_contacts_email' | lexicon} <span class="text-red">*</span></p>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[600px]">
						<label class="group relative flex flex-col w-full md:max-w-[600px]">
							<input type="text" required value="{$_modx->getPlaceholder('requisites_contacts_email')}" name="requisites_contacts_email" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_requisites_contacts_email_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('error.requisites_contacts_email')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('error.requisites_contacts_email')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			{'poly_lang_site_settings_requisites_documents_info' | lexicon}
			<label class="group relative flex flex-col max-w-[600px]">
				<select name="requisites_documents" id="documents" class="select default-select2">
					<option value="paper_originals_by_mail" {$_modx->user['extended']['requisites_documents'] == 'paper_originals_by_mail' ? 'selected' : ''} >{'paper_originals_by_mail' | lexicon}</option>
					<option value="in_time" {$_modx->user['extended']['requisites_documents'] == 'in_time' ? 'selected' : ''} >{'in_time' | lexicon}</option>
				</select>
			</label>
			<div class="bg-graySecond w-full h-px my-4"></div>
			<button class="bg-accent hover:bg-accentDarken w-48 py-2 text-sm text-white uppercase transition rounded" name="update-requisites" value="1" type="submit">{'poly_lang_site_evac_create_save_button' | lexicon}</button>
		</div>
	</form>
</div>