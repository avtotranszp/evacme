{extends 'file:layouts/main.php'}

{block 'content'}
<main class="flex-grow flex-shrink-0 relative">
	<div class="mx-auto py-12 px-4 md:w-1/2 flex flex-col items-center">
		<h1 class="mb-12 text-3xl text-center font-bold">{$res.pagetitle}</h1>
		{'!Login' | snippet : [
			'loginTpl'      => 'fastLoginTpl',
			'errTpl'        => 'fastLoginError',
			'loginViaEmail' => true,
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

		<p class="text-center text-grayDarken mb-2">{'poly_lang_site_no_account' | lexicon}</p>
		<div class="flex flex-col items-center justify-center">
			<a href="{3782 | url}" class="mb-2 border-b hover:text-accent transition">{'poly_lang_site_reg_button' | lexicon}</a>
			<a href="{3783 | url}" class="border-b hover:text-accent transition">{'poly_lang_site_lost_pass' | lexicon}</a>
		</div>
	</div>
</main>
{'!isNotLoginIn' | snippet : ['redirectTo' => 84]}
{/block}
{block 'scripts'}
<script src="new-site/js/login.js"></script>
{/block}
