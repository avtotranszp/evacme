{extends 'file:layouts/main.php'}

{block 'content'}
{'!isNotLoginIn' | snippet : ['redirectTo' => 84]}
<main class="flex-grow flex-shrink-0 relative">
	<div class="mx-auto py-12 px-4 md:w-1/2 flex flex-col items-center">
		<h1 class="mb-12 text-3xl text-center font-bold">{$res.pagetitle}</h2>
		{'!ResetPassword' | snippet : [
			'loginResourceId' => 3781,
			'tpl'             => 'mylgnResetPassTpl',
			'expiredTpl'      => 'mylgnExpiredTpl',
		]}
		
	</div>
</main>
{/block}