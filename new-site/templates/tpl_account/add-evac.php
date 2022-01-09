{extends 'file:layouts/main.php'}
{block 'linksPrev'}
<link rel="stylesheet" href="new-site/libs/select2/select2.min.css">
<link rel="preload" as="style" href="new-site/libs/select2/select2.min.css"/>

<link rel="stylesheet" href="new-site/libs/dropzone/basic.min.css">
<link rel="preload" as="style" href="new-site/libs/dropzone/basic.min.css"/>

<link rel="stylesheet" href="new-site/libs/dropzone/dropzone.min.css">
<link rel="preload" as="style" href="new-site/libs/dropzone/dropzone.min.css"/>
{/block}
{block 'content'}
{'!isLoggedIn' | snippet : ['redirectTo' => 3781]}
{set $phone = $_modx->user.phone}
{set $extended  = $_modx->user.extended}

{if $.get.id?}
	{set $object = 'msProducts' | snippet : [
	    'parents'   => '2',
	    'resources' => $.get.id,
	    'leftJoin'  => '{
          "modResource": {
              "class": "modResource",
              "on": "modResource.id = msProduct.id"
          }
      }'
	    'return'    => 'json',
	    'includeContent' => 1,
	] | fromJSON}
	{set $object = $object[0]}
{/if}
<main class="flex-grow flex-shrink-0 relative">
    {if $phone == ''}
    <div id="activationInstruction" style="display: block;" class="popup bg-dark bg-opacity-70 fixed inset-0 z-30 flex items-center justify-center">
    	<div class="popup__wrapper relative w-full p-4 bg-white rounded shadow-md" style="max-width: 600px;margin: 25px auto">
    		<div class="popup__inner w-full">
    			<div class="flex flex-col space-y-4">
    				<div class="flex flex-col space-y-4">
    					<img src="/new-site/img/error-result.svg" class="flex-shrink-0 mx-auto mb-4" width="200" height="200" role="presentation" alt="" />
    					<p class="text-2xl font-bold text-center">{'poly_lang_add_mobile_number' | lexicon}</p>
    					<div class="flex self-center justify-center flex-wrap mt-8">
    					    <a href="{3894 | url : ['schema' => 'full']}" class="w-full md:w-max md:mr-2 mb-2 text-center hover:bg-secondDarken bg-second transition px-8 py-4 text-white rounded">{'poly_lang_confirm' | lexicon}</a>
    				    </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    {/if}
	<section class="py-8">
	    <div class="container flex flex-col gap-2 px-4 mx-auto mb-5">
			<div class="sm:flex-row sm:items-center flex flex-col justify-between">
				<h1 class="text-2xl font-bold text-black">{$_modx->resource['pagetitle']}</h1>
				{'personal_balance' | chunk}
			</div>
			<p class="text-graySemiDark">{$_modx->resource['introtext']}</p>
		</div>
		<div class="container mx-auto px-4">

			<div class="flex flex-col lg:flex-row justify-between relative">
				{'account_menu' | chunk}

				<div class="flex flex-col w-full lg:ml-8">
					<div class="flex flex-col">
						<div class="mb-6 flex flex-col">

							<h2 class="mb-3 md:mb-8 text-2xl md:text-3xl font-bold">{'poly_lang_site_header_add_evac' | lexicon}</h2>

							<form name="create" method="POST" id="createForm">
								{if $object?}
								<input type="hidden" name="id" value="{$object.id}">
								<input type="hidden" name="dataJson" value='{$object | getJson}'>
								{/if}
								<input type="hidden" name="action" value="product/save">
								
								<input type="hidden" name="successUrl" value="{3796 | url}">
								<!-- Заголовок объявления -->
							<div class="flex flex-col mb-5 w-full req">
								<label class="group flex flex-col relative mb-1">
									<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_title' | lexicon} <span class="text-red">*</span></span>
									<input name="pagetitle" maxlength="70" type="text" class="p-3 border border-accent rounded transition focus:shadow-accent" placeholder="{'poly_lang_site_evac_create_title_placeholder' | lexicon}" />
								</label>
								<!-- Вывод ошибки - для отображения убрать hidden error -->
								<div class="flex items-center ml-3.5 flex items-center ml-3.5 error hidden">
									<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" role="presentation" alt="" />
									<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
								</div>
							</div>
							<!-- // Заголовок объявления -->
							
							<div class="grid md:grid-cols-2 md:gap-x-4">
								<!-- Местонахождение -->
								<div class="flex flex-col mb-5 w-full req">
									<label class="group flex flex-col relative mb-1">
										<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_area' | lexicon} <span class="text-red">*</span></span>
										<select name="parent2" id="region" class="select">
											<option></option>
											{set $area = 'pdoResources' | snippet : [
												'parents' => 2,
											    'sortby'  => [
											        'pagetitle' => 'ASC',
											    ],
											    'depth' => 1,
											    'where' => ['template' => 2],
											    'return' => 'json',
											    'tpl' => '',
											    'limit' => 0
											]}
											{foreach $area | fromJSON as $item}
												<option value="{$item.id}">{'!pdoField' | snippet : ['id' => $item.id]}</option>
											{/foreach}
										</select>
									</label>
									<!-- Вывод ошибки - для отображения убрать hidden error -->
									<div class="flex items-center ml-3.5 hidden error">
										<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" role="presentation" alt="" />
										<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
									</div>
								</div>
								<!-- // Местонахождение -->

								<!-- Город в области -->
								<div class="flex flex-col mb-5 w-full req">
									<label class="group flex flex-col relative mb-1">
										<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_city' | lexicon}<span class="text-red">*</span></span>
										<select name="parent" id="city" class="select">
											<option></option>											
										</select>
									</label>
									<div class="flex items-center ml-3.5 hidden error">
										<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" role="presentation" alt="" />
										<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
									</div>
								</div>
								<!-- // Город в области -->
								<!-- Тип эвакуатора -->
								<div class="flex flex-col mb-5 w-full req">
									<label class="group flex flex-col relative mb-1">
										<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_evac_type' | lexicon} <span class="text-red">*</span></span>
										<select name="etype" class="select">
											<option></option>
											<option value="0">{'poly_lang_site_evac_create_type1' | lexicon}</option>
											<option value="1">{'poly_lang_site_evac_create_type2' | lexicon}</option>
											<option value="2">{'poly_lang_site_evac_create_type3' | lexicon}</option>
											<option value="3">{'poly_lang_site_evac_create_type4' | lexicon}</option>
											<option value="4">{'poly_lang_site_evac_create_type5' | lexicon}</option>
											<option value="5">{'poly_lang_site_evac_create_type6' | lexicon}</option>
										</select>
									</label>
									<!-- Вывод ошибки - для отображения убрать hidden error -->
									<div class="flex items-center ml-3.5 hidden error">
										<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" role="presentation" alt="" />
										<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
									</div>
								</div>
								<!-- // Тип эвакуатора -->

								<!-- Грузоподъемность -->
								<div class="flex flex-col mb-5 w-full req">
									<label class="group flex flex-col relative mb-1">
										<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_capacity' | lexicon} <span class="text-red">*</span></span>
										<select name="capacity" class="select">
											<option></option>
											<option value="2">2</option>
											<option value="2.5">2.5</option>
											<option value="3">3</option>
											<option value="3.5">3.5</option>
											<option value="4">4</option>
											<option value="4.5">4.5</option>
											<option value="5">5</option>
											<option value="5.5">5.5</option>
											<option value="6">6</option>
											<option value="6.5">6.5</option>
											<option value="7">7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
										</select>
									</label>
									<!-- Вывод ошибки - для отображения убрать hidden error -->
									<div class="flex items-center ml-3.5 hidden error">
										<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" role="presentation" alt="" />
										<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
									</div>
								</div>

								<div class="flex flex-col mb-5 w-full">
									<label class="group flex flex-col relative mb-1">
										<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_transfer' | lexicon} </span>
										<select name="transfer" id="carrying-capacity" class="select">
											<option value="0">{'poly_lang_site_no' | lexicon}</option>
											<option value="1">{'poly_lang_site_yes' | lexicon}</option>
										</select>
									</label>
								</div>
								<!-- // Грузоподъемность -->

							</div>

							
							<!-- Телефон -->
							<div class="flex flex-col mb-5 w-full req phone">
								<label class="group flex flex-col relative mb-1">
									<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_phone' | lexicon}<span class="text-red">*</span></span>
									<input name="phone" {if $extended['disable_autocomplete'] == 0}value="{$phone}"{/if} type="tel" class="p-3 border border-accent rounded transition focus:shadow-accent" placeholder="+380 (99) 99-99-999">
								</label>
								<!-- Вывод ошибки - для отображения убрать hidden error -->
								<div class="flex items-center ml-3.5 hidden error">
									<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" role="presentation" alt="" />
									<p class="text-red ml-2">{'poly_lang_site_evac_create_required' | lexicon}</p>
								</div>
								<div id="additionalPhonesQuestion" class="flex items-center">
									<p class="text-sm pl-3 text-graySemiDark">{'poly_lang_site_evac_create_phone_add_more' | lexicon}</p>
									<button type="button" id="showPhones" class="hover:underline transition text-accent text-sm ml-2">{'poly_lang_site_add_button' | lexicon}</button>
								</div>
								
							</div>
							<!-- // Телефон -->

							<div id="additionalPhones" class="hidden error flex flex-col phone">
								<!-- Доп. телефон -->
								<div class="flex flex-col mb-5 w-full">
									<label class="group flex flex-col relative mb-1">
										<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_phone_add' | lexicon} - 1</span>
										<input name="phone_2" type="tel" class="p-3 border border-accent rounded transition focus:shadow-accent" placeholder="+380 (99) 99-99-999">
									</label>
									<!-- Вывод ошибки - для отображения убрать hidden error -->
									<div class="flex items-center ml-3.5 hidden error">
										<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" role="presentation" alt="" />
										<p class="text-red ml-2">{'poly_lang_site_evac_create_phone_error' | lexicon}</p>
									</div>
								</div>
								<!-- // Доп. телефон -->

								<!-- Доп. телефон -->
								<div class="flex flex-col mb-5 w-full">
									<label class="group flex flex-col relative mb-1">
										<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_phone_add' | lexicon} - 2</span>
										<input name="phone_3" type="tel" class="p-3 border border-accent rounded transition focus:shadow-accent" placeholder="+380 (99) 99-99-999">
									</label>
									<!-- Вывод ошибки - для отображения убрать hidden error -->
									<div class="flex items-center ml-3.5 hidden error">
										<img src="new-site/img/stop.svg" width="16" height="16" loading="lazy" role="presentation" alt="" />
										<p class="text-red ml-2">{'poly_lang_site_evac_create_phone_error' | lexicon}</p>
									</div>
								</div>
								<!-- // Доп. телефон -->
							</div>

							<div class="mb-4 py-6 border-t border-b border-gray flex flex-col">
								<h3 class="text-xl font-bold mb-2">{'poly_lang_site_evac_create_price_list' | lexicon}</h3>
								<p>{'poly_lang_site_evac_create_price_text' | lexicon}</p>
								<p class="opacity-60 mb-4">{'poly_lang_site_evac_create_price_desc' | lexicon}</p>

								<div class="flex flex-col md:grid md:grid-cols-2 md:grid-rows-5 gap-4 md:grid-flow-col">

									<label class="flex items-center price-inp">
										<span class="w-60 block text-sm md:text-base">{'poly_lang_site_evac_create_price_to' | lexicon} 1,5 тонн</span>
										<input name="price1" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>

									<label class="flex items-center price-inp">
										<span class="w-60 block text-sm md:text-base">{'poly_lang_site_evac_create_price_to' | lexicon} 3 тонн</span>
										<input name="price2" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>

									<label class="flex items-center price-inp">
										<span class="w-60 block text-sm md:text-base">{'poly_lang_site_evac_create_price_to' | lexicon} до 5 тонн</span>
										<input name="price3" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>

									<label class="flex items-center price-inp">
										<span class="w-60 block text-sm md:text-base">{'poly_lang_site_evac_create_prostoi' | lexicon}</span>
										<input name="price4" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>
									
									<label class="flex items-center price-inp">
										<span class="w-60 block text-sm md:text-base">{'poly_lang_site_evac_create_without_city' | lexicon}</span>
										<input name="price5" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>

									<label class="flex items-center price-inp">
										<span class="w-60 block text-sm md:text-base">{'poly_lang_site_evac_create_price_up' | lexicon}</span>
										<input name="price6" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>

									<label class="flex items-center price-inp">
										<span class="w-60 block text-sm md:text-base">{'poly_lang_site_evac_create_block' | lexicon}</span>
										<input name="price7" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>

									<label class="flex items-center price-inp">
										<span class="w-60 block text-sm md:text-base">{'poly_lang_site_evac_create_manipulator' | lexicon}</span>
										<input name="price8" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>

									<label class="flex items-center price-inp">
										<span class="w-60 block text-sm md:text-base">{'poly_lang_site_evac_create_night' | lexicon}</span>
										<input name="price9" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>

									<label class="flex items-center price-inp">
										<span class="text-sm md:text-base w-60 group hover:underline cursor-pointer block text-accent font-medium relative">{'poly_lang_site_evac_create_slognost' | lexicon}
											<span class="text-sm group-hover:block hidden error w-72 bg-white rounded -bottom-26 shadow-md border-gray p-2 left-0 absolute text-dark">{'poly_lang_site_evac_create_slognost_desc' | lexicon}</span>
										</span>
										<input name="price10" type="text" class="ml-2 md:ml-0 p-3 w-16 border border-accent rounded transition focus:shadow-accent" placeholder="100">
										<span class="ml-2 opacity-60">(грн)</span>
									</label>

								</div>

							</div>	

							<div class="flex flex-col mb-5">
								<span class="mb-1 pl-2.5">{'poly_lang_site_evac_create_have_photo' | lexicon}</span>
								<div action="new-site/assets/add-evac/assets/connector.php" class="dropzone border-2 border-accent rounded border-dashed " id="dropzone">
								</div>
							</div>
							<textarea id="info" class="p-3 border border-accent rounded transition focus:shadow-accent resize-none mt-6" name="content" cols="30" rows="10" placeholder="Описание">
								{if $object?}
									{$object.content}
								{/if}
							</textarea>
							
							<div class="flex justify-end my-2">
								<span class="text-grayDarken text-sm"><span class="text-red">*</span> — {'poly_lang_site_evac_create_req_field' | lexicon}</span>
							</div>

							<div class="flex self-center mt-8">
								<button type="submit" class="hover:bg-secondDarken bg-second transition px-8 py-4 text-white rounded">{if $.get.id?} {'poly_lang_site_evac_create_save_button' | lexicon} {else} {'poly_lang_site_header_add_evac' | lexicon} {/if}</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
{if $.get.id}
{set $images = '!msGallery' | snippet : [
	'product' => $.get.id,
	'tpl' => '@INLINE 
		{if $files?} 
			{foreach $files as $file}
				myDropzone.displayExistingFile({ name: "{$file.name}", size: {$file.properties.size}, id: {$file.id} }, "{$file.url}" );
                myDropzone.files.push({ name: "{$file.name}", size: {$file.properties.size}, id: {$file.id} })
            {/foreach}
        {/if}
        ',
	'limit' => 0
]}
{/if}
{/block}
{block 'scriptsPrev'}
<script src="new-site/libs/dropzone/dropzone.min.js"></script>
<script src="new-site/libs/select2/select2.min.js"></script>
<script src="new-site/libs/ckeditor/ckeditor.js"></script>
{/block}
{block 'scripts'}
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js"></script>
{if $phone != ''}
<script src="new-site/js/add_evac.js"></script>
{/if}
<script>
$("[type='tel']").mask("+38 (099) 999-99-99");
	setTimeout(() => {
		let myDropzone = Dropzone.forElement("#dropzone");
		{$images}
	}, 2000)
</script>
{/block}
