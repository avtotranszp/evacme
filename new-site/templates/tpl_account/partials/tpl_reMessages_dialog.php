<div class="dialog_header pl-4 pr-4" data-identifier="{$identifier}">
    <div class="row pb-4">
        <div class="col-2 align-self-center text-left">
            <span class="btn btn-link pl-0 back">{'remessages_back' | lexicon}</span>
        </div>
        <div class="col-8 align-self-center text-center">
            <h4>{$fullname | Jevix}</h4>
            <p class="text-{$status == 'Online' ? 'success' : 'muted'} status_holder" data-identifier="{$identifier}">{$status}</p>
        </div>
        <div class="col-2 align-self-center text-right">
            {if $photo}
                <img src="{$photo | phpthumbon : 'w=60&h=60&zc=1'}" class="author_photo rounded-full" alt="{$fullname | Jevix}">
            {else}
                <img src="new-site/img/profile.svg" class="w-10 h-10 author_photo rounded-full" width="60" height="60" alt="{$fullname | Jevix}">
            {/if}
        </div>
    </div>
</div>
<div class="dialog_messages pl-4 pr-4">
    <ul class="list-unstyled">
        {$output}
    </ul>
</div>
<div class="dialog_form pl-4 pr-4 pt-4">
    <div class="row">
        <div class="col-2 align-self-start text-right pr-1">
            {if $_modx->user.photo}
                <img src="{$_modx->user.photo | phpthumbon : 'w=60&h=60&zc=1'}" class="author_photo rounded-full" alt="{$fullname | Jevix}">
            {else}
                <img src="new-site/img/profile.svg" class="author_photo rounded-full" width="60" height="60" alt="{$fullname | Jevix}">
            {/if}
        </div>
        <div class="col-10 align-self-start text-left pl-2">
            <form action="" class="send_message" method="post">
                <input type="hidden" name="reply" value="">
                <input type="hidden" name="files" value="[]">
                <div class="form-row">
                    <div class="form-group col-12">
                      <div class="text_preview"></div>
                      <div class="attach_preview"></div>
                      [[-<textarea name="text" class="form-control" placeholder="Введите ваше сообщение"></textarea>]]
                      <div class="form-control" id="rmMessageText" contenteditable="true"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12 text-right">
                      <input type="file" name="upload_files" multiple="multiple" accept="image/*">
                      <button type="button" class="btn btn-secondary attach_file"><span class="fa fa-paperclip"></span></button>
                      <button type="submit" class="btn btn-primary">{'remessages_send' | lexicon}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>