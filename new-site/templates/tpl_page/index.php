{extends 'file:layouts/main.php'}

{block 'content'}
<main class="flex-grow flex-shrink-0 relative">
	<section class="py-8">
		<div class="container mx-auto px-4">

			<div class="flex flex-col lg:flex-row justify-between relative">
				<div class="flex flex-col w-full">
					<h1 class="text-2xl lg:text-4xl mb-4 lg:mb-0 font-bold">{$res.pagetitle}</h1>

					<div class="flex flex-col">
						<div class="flex flex-col md:rounded md:shadow-2xl md:p-4 text-editor-content">
							{$res.content}
						</div>
					</div>
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
{/block}

