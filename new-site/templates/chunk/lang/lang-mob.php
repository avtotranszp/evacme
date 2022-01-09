{foreach $languages as $key => $language}
    {if !$language.active || ($language.active && $showActive)}
        {if $language.active}
            <span class="{$language.classes} polylang-item--{$language.culture_key} p-3 text-lg font-medium text-black uppercase bg-white rounded-sm">{$language.name}</span>
        {else}
            <a href="{$language.link}" class="{$language.classes} polylang-item--{$language.culture_key} text-lg text-black uppercase">{$language.name}</a>
        {/if}
    {/if}
{/foreach}