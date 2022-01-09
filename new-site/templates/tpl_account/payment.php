{extends 'file:layouts/main.php'}
{block 'linksPrev'}
<link rel="stylesheet" href="new-site/libs/select2/select2.min.css">
<link rel="preload" as="style" href="new-site/libs/select2/select2.min.css"/>

<link rel="stylesheet" href="new-site/libs/dropzone/basic.min.css">
<link rel="preload" as="style" href="new-site/libs/dropzone/basic.min.css"/>

<link rel="stylesheet" href="new-site/libs/dropzone/dropzone.min.css">
<link rel="preload" as="style" href="new-site/libs/dropzone/dropzone.min.css"/>

<link rel="stylesheet" href="new-site/libs/fotorama/fotorama.css">
<link rel="preload" as="style" href="new-site/libs/fotorama/fotorama.css"/>
{/block}
{block 'content'}
{'!isLoggedIn' | snippet : ['redirectTo' => 3781]}
<main class="relative flex-grow flex-shrink-0">
	<section class="py-8">
		<div class="container flex flex-col gap-2 px-4 mx-auto mb-5">
			<div class="sm:items-center flex flex-row justify-between">
				<h1 class="text-2xl font-bold text-black">{$_modx->resource['pagetitle']}</h1>
			</div>
			<p class="text-graySemiDark">{$_modx->resource['introtext']}</p>
		</div>

		<div class="container px-4 mx-auto">
			<div class="lg:flex-row relative flex flex-col justify-between">
                {'account_menu' | chunk}
				<div class="lg:ml-8 flex flex-col w-full gap-5">
					<div class="flex flex-col gap-4">
						<form id="refill" class="sm:justify-start sm:flex-row sm:items-center flex flex-col justify-between gap-4">
							<p class="text-base">{'poly_lang_site_private_payment_personal_balance' | lexicon}: <span class="font-medium">{$_modx->user['extended']['balance'] ? $_modx->user['extended']['balance'] : 0} грн</span></p>
							<label class="group tab:max-w-[120px] flex flex-col">
								<input type="text" pattern="\d*" name="price" class="border-accent focus:shadow-accent p-2 text-sm transition border rounded" placeholder="{'poly_lang_site_private_payment_refill_ph' | lexicon}" required />
							</label>
							<button type="submit" class="bg-second hover:bg-secondDarken sm:text-left flex-shrink-0 p-2 text-center text-white transition rounded">{'poly_lang_site_private_payment_refill_submit' | lexicon}</button>
						</form>
						<p class="text-sm">{'poly_lang_site_private_payment_info' | lexicon}</p>
					</div>
					<div class="bg-graySecond w-full h-px"></div>
					<div id="firstTab" class="tab-content-block flex flex-col gap-4">
						{set $payment_list = $_modx->runSnippet('!getUserPaymentHistory', ['tpl' => 'tpl_payment_item'])}
						
						{if $payment_list}
						    {$payment_list}
						{else}
						    <p class="text-graySemiDark p-10 text-2xl font-medium text-center">{'poly_lang_site_private_payment_empty_list' | lexicon}</p>
						{/if}
						
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
{/block}
{block 'scripts'}
<script src="/new-site/libs/select2/select2.min.js"></script>
<script src="/new-site/libs/dropzone/dropzone.min.js"></script>
<script src="/new-site/js/scripts.min.js"></script>

{ignore}
    <script>
        $('#refill').submit(function(e){
            e.preventDefault();

            $.ajax({
        		url: 'new-site/assets/add-evac/assets/connector.php',
        		type: "POST",
        		cache: false,
        		data: {action: 'order/refill', price: $(this).find('input').val()},
        		beforeSend: function(){				
        			$(this).find('button').prop("disabled", true);
        		},
        
        		success: function(data) {
        				data = JSON.parse(data);
        				if(data.success) {
        					$(body).append(data.data.form);
        					setTimeout(() => {
        						$('#liqpay').submit();
        					}, 1)
        				}
        		},
        		
        		complete: function(){
        			$(this).find('button').removeAttr("disabled");
        		}
        	});
        })
        
    </script>
{/ignore}
{/block}
