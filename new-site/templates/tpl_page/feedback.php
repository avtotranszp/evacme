{extends 'file:layouts/main.php'}

{block 'content'}
<main class="flex-grow flex-shrink-0 relative feedback-cotainer">
	<section class="py-8">
		<div class="container mx-auto px-4">
			
			<div class="flex flex-col lg:flex-row justify-between relative">
				<div class="flex flex-col w-full">
					<h1 class="text-2xl lg:text-4xl mb-6 font-bold">{$res.pagetitle}</h1>
					{'!checkSpamTime' | snippet}
	                {'!AjaxForm' | snippet : [
	                	'snippet'      => 'FormIt',
	                	'form'         => '@FILE tpl_page/partials/form/form.php',
	                	'formName'     => 'Форма обратной связи',
	                	'hooks' 	   => 'checkSpamTime,FormItSaveForm,email',
	                	'emailSubject' => 'Форма обратной связи',
	                	'customValidators' =>'formit2checkfile',
	                	'emailTo' 	   => 'spetsekspress@gmail.com',
	                	'emailFrom'    => 'no-reply@evacme.com.ua',
	                	'emailTpl'     => 'feedback.Email',
	                	'validate'     => 'name:minLength=^2^,email:email:required,comment:minLength=^10^,upload:formit2checkfile',
	                ]}
				</div>

				{'!BannerY' | snippet : [
					'positions' => 1,
					'limit'     => 1,
					'sortby'    => 'RAND()',
					'tpl'       => '@FILE chunk/banners/banner.php',
					'tplWrapper' => '@INLINE <div class="flex-shrink-0 mx-auto mt-8 lg:mt-0 lg:ml-8 sticky top-1 self-start">{$output}</div>'
				]}
			</div>
		</div>
	</section>
</main>
<main class="flex-grow flex-shrink-0 relative feedback-success hidden">
	<div class="py-12 px-4 flex flex-col items-center">
		<img src="new-site/img/reg-result.svg" width="200" height="200" aria-hidden="true" alt="" />
		<h2 class="mb-4 mt-4 text-3xl text-center font-bold">{'poly_lang_site_feedback_success' | lexicon}</h2>
		<p class="text-center font-medium">{'poly_lang_site_feedback_success_message' | lexicon}</p>
		<a href="{1 | url}" class="mb-8 mt-8 w-72 bg-accent text-white uppercase text-center rounded py-4 transition hover:bg-accentDarken">{'poly_lang_site_back_to_main' | lexicon}</a>
	</div>
</main>
{/block}
{block 'scripts'}
<script>
$(document).on('af_complete', function(event, response) {
    var form = response.form;
    if (form.attr('id') == 'feedback-form' && response.success) {
    	$('.feedback-cotainer').addClass('hidden');
  	    $('.feedback-success').removeClass('hidden');
    } else {
    	for(var prop in response.data) {
    		$('#feedback-form [name="'+prop+'"]').parent().next().removeClass('hidden').find('p').html(response.data[prop])
    	}
    }
});
</script>
{/block}
