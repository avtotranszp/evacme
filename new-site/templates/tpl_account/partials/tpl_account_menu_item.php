


<a href="{$link}" class="{$classnames} lg:text-base lg:px-4 hover:bg-bg border-graySecond relative flex items-center w-full gap-2 px-2 py-2 text-sm transition border-b">
    <svg width="18" height="18" fill="currentColor">
        <use xlink:href="{$attributes}"></use>
    </svg>
    <span>{$menutitle}</span>
    {if $id == 3917}
        <div class="new_messages_count right-2 top-1/2 bg-second absolute text-xs text-white -translate-y-1/2 rounded reMessages_total"></div>
    {/if}
</a>
{if $idx == 6}
<a href="{3781 | url : ['schema' => 'full'] : ['service' => 'logout']}" class="lg:text-base lg:px-4 hover:bg-bg border-graySecond relative flex items-center w-full gap-2 px-2 py-2 text-sm transition border-b">
    <span>{'poly_lang_site_account_exit' | lexicon}</span>
</a>
{/if}
