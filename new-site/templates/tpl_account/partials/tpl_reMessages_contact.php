<div class="thread_wrap media {$identifier} message_item flex p-4 space-x-3 bg-white rounded shadow-md" data-identifier="{$identifier}">
    {if $photo}
        <div class="flex-shrink-0">
            <img src="{$photo | phpthumbon : 'w=60&h=60&zc=1'}" class="w-10 h-10 rounded-full" alt="{$fullname | Jevix}">
        </div>
    {else}
        <div class="flex-shrink-0">
            <img src="new-site/img/profile.svg" class="w-10 h-10 rounded-full" width="60" height="60" alt="{$fullname | Jevix}">
        </div>
    {/if}
    <div class="flex flex-col w-full">
        <div class="text-sm">
            <div class="font-medium text-gray-900 message_name">
                {$fullname | Jevix | ellipsis : 50}
                {if $count}
                    <div class="float-right">
                        <span class="new_messages_count right-2 top-1/2 bg-second px-2 py-1 text-xs text-white -translate-y-1/2 rounded">{$count}</span>
                    </div>
                {/if}
            </div>
        </div>
        
        <div class="mt-1 text-sm text-gray-700">
            <div class="line-clamp-2 min-h-[40px] message_content">
                {if $createdby == $_modx->user.id}<span class="text-muted">{'remessages_you' | lexicon}:</span>{/if}
                {$text | Jevix | striptags | reMessagesSmiles}
            </div>
        </div>
        <div class="flex justify-between w-full mt-2 space-x-2 text-sm">
            <span class="font-medium text-gray-500">{$createdon | DateAgo} {$max_createdon | DateAgo}</span>
            [[-<button type="button" data-target="viewMessage" class="view_message popup--open hover:text-accent font-medium text-gray-900 transition">{'poly_lang_site_private_message_more_details' | lexicon}</button>]]
        </div>
    </div>
</div>
