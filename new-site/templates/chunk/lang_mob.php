{foreach $languages as $key => $language}
    <a href="{$language.link}" class="polylang-item mr-10 flex flex-col items-center">
		<span class="flex items-center justify-center p-4 border-gray bg-grayLight rounded-full mb-2">
			<img src="new-site/img/{if $language.culture_key == 'ru'}russia{else}ukraine{/if}.svg" width="22" height="19" aria-hidden="true" alt="" />
		</span>
		<span>{$language.name}</span>
	</a>
{/foreach}
