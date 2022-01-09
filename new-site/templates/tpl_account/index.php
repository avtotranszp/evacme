{extends 'file:layouts/main.php'}

{block 'content'}
{'!isLoggedIn' | snippet : ['redirectTo' => 3781]}
<main class="flex-grow flex-shrink-0 relative">
	<section class="py-8">
	    <div class="container flex flex-col gap-2 px-4 mx-auto mb-5">
			<div class="sm:items-center flex flex-row justify-between">
				<h1 class="text-2xl font-bold text-black">{$_modx->resource['pagetitle']}</h1>
				{'personal_balance' | chunk}
			</div>
			<p class="text-graySemiDark">{$_modx->resource['introtext']}</p>
		</div>
		<div class="container mx-auto px-4">

			<div class="flex flex-col lg:flex-row justify-between relative">
				{'account_menu' | chunk}

				<div class="flex flex-col w-full lg:ml-8">
					<div class="flex flex-col">
						<div class="mb-6 flex flex-col">
							<h2 class="mb-3 md:mb-4 text-2xl md:text-3xl font-bold">{'poly_lang_site_account_evac' | lexicon}</h2>
	                			{set $result = '!msProducts' | snippet : [
	                				'parents' => 2,
	                				'limit'   => 4,
	                				'where'   => '{"createdby": ' ~ $_modx->user.id ~ ' }',
								    'sortby'  => [
								        'vipuntil' => 'DESC',
								        'id'       => 'DESC',
								    ],
								    'tpl'           => '@FILE tpl_account/partials/evac-card.php',
								    'includeImages' => true,
	                			]}

	                			{if $result}
	                				{$result}
	                			{else}
	                				<p class="mb-2 text-xs md:text-base">{'poly_lang_site_account_evac_empty' | lexicon}</p>
	                			{/if}

								{if $result}
									<div class="flex flex-col sm:flex-row justify-center items-center">
	                					<a href="{3792 | url}" class="text-center sm:text-left w-full mb-2 sm:mb-0 sm:w-max sm:mr-4 hover:bg-accentDarken bg-accent px-4 py-4 sm:py-2 text-white rounded">{'poly_lang_site_account_all_evac' | lexicon}</a>
										<a href="{87 | url}" class="text-center sm:text-left w-full sm:w-max hover:bg-secondDarken bg-second px-4 py-4 sm:py-2 text-white rounded">{'poly_lang_site_header_add_evac' | lexicon}</a>
									</div>
								{else}
									<div class="flex self-center md:self-start">
										<a href="{87 | url}" class="hover:bg-secondDarken bg-second transition px-4 py-2 text-white rounded">{'poly_lang_site_header_add_evac' | lexicon}</a>
									</div>
	                			{/if}
								
							
						</div>
						{*
						<div class="mb-6 flex flex-col">
							<h2 class="mb-3 md:mb-4 text-2xl md:text-3xl font-bold">Ваши объявления</h2>
							
							{'!pdoResources' | snippet : [
                				'class'   => 'Records',
                				'limit'   => 4,
							    'sortby'  => [
							        'id'       => 'DESC',
							    ],
						        'where' => [
							        'createdby' => $_modx->user.id,
							    ],
							    'tpl'     => '@FILE tpl_account/partials/ads-card.php'
                			]}
							
							<div class="flex flex-col sm:flex-row justify-center items-center">
								
								<a href="#!" class="text-center sm:text-left w-full mb-2 sm:mb-0 sm:w-max sm:mr-4 hover:bg-accentDarken bg-accent px-4 py-4 sm:py-2 text-white rounded">Все мои объявления</a>
								<a href="#!" class="text-center sm:text-left w-full sm:w-max hover:bg-secondDarken bg-second px-4 py-4 sm:py-2 text-white rounded">Добавить объявления</a>
								
							</div>
						</div>
						*}
				</div>
			</div>
		</div>
	</section>
</main>
{/block}

