{set $opt = $_modx->config}
{set $res = $_modx->resource}
{if !$cities = $_modx->cacheManager->get('pdoresources/cities/cities_new_' ~ $opt.cultureKey)}
    {set $cities = $_modx->runSnippet('!pdoResources', [
	    'parents'   => '2',
	    'templates' => '2',
	    'sortby'    => 'menuindex',	
	    'sortdir'   => 'ASC',
	    'return'    => 'json',
	    'limit'     => 0,
	    
    ])}
    {set $null = $_modx->cacheManager->set('pdoresources/cities/cities_new_' ~ $opt.cultureKey, $cities, 24 * 3600)}
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
		{else}
		<title>{$res.seo_title ?: $res.pagetitle}</title>
		{/if}
		{if $res.template in list [2,3,4]}
		<meta name="description" content="{$res.seo_desc ?: 'poly_lang_site_desc' | lexicon : ['name' => $res.pagetitle]}">
		{else}
		<meta name="description" content="{$res.seo_desc}">
		{/if}
		
		<link href="https://evacme.com.ua/" rel="alternate" hreflang="ru">
		<link href="https://evacme.com.ua/ua/" rel="alternate" hreflang="uk">

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
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

		<link rel="stylesheet" href="/new-site/new-main/libs/dropzone/basic.min.css" />
		<link rel="stylesheet" href="/new-site/new-main/libs/dropzone/dropzone.min.css" />
		<link rel="stylesheet" href="/new-site/new-main/libs/select2/select2.min.css" />
		<link rel="stylesheet" href="/new-site/new-main/libs/fotorama/fotorama.css" />
		<link rel="stylesheet" href="/new-site/new-main/libs/owl-carousel/assets/owl.carousel.min.css" />
		<link rel="stylesheet" href="/new-site/new-main/libs/owl-carousel/assets/owl.theme.default.min.css" />
		<link rel="stylesheet" href="/new-site/new-main/libs/slick/slick.css" />

		<link rel="stylesheet" type="text/css" href="new-site/new-main/css/tailwind.min.css?v=2" />
		<link rel="stylesheet" type="text/css" href="new-site/new-main/css/styles.min.css" />
		<link rel="preload" href="new-site/new-main/fonts/roboto/roboto-400.woff2" crossorigin as="font" />
		<link rel="preload" href="new-site/new-main/fonts/roboto/roboto-500.woff2" crossorigin as="font" />
		<link rel="preload" href="new-site/new-main/fonts/roboto/roboto-700.woff2" crossorigin as="font" />
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    	{*
    	{desktop}
    	<link rel="stylesheet" href="new-site/css/video.css">
          <link rel="preload" as="style" href="new-site/css/video.css"/>
    	{/desktop}
    	*}
		{block 'links'}{/block}
		<style>
    		body,
    		html {
    			overflow-x: hidden;
    		}
    		.review-card {
    		    flex-direction: column;
    		}
    	</style>
	</head>
	<body class="flex flex-col h-full font-body" id="body">
	    {disableSource}
	    <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N377SSD"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        {/disableSource}
		{include 'file:layouts/header-new.php'}
		{block 'content'}{/block}
		
        {*{include 'file:chunk/video.php'}*}
		{include 'file:layouts/footer-new.php'}
		{include 'file:layouts/cookie.php'}
		{disableSource}
		<script src="/new-site/new-main/libs/jquery/jquery.min.js"></script>
		<script src="/new-site/new-main/libs/jquery-ui/jquery-ui.min.js"></script>
		<script src="/new-site/new-main/libs/dropzone/dropzone.min.js"></script>
		<script src="/new-site/new-main/libs/select2/select2.min.js"></script>
		<script src="/new-site/new-main/libs/fotorama/fotorama.js"></script>
		<script src="/new-site/new-main/libs/autosize/autosize.min.js"></script>
		<script src="/new-site/new-main/libs/owl-carousel/owl.carousel.min.js"></script>
		<script src="/new-site/new-main/libs/slick/slick.min.js"></script>
		<script src="/new-site/new-main/js/scripts.min.js"></script>
		{*
		{desktop}
		<script src="new-site/js/video.js"></script>
		{/desktop}
		*}
    {'!reMessagesTrack' | snippet}
		{block 'scriptsPrev'}{/block}
		{block 'scripts'}{/block}
	    {ignore}
	    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-167293519-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){ dataLayer.push(arguments); }
          gtag('js', new Date());
        
          gtag('config', 'UA-167293519-1');
        </script>
        {/ignore}
        {/disableSource}
	</body>
</html>
