<link rel="stylesheet" type="text/css" href="http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/css/style.css" async="async" />
<style>.<?=$h;?>top{padding-bottom:11px!important;border-bottom:5px solid #fafafa!important;}</style>
<base href="http://<?=SERVER_NAME;?><?= rtrim($_SERVER['REQUEST_URI'], '/');?>">
<link rel="canonical" hreflang="uk" href="<?=SERVER_NAME;?><?= rtrim(rtrim($_SERVER['REQUEST_URI'], '?p=1'), '/');?>/">
<meta http-equiv="cache-control" content="max-age=0" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="0" />
<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="True">
<script type="text/javascript" src="http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/js/script.js"></script>
<script>
function ImportFont(e){style=document.createElement("style"),style.innerHTML='@import "'+e+'";',document.head.appendChild(style)}
ImportFont('http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/fonts/lato.css');
</script>