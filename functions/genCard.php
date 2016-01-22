<?
function genCard($cards, $cols=3){
	$echoer = '';
	foreach($cards as $c){
		$echoer .= '<div class="card cw'.$cols.'" onmousedown="CClick(this, event)">';
		if(isset($c['placeholder'])){
			$echoer .= '<div class="img-placeholder">';
			$echoer .= '<img src="'.$c['placeholder'].'">';
			$echoer .= '</div>';
		}
		$echoer .= '<a class="link" href="'.$c['link'].'">'.$c['title'].'</a>';
		$echoer .= $c['text'].'';
		$echoer .= '</div>';
	}
	return $echoer;
}