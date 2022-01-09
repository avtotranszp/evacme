<div id="deleteAccount" style="display: none" class="popup bg-dark bg-opacity-70 fixed inset-0 z-30 flex items-center justify-center">
	<form action="{$_modx->resource.id | url}" method="post" id="deleteUserForm">
    	<div class="popup__wrapper relative w-full p-4 bg-white rounded shadow-md" style="max-width: 600px">
    		<button type="button" class="modalClose bg-dark hover:opacity-100 top-3 right-3 opacity-70 absolute flex items-center justify-center transition transform rounded cursor-pointer">
    			<svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
    				<path d="M24 8L8 24M8 8l16 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    			</svg>
    		</button>
    		<div class="popup__inner w-full">
    			<div class="flex flex-col space-y-4">
    				<p class="text-2xl font-bold">{'poly_lang_site_settings_delete_tab' | lexicon}</p>
    				<p class="text-base">{'poly_lang_site_settings_delete_message' | lexicon}</p>
    				<div class="flex items-center gap-4">
    					<button type="submit" name="delete-user" value="1" class="delete_button bg-second hover:bg-secondDarken flex-shrink-0 p-2 text-white transition rounded">{'poly_lang_site_settings_delete_submit' | lexicon}</a>
    					<button type="button" class="delete_button modalClose bg-accent hover:bg-accentDarken flex-shrink-0 p-2 text-white transition rounded">{'poly_lang_site_settings_delete_cancel' | lexicon}</a>
    				</div>
    			</div>
    		</div>
    	</div>
	</form>
</div>