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

function parser(loc, param){
	var parser = document.createElement('a');
	parser.href = loc;
	
	parser.protocol; // => "http:"
	parser.hostname; // => "example.com123"
	parser.port;     // => "3000"
	parser.pathname; // => "/pathname/"
	parser.search;   // => "?search=test"
	parser.hash;     // => "#hash"
	parser.host;     // => "example.com:3000"

	return parser[param];
}

function onLoad(){
	Load();
}

function onHashChange(){
	Load();
}

function Load(){
	t = parser(window.location, 'hash');
	t = t.substring(1, t.length);
	req = connect('a='+t);
	document.getElementById('header').innerHTML = req[0];
	document.getElementById('main').innerHTML = req[1];
}

function eLoad(t){
	req = connect(t);
	document.getElementById('header').innerHTML = req[0];
	document.getElementById('main').innerHTML = req[1];
}

function connect(t){
	html = ajax('connector.php?'+t);
	html = JSON.parse(html);
	return html;
}