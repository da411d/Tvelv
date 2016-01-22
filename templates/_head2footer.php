<script type="text/javascript" src="http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/js/script.js"></script>
<script>
function ImportFont(e){style=document.createElement("style"),style.innerHTML='@import "'+e+'";',document.head.appendChild(style)}
ImportFont('http://<?=SERVER_NAME;?>/<?=SITEDIR;?>assets/fonts/lato.css');
</script>