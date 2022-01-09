<div style="display: none" id="tab-content-password" class="tab-content-block">
    
    {$_modx->runSnippet('!ChangePassword', [
        'submitVar' => 'change-password',
        'placeholderPrefix' => 'cp.',
        'validateOldPassword' => 1,
        'reloadOnSuccess' => 1,
        'successMessage' => $_modx->lexicon('poly_lang_site_settings_change_password_success')
    ])}
	<form action="{$_modx->resource.id | url}" method="post" id="change-password-form">
		<div class="flex flex-col gap-4">
			<p class="text-graySemiDark mb-2 text-sm">{'poly_lang_site_settings_change_password_info' | lexicon}</p>

			<div class="md:flex-row flex flex-col items-start gap-1 mb-4">
				<div class="md:max-w-[210px] w-full">
					<p class="md:pt-2 text-base">{'poly_lang_site_settings_old_password' | lexicon} <span class="text-red">*</span></p>
				</div>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[500px]">
						<label class="group relative flex flex-col w-full md:max-w-[500px]">
							<input type="password" required name="password_old" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_old_password_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('cp.error.password_old')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('cp.error.password_old')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<div class="md:flex-row flex flex-col items-start gap-1">
				<div class="md:max-w-[210px] w-full">
					<p class="md:pt-2 text-base">{'poly_lang_site_settings_new_password' | lexicon} <span class="text-red">*</span></p>
				</div>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[500px]">
						<label class="group relative flex flex-col w-full md:max-w-[500px]">
							<input type="password" required name="password_new" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_new_password_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('cp.error.password_new')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('cp.error.password_new')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>
			<div class="md:flex-row flex flex-col items-start gap-1">
				<div class="md:max-w-[210px] w-full">
					<p class="md:pt-2 text-base">{'poly_lang_site_settings_new_confirm_password' | lexicon} <span class="text-red">*</span></p>
				</div>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[500px]">
						<label class="group relative flex flex-col w-full md:max-w-[500px]">
							<input type="password" required name="password_new_confirm" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_settings_new_confirm_password_ph' | lexicon}" />
						</label>
						{if $_modx->getPlaceholder('cp.error.password_new_confirm')}
    						<div class="flex ml-3.5 mt-1 items-center">
    							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
    							<p class="text-red ml-2">{$_modx->getPlaceholder('cp.error.password_new_confirm')}</p>
    						</div>
						{/if}
					</div>
					<div class="flex items-center max-w-[200px] w-full gap-2"></div>
				</div>
			</div>

			<div class="bg-graySecond w-full h-px my-4"></div>
			<button class="bg-accent hover:bg-accentDarken w-48 py-2 text-sm text-white uppercase transition rounded" type="submit" name="change-password" value="1">{'poly_lang_site_evac_create_save_button' | lexicon}</button>
		</div>
	</form>
</div>