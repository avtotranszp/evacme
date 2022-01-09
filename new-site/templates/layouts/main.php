{set $opt = $_modx->config}
{set $res = $_modx->resource}
{if $res.template == 42}
{'!getCompanyPlaceholders' | snippet : ['user' => $.get.id]}
{/if}
<!DOCTYPE html>
<html lang="{$opt.cultureKey}" class="flex flex-col h-full">
	<head>
	    {disableSource}
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){ w[l]=w[l]||[];w[l].push({ 'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N377SSD');</script>
        <!-- End Google Tag Manager -->
        {/disableSource}
		<base href="{$opt.site_url}">
   		<meta charset="{$opt.modx_charset}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		{if $res.template in list [2,3]}
		    <title>{$res.seo_title ?: 'poly_lang_site_title' | lexicon : ['name' => $res.id != 2 ? $res.pagetitle : '']}</title>
		{elseif $res.template in list [33]}
		    <title>{$res.seo_title ?: $res.pagetitle} - {strtok($.get.id | user : 'email', '@')}</title>
		{elseif $res.template in list [42]}
		    <title>{$res.seo_title ?: $res.pagetitle} - {'company_title' | placeholder}</title>
		{else}
		    <title>{$res.seo_title ?: $res.pagetitle}</title>
		{/if}
		{if $res.template in list [2,3,4]}
		<meta name="description" content="{$res.seo_desc ?: 'poly_lang_site_desc' | lexicon : ['name' => $res.pagetitle]}">
		{else}
		<meta name="description" content="{$res.seo_desc}">
		{/if}
		
		<link href="{if $opt.cultureKey == 'ru'}https://evacme.com.ua/ua{else}https://evacme.com.ua{/if}" rel="alternate" hreflang="{if $opt.cultureKey == 'ru'}ua{else}ru{/if}">

		<meta property="og:url"           content="{$opt.site_url}{$res.uri}" />
		<meta property="og:type"          content="website" />
		<meta property="og:title"         content="{$res.pagetitle}" />
		<meta property="og:description"   content="{$res.seo_desc}" />
		<meta property="og:image"         content="new-site/img/logo.png" />

        <link rel="apple-touch-icon" sizes="180x180" href="manifest/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="manifest/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="manifest/favicon-16x16.png">
        <link rel="manifest" href="manifest/site.webmanifest">
        <link rel="mask-icon" href="manifest/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">
		{block 'linksPrev'}{/block}
	    <link rel="stylesheet" href="new-site/css/tailwind.min.css?v=4"/>
    	<link rel="preload" as="style" href="new-site/css/tailwind.min.css?v=4"/>
		
	    <link rel="stylesheet" href="new-site/css/style.css?v=4"/>
    	<link rel="preload" as="style" href="new-site/css/style.css?v=4"/>
    	
	    <link rel="stylesheet" href="new-site/css/add.css?v=2"/>
    	<link rel="preload" as="style" href="new-site/css/add.css?v=2"/>
    	{*{desktop}
    	<link rel="stylesheet" href="new-site/css/video.css">
        <link rel="preload" as="style" href="new-site/css/video.css"/>
    	{/desktop}*}
		{block 'links'}{/block}
	</head>
	<body class="flex flex-col h-full font-body" id="body">
	    {disableSource}
	    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N377SSD"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        {/disableSource}
		{include 'file:layouts/header.php'}
		{block 'content'}{/block}
		
        {*{include 'file:chunk/video.php'}*}
		{include 'file:layouts/footer.php'}
		{include 'file:layouts/cookie.php'}
		{disableSource}
		<script src="new-site/libs/jquery/jquery.min.js"></script>
		<script src="new-site/libs/jquery-ui/jquery-ui.min.js"></script>
		{*{desktop}
		<script src="new-site/js/video.js"></script>
		{/desktop}*}
		<script src="new-site/js/scripts.js"></script>
		<script src="new-site/js/main.js"></script>
        {'!reMessagesTrack' | snippet}
		{block 'scriptsPrev'}{/block}
		{block 'scripts'}{/block}
	    {ignore}
        {/ignore}
        {/disableSource}
        {'!reMessagesTrack' | snippet}
	</body>
</html>
