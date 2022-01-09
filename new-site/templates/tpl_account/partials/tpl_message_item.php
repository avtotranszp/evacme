<div data-id="{$id}" data-read="{$read}" class="message_item flex p-4 space-x-3 bg-white rounded shadow-md">
    <div class="flex-shrink-0">
        <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixqx=cII20c177f&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" />
    </div>
    <div class="flex flex-col w-full">
        <div class="text-sm">
            <div class="font-medium text-gray-900 message_name">{$name} ({$email})</div>
        </div>
        <div class="mt-1 text-sm text-gray-700">
            <p class="line-clamp-2 min-h-[40px] message_content">{$message}</p>
        </div>
        <div class="flex justify-between w-full mt-2 space-x-2 text-sm">
            <span class="font-medium text-gray-500">{$date_sent}</span>
            <button type="button" data-target="viewMessage" class="view_message popup--open hover:text-accent font-medium text-gray-900 transition">{'poly_lang_site_private_message_more_details' | lexicon}</button>
        </div>
    </div>
</div>