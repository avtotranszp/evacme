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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" >
<style>.KEmoji_TollBar { display:none!important; }</style>
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
					[[-
					<div class="md:gap-10 md:justify-start sm:flex-row flex flex-col items-center justify-between gap-4 px-4 py-2 mb-5 bg-white rounded shadow-lg">
						<button data-target="reMessages" class="tab-content-btn tab-content-btn--active hover:border-accent hover:border-b-2 md:pt-0 md:pb-1 py-2 text-sm text-black transition border-b-2 border-transparent">Мои сообщения</button>
						<button data-target="message_unauthorized" class="tab-content-btn hover:border-accent hover:border-b-2 md:pt-0 md:pb-1 py-2 text-sm text-black transition border-b-2 border-transparent">Сообщения от незарегестрированны пользователей</button>
					</div>
					]]
					<div id="reMessages" class="tab-content-block flex flex-col gap-4">
					    {'!reMessages' | snippet : [
					        'tplContact' => 'tpl_reMessages_contact',
					        'tplList'    => 'tpl_reMessages_list',
					        'tplMessage' => 'tpl_reMessages_message',
					        'tplDialog'  => 'tpl_reMessages_dialog',
					    ]}
                    </div>
					
					<div id="message_unauthorized" style="display:none" class="tab-content-block flex flex-col gap-4">
					    {*
					    <form action="/" class="sm:flex-row flex items-center justify-between w-full">
    						<div class="md:flex-row md:w-max flex flex-col items-center justify-between w-full gap-4">
    							<label class="custom-width max-w-[600px]">
    								<select name="filter_messages" id="messages" class="select default-select2">
    									<option value="show_all">{'poly_lang_site_private_message_filter_show_all' | lexicon}</option>
    									<option value="show_unread">{'poly_lang_site_private_message_filter_show_unread' | lexicon}</option>
    								</select>
    							</label>
    
    							<div class="sorting flex items-center gap-3">
    								<p class="text-grayDarken text-sm">{'poly_lang_site_private_message_sorting' | lexicon}:</p>
    								<button type="button" class="hover:text-accent text-sm text-black transition active" value="date_sent:DESC">{'poly_lang_site_private_message_sorting_new' | lexicon}</button>
    								<button type="button" class="text-grayDarken hover:text-accent text-sm transition" value="date_sent:ASC">{'poly_lang_site_private_message_sorting_old' | lexicon}</button>
    							</div>
    						</div>
    					</form>
					    *}
						<div id="message_body" class="flex flex-col gap-4">
    						{$_modx->runSnippet('!getUserMessages', [
    						    'tpl' => 'tpl_message_item',
    						    'sortBy' => ['date_sent', 'DESC'],
    						])}
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<div id="viewMessage" style="display: none" class="popup bg-dark bg-opacity-70 fixed inset-0 z-30 flex items-center justify-center">
		<div class="popup__wrapper relative w-full p-4 bg-white rounded shadow-md" style="max-width: 600px">
			<button class="modalClose bg-dark hover:opacity-100 top-3 right-3 opacity-70 absolute flex items-center justify-center transition transform rounded cursor-pointer">
				<svg width="32" height="32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M24 8L8 24M8 8l16 16" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
				</svg>
			</button>
			<div class="popup__inner w-full">
				<div class="flex flex-col space-y-4">
					<p class="message_name_popup text-2xl font-bold"></p>
					<p class="message_content_popup text-base"></p>
				</div>
			</div>
		</div>
	</div>
</main>
{/block}
{block 'scripts'}
<script src="/new-site/libs/select2/select2.min.js"></script>
<script src="/new-site/libs/dropzone/dropzone.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/new-site/js/scripts.min.js"></script>
{ignore}
    <script>
        $('.sorting button').click(function(e){
            $('.sorting button').addClass('text-grayDarken');
            $('.sorting button').removeClass('active');
            
            $(this).removeClass('text-grayDarken');
            $(this).addClass('active');
            filterMessage();
        })
        
        $('.select[name="filter_messages"]').change(function(){
            filterMessage();
        })
        
        $("#message_body").on("click",".view_message", function(){
            var item = $(this).parents('.message_item');
            $('.message_name_popup').text($(item).find('.message_name').text());
            $('.message_content_popup').text($(item).find('.message_content').text());
            if($(item).data('read') == 0) {
               $.ajax({
                    type: 'POST',
                    context: $('#accountMenu'),
                    url: '/new-site/assets/user/connector.php',
                    data: {action: 'message/unread', item: $(item).data('id')},
                    success: function(response) {
                        response = JSON.parse(response);
                        if(response.status) {
                           $('.select[name="filter_messages"]').trigger('change');
                           if(response.body > 0) {
                               $(this).find('.new_messages_count').text(response.body);    
                           }else {
                               $(this).find('.new_messages_count').hide();
                           }
                        }
                    }
                }); 
            }
        });
        function filterMessage(){
            $.ajax({
                type: 'POST',
                context: $('#message_body'),
                url: '/new-site/assets/user/connector.php',
                data: {
                    action: 'message/filter',
                    filter: $('.select[name="filter_messages"]').val(),
                    sort: $('.sorting .active').val()},
                success: function(response) {
                    response = JSON.parse(response);
                    if(response.status) {
                       $(this).html(response.body);
                    }
                }
            });
        }
    </script>
{/ignore}
{/block}
