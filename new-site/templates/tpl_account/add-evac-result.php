{extends 'file:layouts/main.php'}

{block 'content'}
{'!isLoggedIn' | snippet : ['redirectTo' => 3781]}

<main class="flex-grow flex-shrink-0 relative">
	<section class="py-8">
		<div class="container mx-auto px-4">

			<div class="py-4 px-4 flex flex-col items-center">
				<img src="new-site/img/reg-result.svg" width="200" height="200" role="presentation" alt="" />
				<h2 class="mb-4 mt-4 text-3xl text-center font-bold">{if $.get.updated?}{'poly_lang_site_evac_update_success' | lexicon}{else}{'poly_lang_site_evac_add_success' | lexicon}{/if}</h2>
				<p class="text-center font-medium">{'poly_lang_site_evac_ads' | lexicon}</p>
				<div class="flex self-center justify-center flex-wrap mt-8">
					<a href="{444 | url : ['schema' => 'full'] : ['id' => $.get.id]}" class="w-full md:w-max md:mr-2 mb-2 text-center hover:bg-secondDarken bg-second transition px-8 py-4 text-white rounded">{'poly_lang_site_evac_promotion' | lexicon}</a>
					<a href="{$.get.id | url}" class="w-full md:w-max md:mr-2 mb-2 text-center hover:bg-accentDarken bg-accent transition px-8 py-4 text-white rounded">{'poly_lang_site_evac_show' | lexicon}</a>
					<a href="{3792 | url}" class="w-full md:w-max md:mr-2 mb-2 text-center hover:bg-accentDarken bg-accent transition px-8 py-4 text-white rounded">{'poly_lang_site_back_to_account' | lexicon}</a>
				</div>
			</div>

		</div>
	</section>
</main>
{/block}
