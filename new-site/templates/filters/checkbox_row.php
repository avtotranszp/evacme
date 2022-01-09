{var $key = $table ~ $delimeter ~ $filter}
<label class="input-checkbox flex items-center self-start cursor-pointer">
	<input type="checkbox" name="{$filter_key}" id="mse2_{$key}_{$idx}" value="{$value}" {$checked} {$disabled} class="hidden" />
	<span class="fake-checkbox block w-5 h-5 bg-no-repeat bg-cover"></span>
	<span class="ml-2">
		{$title}
	</span>
</label>