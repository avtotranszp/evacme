{extends 'file:layouts/main.php'}

{block 'content'}
<main class="flex-grow flex-shrink-0 relative">
	<div class="py-12 px-4 flex flex-col items-center">
		<img src="new-site/img/error-result.svg" width="200" height="200" role="presentation" alt="" />
		<h2 class="mb-4 mt-4 text-3xl text-center font-bold">{'poly_lang_site_404_title' | lexicon}</h2>
		<p class="text-center">{'poly_lang_site_404_desc' | lexicon}</p>
		<a href="{1 | url}" class="mb-8 mt-8 w-72 bg-accent text-white uppercase text-center rounded py-4 transition hover:bg-accentDarken">{'poly_lang_site_back_to_main' | lexicon}</a>
	</div>
</main>
{/block}

