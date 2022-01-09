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
					<div class="md:gap-10 md:justify-start sm:flex-row flex flex-col items-center justify-between gap-4 px-4 py-2 mb-5 bg-white rounded shadow-lg">
						<button data-target="tab-content-profile" class="tab-content-btn tab-content-btn--active hover:border-accent hover:border-b-2 md:pt-0 md:pb-1 py-2 text-sm text-black transition border-b-2 border-transparent">{'poly_lang_site_settings_my_profile_tab' | lexicon}</button>
						<button data-target="tab-content-payments" class="tab-content-btn hover:border-accent hover:border-b-2 md:pt-0 md:pb-1 py-2 text-sm text-black transition border-b-2 border-transparent">{'poly_lang_site_settings_requisites_tab' | lexicon}</button>
						{if (false)}
						<button data-target="tab-content-branding" class="tab-content-btn hover:border-accent hover:border-b-2 md:pt-0 md:pb-1 py-2 text-sm text-black transition border-b-2 border-transparent">{'poly_lang_site_settings_brand_tab' | lexicon}</button>
						{/if}
						<button data-target="tab-content-password" class="tab-content-btn hover:border-accent hover:border-b-2 md:pt-0 md:pb-1 py-2 text-sm text-black transition border-b-2 border-transparent">{'poly_lang_site_settings_password_tab' | lexicon}</button>
						<button data-target="tab-content-delete" class="tab-content-btn hover:border-accent hover:border-b-2 md:pt-0 md:pb-1 py-2 text-sm text-black transition border-b-2 border-transparent">{'poly_lang_site_settings_delete_tab' | lexicon}</button>
					</div>
					
					<div class="flex flex-col p-4 bg-white rounded shadow-lg">
			    		{'tpl.update.form' | chunk}
						
						{'tpl.updateRequisites.form' | chunk}

                        {if (false)}
						{'tpl.updateBrand.form' | chunk}
						{/if}
						
						{'tpl.updatePassword.form' | chunk}
						
						<div style="display: none" id="tab-content-delete" class="tab-content-block">
							<button type="button" data-target="deleteAccount" class="popup--open bg-red hover:bg-redDarken w-70 px-6 py-4 text-sm text-white uppercase transition rounded">{'poly_lang_site_settings_delete_btn' | lexicon}</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<div id="activationInstruction" style="display: none" class="popup bg-dark bg-opacity-70 fixed inset-0 z-30 flex items-center justify-center">
		<div class="popup__wrapper relative w-full p-4 bg-white rounded shadow-md" style="max-width: 600px">
			<button class="modalClose bg-dark hover:opacity-100 top-3 right-3 opacity-70 absolute flex items-center justify-center transition transform rounded cursor-pointer">
				<svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M24 8L8 24M8 8l16 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</button>
			<div class="popup__inner w-full">
				<div class="flex flex-col space-y-4">
					<div class="flex flex-col space-y-4">
						<img src="/new-site/img/reg-result.svg" class="flex-shrink-0 mx-auto mb-4" width="200" height="200" role="presentation" alt="" />
						<p class="text-2xl font-bold text-center">Инструкции по активации успешно отправлены!</p>
					</div>
				</div>
			</div>
		</div>
	</div>
    {'!AjaxForm' | snippet : [
    	'snippet'      => 'FormIt',
    	'hooks'        => 'email',
    	'form'         => '@FILE tpl_account/partials/delete-account-form.php',
    	'emailSubject' => $_modx->lexicon('poly_lang_site_settings_mail_subject'),
    	'emailTo'      => $_modx->user['email'],
    	'emailFrom'    => 'message@evacme.com.ua',
    	'emailTpl'     => 'tpl.email-delete-user',
    	'submitVar'    => 'delete-user'
    ]}
</main>
{/block}
{block 'scripts'}
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>
<script src="/new-site/libs/select2/select2.min.js"></script>
<script src="/new-site/js/user/settings.js"></script>
<script src="/new-site/libs/dropzone/dropzone.min.js"></script>
<script src="/new-site/js/scripts.min.js"></script>
<script>
	$("[type='tel']").mask("+38 (099) 999-99-99");
	$(".messenger-link").click(function (e) {
		e.preventDefault();
		$(this).toggleClass("disabled-messenger");
		$(this).find('input').val($(this).find('input').val() == 1 ? 0 : 1)
	});
	$(".searchCity").autocomplete({
		source: '/new-site/assets/user/connector.php',
		minLength: 2,
		position: { my : "right bottom", at: "right top" }
	});
	$(document).on('af_complete', function(event, response) {
    var form = response.form;
        if (form.attr('id') == 'deleteUserForm' && response.success) {
        	var successMsg = "{'poly_lang_site_settings_delete_success' | lexicon}";
        	$('#deleteUserForm .text-base').text(successMsg);
        	$('#deleteUserForm .delete_button').remove();
        }
    });
    $('[name="phone"]').keyup((e) => {
        $('.sendSms').hide();
    })
</script>
{/block}
