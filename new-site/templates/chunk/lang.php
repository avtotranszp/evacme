{foreach $languages as $key => $language}
    {if !$language.active || ($language.active && $showActive)}
        {if $language.active}
            <span class="{$language.classes} polylang-item--{$language.culture_key} text-white hover:text-second transition mr-2 hidden md:block">{$language.name}</span>
        {else}
            <a href="{$language.link}" class="{$language.classes} polylang-item polylang-item--{$language.culture_key} text-white hover:text-second transition mr-2 hidden md:block">{$language.name}</a>
        {/if}
    {/if}
{/foreach}