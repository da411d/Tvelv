function onLoad(){
	if(!window.location.hash){
	window.location.hash='#profile';
	}
	Load();
}

function onHashChange(){
	Load();
}

function Load(){
	t = parser(window.location, 'hash');
	t = t.substring(1, t.length);
	req = connect('a='+t);
	document.getElementById('header').innerHTML = req['header'];
	document.getElementById('main').innerHTML = req['main'];
	if(req['eval']){
		eval(req['eval']);
	}
}

function eLoad(t){
	req = connect(t);
	document.getElementById('header').innerHTML = req['header'];
	document.getElementById('main').innerHTML = req['main'];
	if(req['eval']){
		eval(req['eval']);
	}
}

function connect(t){
	u = 'connector.php?'+t;
	if (u.match(/\?/)) {
		u += '&z='+rand(1000000, 9999999);
	} else {
		u += '?z='+rand(1000000, 9999999);
	}
	html = ajax(u);
	html = trim(explode('dG2Sp6rW', html)[0], explode('dG2Sp6rW', html)[1]);
	html = html.replace('vI24mDj3', '=');
	html = html.replace('vI24mDj3', '=');

	html = YmFzZTY0.decode(html);
	html = explode('=====', html)[1];
	html = JSON.parse(html);
	return html;
}

function parser(loc, param){
	var parser = document.createElement('a');
	parser.href = loc;
	/*
	parser.protocol; // => "http:"
	parser.hostname; // => "example.com123"
	parser.port;     // => "3000"
	parser.pathname; // => "/pathname/"
	parser.search;   // => "?search=test"
	parser.hash;     // => "#hash"
	parser.host;     // => "example.com:3000"
	*/
	return parser[param];
}

function ajax(t){
	var xhr = new XMLHttpRequest();
	xhr.open('GET', t, 0);
	xhr.send();
	if (xhr.status != 200) {
		console.error( xhr.status + ': ' + xhr.statusText );
	} else {
		return( xhr.responseText );
	}
}