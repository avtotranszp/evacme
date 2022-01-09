{extends 'file:layouts/main.php'}

{block 'content'}
{'!isNotLoginIn' | snippet : ['redirectTo' => 84]}
<main class="flex-grow flex-shrink-0 relative">
	<div class="mx-auto py-12 px-4 md:w-1/2 flex flex-col items-center">
		<h1 class="mb-12 text-3xl text-center font-bold">{$res.pagetitle}</h2>
		{'!ForgotPassword' | snippet : [
			'resetResourceId' => 3798,
			'loginResourceId' => 3781,
			'tpl'             => 'mylgnForgotPassTpl',
			'sentTpl'         => 'mylgnForgotPassSentTpl',
			'emailTpl'        => 'mylgnForgotPassEmail',
			'emailSubject'    => 'Восстановление пароля',
			'errTpl'          => 'mylgnErrTpl'
		]}
		
	</div>
</main>
{/block}