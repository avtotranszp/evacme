<div class="relative flex items-start gap-3 p-4 bg-white rounded shadow-lg review">
	<div class="relative flex-shrink-0">
		<img class="ring-8 ring-white flex items-center justify-center w-10 h-10 bg-gray-400 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=8&amp;w=256&amp;h=256&amp;q=80" alt="" />

		<span class="absolute -bottom-0.5 -right-1 bg-white rounded-tl px-0.5 py-px">
			<svg class="text-accent w-5 h-5" x-description="Heroicon name: solid/chat-alt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
				<path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
			</svg>
		</span>
	</div>
	<div class="flex flex-col min-w-0 gap-2">
		<div class="flex flex-col gap-1">
			<div class="text-sm">
				<div class="font-medium text-black">{$user_name}</div>
			</div>
			<p class="text-graySemiDark text-sm">{'poly_lang_site_private_reviews_published' | lexicon} {$date | date_format:"%d-%m-%Y"}</p>
			<div data-rating="{$rating}" class="flex rating">
				<span class="rating-star"></span>
				<span class="rating-star"></span>
				<span class="rating-star"></span>
				<span class="rating-star"></span>
				<span class="rating-star"></span>
			</div>
		</div>
		<p class="text-sm">{$text}</p>
		<div>
		    <a href="{$_modx->makeUrl($thread_resource)}" class="hover:bg-accentDarken bg-accent w-max px-4 py-2 text-sm text-white transition rounded">{'poly_lang_site_private_reviews_link' | lexicon}</a>
	    	<a href="{$_modx->makeUrl($thread_resource)}#comment-{$id}" class="hover:bg-accentDarken bg-accent w-max px-4 py-2 text-sm text-white transition rounded">{'poly_lang_site_reply_text' | lexicon}</a>
		</div>
	</div>
</div>