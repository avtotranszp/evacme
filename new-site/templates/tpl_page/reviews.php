{extends 'file:layouts/main.php'}
{block 'linksPrev'}
<link rel="stylesheet" href="new-site/libs/select2/select2.min.css">
<link rel="preload" as="style" href="new-site/libs/select2/select2.min.css"/>

<link rel="stylesheet" href="new-site/libs/fotorama/fotorama.css">
<link rel="preload" as="style" href="new-site/libs/fotorama/fotorama.css"/>
<style>
    .comment-item {
        margin-bottom: 15px;
    }
</style>
{/block}
{block 'content'}
<main class="relative flex-grow flex-shrink-0">
	<section class="py-8">
		<div class="container px-4 mx-auto">
			<div class="lg:flex-row relative flex flex-col justify-between">
				<!-- Левая колонка -->
				<div class="flex flex-col w-full">
					<div class="flex flex-col p-4 rounded shadow-md">
						<h1 class="mb-4 text-2xl font-bold">{$res.pagetitle}</h1>
					</div>
					<div class="flex flex-col my-5 p-4 mt-4 shadow-md">
						{'ecForm' | snippet : [
					        'tplForm' => 'commentFormTplMain',
					        'allowedFields' => 'user_name,user_email,text,rating',
					        'requiredFields' => 'user_name,user_email,text,rating',
					        'tplSuccess' => '',
					        'tplNewEmailUser' => '',
					        'updateEmailSubjUser' => '',
					        'autoPublish' => 'All',
					        'thread' => 'resource-1'
					    ]}
					</div>
        			{'!ecMessages' | snippet : [
				        'tpl' => 'review.view.card',
				        'tplEmpty' => 'empty_review',
				        'tplWrapper' => 'review_wrapper',
				        'thread' => 'resource-1'
				    ]}
				</div>
				<!-- // Левая колонка -->

			</div>
		</div>
	</section>
</main>
{/block}

{block 'scripts'}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script>
$('.review .rating').each(function(index, el) {
    let rating = $(el).attr('data-rating') - 1;
    $(el).find('span').each(function(i, element) {
        if(i <= rating) {
            $(element).addClass('rating-star--checked');
        }
    });
})
</script>
{/block}