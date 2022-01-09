{foreach $languages as $key => $language}
    {if !$language.active || ($language.active && $showActive)}
        {if $language.active}
            <span class="{$language.classes} polylang-item--{$language.culture_key} nav-menu-link">{$language.name}</span>
        {else}
            <a href="{$language.link}" class="{$language.classes} polylang-item--{$language.culture_key} nav-menu-link">{$language.name}</a>
        {/if}
    {/if}
{/foreach}