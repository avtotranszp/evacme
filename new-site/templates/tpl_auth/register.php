{extends 'file:layouts/main.php'}

{block 'content'}
{'!isNotLoginIn' | snippet : ['redirectTo' => 84]}
<main class="flex-grow flex-shrink-0 relative">
	<div class="mx-auto py-12 px-4 md:w-1/2 flex flex-col items-center">
		<h2 class="mb-12 text-3xl text-center font-bold">{$res.pagetitle}</h2>
		{'!AjaxForm' | snippet : [
			'activation'			 => 1,
			'activationEmailSubject' => 'Активация учетной записи',
			'snippet' 				 => 'custRegister',
			'form' 					 => 'tpl.register.form',
			'submitVar'              => 'signup-btn',
			'usergroups' 			 => 'Users',
			'usernameField' 		 => 'email',
			'validate' 				 => '
				nospam:blank,
				password:required:minLength=^6^,
				email:required:email',
			'placeholderPrefix'      => 'reg.',
			'jsonResponse'           => true,
			'activationResourceId'   => 3820
		]}
		
		<p class="text-center text-grayDarken mb-3">{'poly_lang_site_login_ouath' | lexicon}</p>
		<div class="flex items-center justify-center mb-6">
    		{'!HybridAuth' | snippet : [
    			'groups'      => 'Users:1',
    			'providerTpl' => '@FILE tpl_auth/partials/hybridauth/providerTpl.php',
    			'loginTpl'    => '@FILE tpl_auth/partials/hybridauth/loginTpl.php',
    			'providers'   => 'Facebook,Google',
    		]}
		</div>

		<p class="text-center text-grayDarken mb-2">{'poly_lang_site_have_account' | lexicon}</p>
		<div class="flex flex-col items-center justify-center">
			<a href="{3781 | url}" class="mb-2 border-b hover:text-accent transition">{'poly_lang_site_login_button' | lexicon}</a>
			<a href="{3783 | url}" class="border-b hover:text-accent transition">{'poly_lang_site_lost_pass' | lexicon}</a>
		</div>
		
	</div>
</main>
{/block}

{block 'scripts'}
{ignore}
<script>
    $(document).on('af_complete', function(event, response){
    	if(response.success) {
    		window.location = $('[name="redirectUrl"]').val();
    	}

    	for(var prop in response.errors) {
    		$('#regForm [name="'+prop+'"]').parent().next().removeClass('hidden').find('p').text(response.errors[prop])
    	}
    });
</script>
{/ignore}
{/block}