<div class="flex flex-col gap-2 p-6 bg-white rounded shadow-md">
	<p class="border-graySecond text-lg font-bold border-b">
	 {if $data['type'] == 'refill' || $data == ''}
	     {'poly_lang_site_private_payment_type_refill' | lexicon}
	 {else}
	     {'poly_lang_site_private_payment_type_advertising' | lexicon}
	 {/if}
	    
	 </p>
	<p class="font-bold">{'poly_lang_site_private_payment_date' | lexicon}: <span class="font-normal">{$createdon}</span></p>
	<p class="font-bold">{'poly_lang_site_private_payment_price' | lexicon}: <span class="font-normal">{$subtotal} грн</span></p>
	<p class="font-bold">{'poly_lang_site_private_payment_status' | lexicon}: <span class="font-normal">
	   {if $status == 1}
	        {'poly_lang_site_private_payment_status_success' | lexicon}
	   {else}
	        {'poly_lang_site_private_payment_status_fail' | lexicon}
	   {/if}
	</span></p>
</div>