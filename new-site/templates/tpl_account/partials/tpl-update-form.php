<div id="tab-content-profile" class="tab-content-block">
	{'!UpdateProfile' | snippet : [
	    'preHooks'        => 'validatePhone,checkNewPhone',
	    'validate'        => 'email:email:required,fullname:required:maxLength=^24^,phone:required:minLength=^12^',
	    'excludeExtended' => 'code,avatar',
	    'submitVar'       => 'update-profile'
    ]}
    {set $check = '!checkActivatePhone' | snippet}
	{if $_modx->getPlaceholder('login.update_success')}
        <div class="alert_success border-t-4 rounded-b px-4 py-3 shadow-md mb-4" role="alert">
          <div class="flex">
              <p class="font-bold">{'poly_lang_site_settings_update_profile_success' | lexicon}</p>
          </div>
        </div>
    {/if}
    {if $.get['logcp-success']}
        <div class="alert_success border-t-4 rounded-b px-4 py-3 shadow-md mb-4" role="alert">
          <div class="flex">
              <p class="font-bold">{'poly_lang_site_settings_change_password_success' | lexicon}</p>
          </div>
        </div>
    {/if}
	<form action="[[~[[*id]]]]" method="post" id="user-settings">
		<div class="flex flex-col gap-4">
			<div class="md:flex-row md:gap-5 flex flex-col items-start">
				<div class="md:max-w-[250px] w-full">
					<p class="text-base"></p>
				</div>
				<div class="sm:flex-row md:gap-10 flex flex-col items-center w-full gap-4">
					<label>
						<input name="avatar" type="file" class="hidden" />
						<span class="hover:shadow-2xl hover:text-second relative block object-cover object-center w-20 h-20 overflow-hidden text-white transition rounded-full shadow-lg cursor-pointer">
							<img src="[[+photo:default=`/new-site/img/profile.svg`]]?v={time()}" class="object-cover w-full h-full" width="80" height="80" alt="" />
							<span class="left-1/2 bg-dark bg-opacity-60 absolute bottom-0 flex items-center justify-center w-full h-[34px] -translate-x-1/2">
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
						<p>{'poly_lang_site_settings_avatar_title' | lexicon}</p>
						<p class="error-size">{'poly_lang_site_settings_avatar_size' | lexicon}</p>
						<p class="error-format">{'poly_lang_site_settings_avatar_ext' | lexicon}</p>
					</div>
				</div>
			</div>
			<div class="md:flex-row md:gap-5 flex flex-col items-start">
				<div class="md:max-w-[250px] w-full">
					<p class="md:pt-2 text-base">{'poly_lang_site_your_name' | lexicon} <span class="text-red">*</span></p>
				</div>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[290px]">
						<label class="group relative flex flex-col w-full md:max-w-[290px]">
							<input type="text" required name="fullname" value="[[+fullname]]" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_your_name' | lexicon}" />
						</label>
						<div style="display: none" class="flex ml-3.5 mt-1">
							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
							<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
						</div>
					</div>
					<div class="flex items-center w-full gap-2"></div>
				</div>
			</div>
			<div class="md:flex-row md:gap-5 flex flex-col items-start">
				<div class="md:max-w-[250px] w-full">
					<p class="md:pt-2 text-base">E-mail <span class="text-red">*</span></p>
				</div>
				<div class="md:flex-row md:gap-5 flex flex-col w-full gap-2">
					<div class="w-full md:max-w-[290px]">
						<label class="group relative flex flex-col w-full md:max-w-[290px]">
							<input required type="email" name="email" value="[[+email]]" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="Email" />
						</label>
						<div style="[[+error.email:empty=`display:none`:notempty=``]]" class="flex ml-3.5 mt-1">
							<p class="text-red ml-2">[[+error.email]]</p>
						</div>
					</div>
					<div class="flex items-center self-start w-full gap-2">
						<img src="/new-site/img/check.svg" width="42" height="42" alt="" />
						<p class="text-sm text-green-600">{'poly_lang_site_settings_verified' | lexicon}</p>
					</div>
				</div>
			</div>
			<div class="md:flex-row md:gap-5 flex flex-col items-start">
				<div class="md:max-w-[250px] w-full">
					<p class="md:pt-2 text-base">{'poly_lang_site_evac_create_phone' | lexicon} <span class="text-red">*</span></p>
				</div>
				<div class="md:flex-row md:gap-5 flex flex-col w-full gap-2">
					<div class="w-full md:max-w-[290px]">
						<label class="group relative flex flex-col w-full md:max-w-[290px]">
							<input required type="tel" name="phone" value="[[+phone]]" class="border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_evac_create_phone' | lexicon}" />
							{if !$check}
							[[+phone:notempty=`
							<input type="text" name="code" class="border-accent focus:shadow-accent px-3 py-2 mt-2 transition border rounded hidden" placeholder="{'poly_lang_site_settings_code' | lexicon}" />
							<button data-text='Подтвердить' type="button" class="bg-second hover:bg-secondDarken flex-shrink-0 p-2 mt-2 text-center text-white transition rounded sendSms">{'poly_lang_site_settings_code_send' | lexicon}</button>
							`]]
							
						    {/if}
						</label>
						<div style="[[+error.phone:empty=`display:none`:notempty=``]]" class="flex ml-3.5 mt-1">
							<p class="text-red ml-2">[[+error.phone]]</p>
						</div>
					</div>
					[[+phone:notempty=`
					{if $check}
					<div class="flex items-center self-start w-full gap-2">
						<img src="/new-site/img/check.svg" width="42" height="42" alt="" />
						<p class="text-sm text-green-600">{'poly_lang_site_settings_verified' | lexicon}</p>
					</div>
					{else}
					<div class="flex items-center self-start w-full gap-2 verify-no">
						<img src="/new-site/img/delete.svg" width="42" height="42" alt="" />
						<p class="text-red text-sm">{'poly_lang_site_settings_verified_no' | lexicon}</p>
					</div>
					<div class="flex items-center self-start w-full gap-2 hidden verify-yes">
						<img src="/new-site/img/check.svg" width="42" height="42" alt="" />
						<p class="text-sm text-green-600">{'poly_lang_site_settings_verified' | lexicon}</p>
					</div>
					{/if}
					`]]
				</div>
			</div>
			<div class="md:flex-row md:gap-5 flex flex-col items-start">
				<div class="md:max-w-[250px] w-full">
					<p class="md:pt-2 text-base">{'poly_lang_site_city' | lexicon}</p>
				</div>
				<div class="md:flex-row md:gap-5 flex flex-col items-center w-full gap-2">
					<div class="w-full md:max-w-[290px]">
						<label class="group relative flex flex-col w-full md:max-w-[290px]">
							<input type="text" name="city" value="[[+city]]" class="searchCity border-accent focus:shadow-accent px-3 py-2 transition border rounded" placeholder="{'poly_lang_site_city' | lexicon}" />
						</label>
						<div style="display: none" class="flex ml-3.5 mt-1">
							<img src="/new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
							<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
						</div>
					</div>
					<div class="flex items-center w-full gap-2"></div>
				</div>
			</div>
			<div class="bg-graySecond w-full h-px my-4"></div>
			<div class="md:flex-row md:gap-5 flex flex-col items-start">
				<div class="md:max-w-[250px] w-full">
					<p class="md:pt-2 text-base">{'poly_lang_site_settings_messangers' | lexicon}</p>
				</div>
				<div class="md:gap-3 flex flex-col w-full gap-2">
					<div class="flex items-center w-full gap-4">
						<a href="#!" class="messenger-link flex-shrink-0 block [[+telegramm:ne=`1`:then=`disabled-messenger`]]">
							<input checked type="checkbox" class="hidden" name="telegramm" value="[[+telegramm:default=`0`]]" />
							<img src="/new-site/img/social-icons/telegram.svg" width="40" height="40" alt="" />
						</a>
						<a href="#!" class="messenger-link flex-shrink-0 block [[+whatsapp:ne=`1`:then=`disabled-messenger`]]">
							<input checked type="checkbox" class="hidden" name="whatsapp" value="[[+whatsapp:default=`0`]]" />
							<img src="/new-site/img/social-icons/whatsapp.svg" width="40" height="40" alt="" />
						</a>
						<a href="#!" class="messenger-link flex-shrink-0 block [[+{'poly_lang_site_evac_create_required' | lexicon}:ne=`1`:then=`disabled-messenger`]]">
							<input checked type="checkbox" class="hidden" name="viber" value="[[+viber:default=`0`]]" />
							<img src="/new-site/img/social-icons/viber.svg" width="40" height="40" alt="" />
						</a>
					</div>
					<p class="max-w-[500px] text-graySemiDark text-sm">{'poly_lang_site_settings_messangers_text' | lexicon}</p>
				</div>
			</div>
			<div class="bg-graySecond w-full h-px my-4"></div>
			<div class="flex flex-col gap-2">
				<label class="input-checkbox flex items-center self-start cursor-pointer">
					<input onchange="$(this).parent().next().val($(this).parent().next().val() == 0 ? 1 : 0)" [[+disable_autocomplete:is=`1`:then=`checked`]] type="checkbox" class="hidden" value="[[+disable_autocomplete:default=`0`]]" />
					<span class="fake-checkbox flex-shrink-0 block w-5 h-5 bg-no-repeat bg-cover"></span>
					<span class="ml-2 text-sm">{'poly_lang_site_settings_disable_auto_check' | lexicon}</span>
				</label>
				<input type="hidden" name="disable_autocomplete" value="[[+disable_autocomplete:default=`0`]]" />
				<label class="input-checkbox flex items-center self-start cursor-pointer">
					<input onchange="$(this).parent().next().val($(this).parent().next().val() == 0 ? 1 : 0)" [[+hide_phone:is=`1`:then=`checked`]] type="checkbox" class="hidden" value="[[+hide_phone:default=`0`]]" />
					<span class="fake-checkbox flex-shrink-0 block w-5 h-5 bg-no-repeat bg-cover"></span>
					<span class="ml-2 text-sm">{'poly_lang_site_settings_hide_phone' | lexicon}</span>
				</label>
				<input type="hidden" name="hide_phone" value="[[+hide_phone:default=`0`]]" />
			</div>
			<div class="bg-graySecond w-full h-px my-4"></div>
			<button class="bg-accent hover:bg-accentDarken w-48 py-2 text-sm text-white uppercase transition rounded" name="update-profile" value="1" type="submit">{'poly_lang_site_evac_create_save_button' | lexicon}</button>
		</div>
	</form>
</div>