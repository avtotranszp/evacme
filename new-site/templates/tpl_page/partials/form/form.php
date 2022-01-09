<form method="POST" id="feedback-form">
    <div class="flex flex-col mb-5 w-full">
        <label class="group flex flex-col relative mb-1">
            <img src="new-site/img/mail.svg" class="absolute top-1/2 transform -translate-y-1/2 left-3 opacity-70" width="20" height="20" aria-hidden="true" alt="" />
            <input required name="email" type="email" class="p-3 pl-12 border border-accent rounded transition focus:shadow-accent" placeholder="Ваш email" />
        </label>
        <div class="flex items-center ml-3.5 hidden">
            <img src="new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
            <p class="text-red ml-2">{'fi.error.email' | placeholder}</p>
        </div>
    </div>

    <div class="flex flex-col mb-5 w-full">
        <label class="group flex flex-col relative mb-1">
            <img src="new-site/img/user.svg" class="absolute top-1/2 transform -translate-y-1/2 left-3 opacity-70" width="20" height="20" aria-hidden="true" alt="" />
            <input required name="name" type="text" class="p-3 pl-12 border border-accent rounded transition focus:shadow-accent" placeholder="{'poly_lang_site_your_name' | lexicon}" />
        </label>
        <div class="flex items-center ml-3.5 hidden">
            <img src="new-site/img/stop.svg" class="flex-shrink-0" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
            <p class="text-red ml-2">{'fi.error.name' | placeholder}</p>
        </div>
    </div>
    
    <div class="mb-5">
        <div>
            <textarea name="comment" id="message" cols="30" rows="10" class="p-3 w-full border border-accent rounded transition focus:shadow-accent resize-none" placeholder="{'poly_lang_site_your_message' | lexicon}"></textarea>
        </div>
        <div class="flex ml-3.5 hidden">
            <img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
            <p class="text-red ml-2">{'fi.error.comment' | placeholder}</p>
        </div>
    </div>
    
    <div>
        <div>
            <button class="mb-5 mx-auto bg-accent text-white uppercase rounded w-72 py-4 transition hover:bg-accentDarken" type="button">{'poly_lang_site_callback_add_file_text' | lexicon}</button>
            <input class="hidden" type="file" name="upload">
        </div>
        <div class="flex ml-3.5 hidden">
            <img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" aria-hidden="true" alt="" />
            <p class="text-red ml-2">{'fi.error.files' | placeholder}</p>
        </div>
    </div>

    <button class="mb-8 mx-auto mt-8 bg-accent text-white uppercase rounded w-72 py-4 transition hover:bg-accentDarken" type="submit">{'poly_lang_site_form_send' | lexicon}</button>
</form>