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
				{'personal_balance' | chunk}
			</div>
			<p class="text-graySemiDark">{$_modx->resource['introtext']}</p>
		</div>

		<div class="container px-4 mx-auto">
			<div class="lg:flex-row relative flex flex-col justify-between">
				
				{'account_menu' | chunk}

				<div class="lg:ml-8 flex flex-col w-full gap-5">
					{$_modx->runSnippet('!getUserReviews')}
				
[[-
					<form action="/" class="sm:flex-row flex items-center justify-between w-full">
						<div class="md:w-max flex w-full gap-4">
							<label class="group relative custom-width flex flex-col max-w-[600px]">
								<select name="review_filter" id="documents" data-placeholder="Выберите рубрику" class="select default-select2">
									<option value="show_all">{'poly_lang_site_private_reviews_filter_show_all' | lexicon}</option>
									<option value="show_positive">{'poly_lang_site_private_reviews_filter_show_positive' | lexicon} ({$_modx->getPlaceholder('count_positive')})</option>
									<option value="show_negative">{'poly_lang_site_private_reviews_filter_show_negative' | lexicon} ({$_modx->getPlaceholder('count_negative')})</option>
								</select>
							</label>
						</div>
					</form>
]]
					<div id="firstTab" class="tab-content-block flex flex-col gap-4">
						<div id="reviews_body">
						    {$_modx->getPlaceholder('reviews_body')}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

{/block}
{block 'scripts'}
<script src="/new-site/libs/select2/select2.min.js"></script>
{ignore}
    <script>
        $('.review .rating').each(function(index, el) {
            let rating = $(el).attr('data-rating') - 1;
            $(el).find('span').each(function(i, element) {
                if(i <= rating) {
                    $(element).addClass('rating-star--checked');
                }
            });
        })
        $('.comment-reply').click(function(e) {
            e.preventDefault();
            $('#replyToComment').show();
            $('#replyToComment [name="thread"]').val('resource-' + $(this).data('resource'));
            $('#replyToComment [name="parent"]').val($(this).data('id'));
        })
        $('select[name="review_filter"]').change(function(){
            $.ajax({
                type: 'POST',
                context: $('#reviews_body'),
                url: '/new-site/assets/user/connector.php',
                data: {action: 'reviews/filter', filter: $(this).val()},
                success: function(response) {
                    response = JSON.parse(response);
                    if(response.status) {
                       $(this).html(response.body);
                    }
                    
                    $('.review .rating').each(function(index, el) {
                        let rating = $(el).attr('data-rating') - 1;
                        $(el).find('span').each(function(i, element) {
                            if(i <= rating) {
                                $(element).addClass('rating-star--checked');
                            }
                        });
                    })
                    
                }
            });
        })
        
    </script>
{/ignore}
{/block}
