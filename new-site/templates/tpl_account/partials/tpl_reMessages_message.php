<li class="message_wrap media {if $visit < $createdon}unread{/if}" data-id="{$id}">
    <span>
        {if $photo}
            <img src="{$photo | phpthumbon : 'w=60&h=60&zc=1'}" class="author_photo mr-3" alt="{$fullname | Jevix}">
        {else}
            <img src="new-site/img/profile.svg" class="author_photo mr-3" width="60" height="60" alt="{$fullname | Jevix}">
        {/if}
    </span>
    <div class="media-body">
        <div class="message_header">
            <div class="float-right">
                <span class="reply_btn"><i class="fa fa-reply" aria-hidden="true"></i></span>
            </div>
            <span class="author_name text-primary">{$fullname | Jevix | ellipsis : 50}</span>
            <span class="thread_date text-muted">{$createdon}</span>
        </div>
        {if $reply_text}
            <blockquote>
                <b>{$reply_author}</b><br>
                {$reply_text | Jevix | reMessagesSmiles}
            </blockquote>
        {/if}
        <div class="message_text">
            {$text | Jevix | reMessagesSmiles}
        </div>
    </div>
</li>