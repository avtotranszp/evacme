<label id="mse2_{$filter_key}" class="group flex flex-col relative mb-1">
	<span class="mb-1 pl-2.5 font-bold">{('poly_lang_site_' ~ $filter) | lexicon}</span>
	<select multiple="multiple" name="{$filter_key}" id="{$filter_key}" data-placeholder="{'polylang_site_сhoose_list' | lexicon}" class="select">
		{$rows}
	</select>
</label>